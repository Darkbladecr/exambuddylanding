<?php
/**
* Post meta partial
*
* Used when "Classic" standard style is selected.
*
* @version 10.5
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $nectar_options;

?>

<div class="post-meta">
  
  <div class="date">
    <span class="month"><?php the_time( 'M' ); ?></span>
    <span class="day"><?php the_time( 'd' ); ?></span>
    <?php
    if ( ! empty( $nectar_options['display_full_date'] ) && $nectar_options['display_full_date'] === '1' ) {
      echo '<span class="year">' . get_the_time( 'Y' ) . '</span>';
    } 
    ?>
  </div>
  
  <div class="nectar-love-wrap">
    <?php
    if ( function_exists( 'nectar_love' ) ) {
      nectar_love();
    }
    ?>
  </div>
  
</div><!--post-meta-->