<?php
/**
* Post meta partial
*
* Used when "Classic" standard style is selected.
*
* @version 12.0
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

global $nectar_options;

$use_nectar_love    = 'true';
$remove_nectar_love = get_option( 'salient_social_remove_love', '0' );

if( function_exists('nectar_social_sharing_output') && '1' === $remove_nectar_love ) {
  $use_nectar_love = 'false';
}

?>

<div class="post-meta" data-love="<?php echo esc_attr($use_nectar_love); ?>">
  
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
    if ( function_exists( 'nectar_love' ) && 'false' !== $use_nectar_love ) {
      nectar_love();
    }
    ?>
  </div>
  
</div><!--post-meta-->