<?php

/*
Plugin Name: WP votes
Description: Implements votes in wordpress
Version: 1.0
*/

define('WP_VOTES_INIT_VALUE', 0);

function wp_votes_widget() {

  global $post;
  wp_votes_set_vote($post->ID, 'up');
  include_once WP_PLUGIN_DIR . '/wp-votes/includes/utils.php';

  $votes = wp_votes_get_votes($post->ID);

  // RENDER VIEW
  $context = array(
    'votes' => $votes,
  );

  $content .= UTIL_Mustache::render('wp-votes-widget', $context);
  return $content;

}

function wp_votes_debug($variable) {
  echo '<pre>';
  print_r($variable);
  echo '</pre>';
}

function wp_votes_debug_info() {

  global $post;
  global $current_user;

  $output = '';

  wp_votes_debug($post);
  wp_votes_debug($current_user);

  $ouput .= 'POST ID:   ' . $post->ID;
  $ouput .= 'USER ID:   ' . $current_user->ID;

  return $output;
}

function wp_votes_set_vote($id, $vote_tag) {
  global $wpdb;

  $id = (int) $id;
  
  if ($vote_tag == 'up') {
    $vote_value = 1;
  } elseif ( $vote_tag == 'down') {
    $vote_value = -1;
  } else {
    return false;
  }

  $sql = 'INSERT INTO wp_votes (post_id, vote) VALUES (%d, %d)';
  $query = $wpdb->prepare($sql, $id, $vote_value);
  $wpdb->query($query);

  return true;
}

function wp_votes_get_votes($id) {
  global $wpdb;
  $sql = 'SELECT SUM(vote) FROM wp_votes where post_id = %d';
  $query = $wpdb->prepare($sql, $id);
  $votes = $wpdb->get_var($query);
  return $votes;
}

// Init Post Hit
add_action('publish_post', 'wp_votes_post_init');
function wp_votes_post_init() {
  global $wpdb;
  global $post;

  $vote_value = WP_VOTES_INIT_VALUE;

  $sql = 'INSERT INTO wp_votes (post_id, vote) VALUES (%d, %d)';
  $query = $wpdb->prepare($sql, $post->ID, $vote_value);
  $wpdb->query($query);
}

function wp_votes_add_scripts() {
   wp_register_script('wp_votes', plugins_url() . '/wp-votes/static/js/wp-votes.js', array('jquery'), '1.0', true);
   // enqueue the script
   wp_enqueue_script('wp_votes');
}
add_action('wp_enqueue_scripts', 'wp_votes_add_scripts');
