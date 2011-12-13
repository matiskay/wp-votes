<?php

/*
Plugin Name: WP votes
Description: Implements votes in wordpress
Version: 1.0
*/

function wp_vote_widget() {
  include_once WP_PLUGIN_DIR . '/wp-votes/includes/utils.php';

  // RENDER VIEW
  $context = array(
  );

  $content .= UTIL_Mustache::render('wp-vote-widget', $context);
  return $content;

}

function wp_vote_debug($variable) {
  echo '<pre>';
  print_r($variable);
  echo '</pre>';
}

function wp_vote_debug_info() {

  global $post;
  global $current_user;

  $output = '';

  wp_vote_debug($post);
  wp_vote_debug($current_user);

  $ouput .= 'POST ID:   ' . $post->ID;
  $ouput .= 'USER ID:   ' . $current_user->ID;

  return $output;
}

function wp_vote_set_vote() {
  global $wpdb;
  $sql = '';
  $query = '';
  $wpdb->query($query);
}

function wp_vote_get_votes() {
  global $wpdb;
  $sql = '';
  $query = '';
  $wpdb->query($query);
  return $votes;
}
