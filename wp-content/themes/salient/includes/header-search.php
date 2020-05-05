<?php
/**
 * Header search template
 *
 * @package    Salient WordPress Theme
 * @subpackage Includes
 * @version 10.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nectar_options = get_nectar_theme_options();

if ( ! empty( $nectar_options['header-disable-ajax-search'] ) && '1' === $nectar_options['header-disable-ajax-search'] ) {
	$ajax_search = 'no';
} else {
	$ajax_search = 'yes';
} ?>

<div id="search-outer" class="nectar">
	<div id="search">
		<div class="container">
			 <div id="search-box">
				 <div class="inner-wrap">
					 <div class="col span_12">
						  <form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
							<?php
							$theme_skin    = ( ! empty( $nectar_options['theme-skin'] ) ) ? $nectar_options['theme-skin'] : 'original';
							$header_format = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';
							if ( 'centered-menu-bottom-bar' === $header_format ) {
								$theme_skin = 'material';
							}

							if ( 'material' === $theme_skin ) {
							?>
							 <input type="text" name="s" <?php if ( 'yes' === $ajax_search ) { echo 'id="s"'; } ?> value="" placeholder="<?php echo esc_attr__( 'Search', 'salient' ); ?>" /> 
							 <?php
							} else {
								?>
								<input type="text" name="s" <?php if ( 'yes' === $ajax_search ) { echo 'id="s"'; } ?> value="<?php echo esc_attr__( 'Start Typing...', 'salient' ); ?>" data-placeholder="<?php echo esc_attr__( 'Start Typing...', 'salient' ); ?>" />
							<?php } ?>
								
						<?php
						if ( 'ascend' === $theme_skin && 'no' === $ajax_search ) {
							echo '<span><i>' . __( 'Press enter to begin your search', 'salient' ) . '</i></span>'; }
						if ( 'material' === $theme_skin ) {
							echo '<span>' . esc_html__( 'Hit enter to search or ESC to close', 'salient' ) . '</span>'; }
						?>
						</form>
					</div><!--/span_12-->
				</div><!--/inner-wrap-->
			 </div><!--/search-box-->
			 <div id="close"><a href="#">
				<?php
				if ( 'material' === $theme_skin ) {
					echo '<span class="close-wrap"> <span class="close-line close-line1"></span> <span class="close-line close-line2"></span> </span>';
				} else {
					echo '<span class="icon-salient-x" aria-hidden="true"></span>';
				}
				?>
				 </a></div>
		 </div><!--/container-->
	</div><!--/search-->
</div><!--/search-outer-->
