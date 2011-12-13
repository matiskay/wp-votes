<?php

/*
Plugin Name: WP votes
Description: Implements votes in wordpress
Version: 1.0
*/

function wp_votes_widget() {
  wp_votes_set_vote('up');
  include_once WP_PLUGIN_DIR . '/wp-votes/includes/utils.php';

  // RENDER VIEW
  $context = array(
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

function wp_votes_set_vote($vote_tag) {
  global $wpdb;
  global $post;
  
  if ($vote_tag == 'up') {
    $vote_value = 1;
  } elseif ( $vote_tag == 'down') {
    $vote_value = -1;
  } else {
    return false;
  }

  $sql = 'INSERT INTO wp_votes (post_id, vote) VALUES (%d, %d)';
  $query = $wpdb->prepare($sql, $post->ID, $vote_value);
  $wpdb->query($query);

  return true;
}

function wp_votes_get_votes() {
  global $wpdb;
  $sql = '';
  $query = '';
  $wpdb->query($query);
  return $votes;
}

// Init Post Hit
add_action('publish_post', 'wp_votes_post_init');
function wp_votes_post_init() {
  global $wpdb;

  global $blog_id;
  global $site_id;                                                                                                                                                        
  global $post;


  $sql = 'INSERT INTO wp_hits (blog_id, site_id, post_id) VALUES (%d, %d, %d)' ;
  $query = sprintf($sql, $blog_id, $site_id, $post->ID);
  $wpdb->query($query);
}
