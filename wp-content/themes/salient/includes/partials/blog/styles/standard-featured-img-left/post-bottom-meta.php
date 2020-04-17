<?php
/**
* Post bottom meta partial
*
* Used when "Featured Image Left" standard style is selected.
*
* @version 10.5
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $post;

if ( function_exists( 'get_avatar' ) ) {
  echo '<div class="grav-wrap"><a href="' . get_author_posts_url( $post->post_author ) . '">' . get_avatar( get_the_author_meta( 'email' ), 70, null, get_the_author() ) . '</a>';
  echo '<div class="text"><a href="' . get_author_posts_url( $post->post_author ) . '" rel="author">' . get_the_author() . '</a>';
  echo '<span>' . get_the_date() . '</span></div></div>'; 
}