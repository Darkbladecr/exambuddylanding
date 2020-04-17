<?php
/**
* Post meta bottom partial
*
* Used when "Classic" masonry style is selected.
*
* @version 10.5
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
    if ( function_exists( 'nectar_love' ) ) {
      nectar_love();
    }
    ?>
  </div>
  
</div><!--/post-meta-->