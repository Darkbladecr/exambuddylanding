<?php
/**
* Post meta bottom partial
*
* Used when "Classic" masonry style is selected.
*
* @version 12.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $post;

?>

<div class="post-meta">
  
  <div class="date">
    <?php echo get_the_date(); ?>
  </div>
  
  <div class="nectar-love-wrap">
    <?php
    
    $use_nectar_love    = true;
    $remove_nectar_love = get_option( 'salient_social_remove_love', '0' );
    
    if( function_exists('nectar_social_sharing_output') && '1' === $remove_nectar_love ) {
      $use_nectar_love = false;
    }
    
    if ( function_exists( 'nectar_love' ) && false !== $use_nectar_love ) {
      nectar_love();
    }
    ?>
  </div>
  
</div><!--/post-meta-->