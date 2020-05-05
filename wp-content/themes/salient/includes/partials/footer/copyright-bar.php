<?php
/**
 * Footer copyright bar
 *
 * @package Salient WordPress Theme
 * @subpackage Partials
 * @version 10.5
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$nectar_options = get_nectar_theme_options();

$disable_footer_copyright = ( ! empty( $nectar_options['disable-copyright-footer-area'] ) && $nectar_options['disable-copyright-footer-area'] === '1' ) ? 'true' : 'false';
$copyright_footer_layout  = ( ! empty( $nectar_options['footer-copyright-layout'] ) ) ? $nectar_options['footer-copyright-layout'] : 'default';
$footer_columns           = ( ! empty( $nectar_options['footer_columns'] ) ) ? $nectar_options['footer_columns'] : '4';


if ( 'false' === $disable_footer_copyright ) {
	?>

  <div class="row" id="copyright" data-layout="<?php echo esc_attr( $copyright_footer_layout ); ?>">
	
	<div class="container">
	   
		<?php if ( '1' !== $footer_columns ) { ?>
		<div class="col span_5">
		   
			<?php
			if ( $copyright_footer_layout === 'centered' ) {
				if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Footer Copyright' ) ) :
          else :
	           ?>
	
				<div class="widget">			
				</div>		   
			<?php
			endif;
			}
			?>
		   
			<?php if ( ! empty( $nectar_options['disable-auto-copyright'] ) && '1' === $nectar_options['disable-auto-copyright'] ) { ?>
			<p>
				<?php
				if ( ! empty( $nectar_options['footer-copyright-text'] ) ) {
					echo wp_kses_post( $nectar_options['footer-copyright-text'] );}
				?>
			 </p>	
			<?php } else { ?>
			<p>&copy; <?php echo date( 'Y' ) . ' ' . esc_html( get_bloginfo( 'name' ) ); ?>. 
					   <?php
						if ( ! empty( $nectar_options['footer-copyright-text'] ) ) {
							echo wp_kses_post( $nectar_options['footer-copyright-text'] );}
						?>
			 </p>
			<?php } ?>
		   
		</div><!--/span_5-->
		<?php } ?>
	   
	  <div class="col span_7 col_last">
		<ul class="social">
			<?php
			if ( ! empty( $nectar_options['use-twitter-icon'] ) && $nectar_options['use-twitter-icon'] === '1' ) {
				?>
			   <li><a target="_blank" href="<?php echo esc_url( $nectar_options['twitter-url'] ); ?>"><i class="fa fa-twitter"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-facebook-icon'] ) && $nectar_options['use-facebook-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['facebook-url'] ); ?>"><i class="fa fa-facebook"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-vimeo-icon'] ) && $nectar_options['use-vimeo-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['vimeo-url'] ); ?>"> <i class="fa fa-vimeo"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-pinterest-icon'] ) && $nectar_options['use-pinterest-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['pinterest-url'] ); ?>"><i class="fa fa-pinterest"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-linkedin-icon'] ) && $nectar_options['use-linkedin-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['linkedin-url'] ); ?>"><i class="fa fa-linkedin"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-youtube-icon'] ) && $nectar_options['use-youtube-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['youtube-url'] ); ?>"><i class="fa fa-youtube-play"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-tumblr-icon'] ) && $nectar_options['use-tumblr-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['tumblr-url'] ); ?>"><i class="fa fa-tumblr"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-dribbble-icon'] ) && $nectar_options['use-dribbble-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['dribbble-url'] ); ?>"><i class="fa fa-dribbble"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-rss-icon'] ) && $nectar_options['use-rss-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo ( ! empty( $nectar_options['rss-url'] ) ) ? esc_url( $nectar_options['rss-url'] ) : esc_html( get_bloginfo( 'rss_url' ) ); ?>"><i class="fa fa-rss"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-github-icon'] ) && $nectar_options['use-github-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['github-url'] ); ?>"><i class="fa fa-github-alt"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-behance-icon'] ) && $nectar_options['use-behance-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['behance-url'] ); ?>"> <i class="fa fa-behance"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-google-plus-icon'] ) && $nectar_options['use-google-plus-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['google-plus-url'] ); ?>"><i class="fa fa-google"></i> </a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-instagram-icon'] ) && $nectar_options['use-instagram-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['instagram-url'] ); ?>"><i class="fa fa-instagram"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-stackexchange-icon'] ) && $nectar_options['use-stackexchange-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['stackexchange-url'] ); ?>"><i class="fa fa-stackexchange"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-soundcloud-icon'] ) && $nectar_options['use-soundcloud-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['soundcloud-url'] ); ?>"><i class="fa fa-soundcloud"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-flickr-icon'] ) && $nectar_options['use-flickr-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['flickr-url'] ); ?>"><i class="fa fa-flickr"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-spotify-icon'] ) && $nectar_options['use-spotify-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['spotify-url'] ); ?>"><i class="icon-salient-spotify"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-vk-icon'] ) && $nectar_options['use-vk-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['vk-url'] ); ?>"><i class="fa fa-vk"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-vine-icon'] ) && $nectar_options['use-vine-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['vine-url'] ); ?>"><i class="fa fa-vine"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-houzz-icon'] ) && $nectar_options['use-houzz-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['houzz-url'] ); ?>"><i class="fa fa-houzz"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-yelp-icon'] ) && $nectar_options['use-yelp-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['yelp-url'] ); ?>"><i class="fa fa-yelp"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-snapchat-icon'] ) && $nectar_options['use-snapchat-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['snapchat-url'] ); ?>"><i class="fa fa-snapchat"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-mixcloud-icon'] ) && $nectar_options['use-mixcloud-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['mixcloud-url'] ); ?>"><i class="fa fa-mixcloud"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-bandcamp-icon'] ) && $nectar_options['use-bandcamp-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['bandcamp-url'] ); ?>"><i class="fa fa-bandcamp"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-tripadvisor-icon'] ) && $nectar_options['use-tripadvisor-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['tripadvisor-url'] ); ?>"><i class="fa fa-tripadvisor"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-telegram-icon'] ) && $nectar_options['use-telegram-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['telegram-url'] ); ?>"><i class="fa fa-telegram"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-slack-icon'] ) && $nectar_options['use-slack-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['slack-url'] ); ?>"><i class="fa fa-slack"></i></a></li> <?php } ?>
		  <?php
			if ( ! empty( $nectar_options['use-medium-icon'] ) && $nectar_options['use-medium-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['medium-url'] ); ?>"><i class="fa fa-medium"></i></a></li> <?php } ?>
      <?php
 			if ( ! empty( $nectar_options['use-artstation-icon'] ) && $nectar_options['use-artstation-icon'] === '1' ) {
 				?>
 			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['artstation-url'] ); ?>"><i class="icon-salient-artstation"></i></a></li> <?php } ?>
     <?php
			if ( ! empty( $nectar_options['use-discord-icon'] ) && $nectar_options['use-discord-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['discord-url'] ); ?>"><i class="icon-salient-discord"></i></a></li> <?php } ?>
     <?php
			if ( ! empty( $nectar_options['use-whatsapp-icon'] ) && $nectar_options['use-whatsapp-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['whatsapp-url'] ); ?>"><i class="fa fa-whatsapp"></i></a></li> <?php } ?>
     <?php
     if ( ! empty( $nectar_options['use-messenger-icon'] ) && $nectar_options['use-messenger-icon'] === '1' ) {
       ?>
      <li><a target="_blank" href="<?php echo esc_url( $nectar_options['messenger-url'] ); ?>"><i class="icon-salient-facebook-messenger"></i></a></li> <?php } ?>
     <?php
			if ( ! empty( $nectar_options['use-phone-icon'] ) && $nectar_options['use-phone-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['phone-url'] ); ?>"><i class="fa fa-phone"></i></a></li> <?php } ?>
     <?php
			if ( ! empty( $nectar_options['use-email-icon'] ) && $nectar_options['use-email-icon'] === '1' ) {
				?>
			 <li><a target="_blank" href="<?php echo esc_url( $nectar_options['email-url'] ); ?>"><i class="fa fa-envelope"></i></a></li> <?php } ?>
		</ul>
	  </div><!--/span_7-->

	  <?php if ( '1' === $footer_columns ) { ?>
		<div class="col span_5">
		   
			<?php
			if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Footer Copyright' ) ) :
else :
	?>
	
			<div class="widget">			
	   
			</div>		   
		<?php endif; ?>
	  
			<?php if ( ! empty( $nectar_options['disable-auto-copyright'] ) && '1' === $nectar_options['disable-auto-copyright'] ) { ?>
			<p>
				<?php
				if ( ! empty( $nectar_options['footer-copyright-text'] ) ) {
					echo wp_kses_post( $nectar_options['footer-copyright-text'] );
				}
				?>
			 </p>	
			<?php } else { ?>
			<p>&copy; <?php echo date( 'Y' ) . ' ' . esc_html( get_bloginfo( 'name' ) ); ?>. 
					   <?php
						if ( ! empty( $nectar_options['footer-copyright-text'] ) ) {
							echo wp_kses_post( $nectar_options['footer-copyright-text'] );}
						?>
			 </p>
			<?php } ?>
		   
		</div><!--/span_5-->
		<?php } ?>
	
	</div><!--/container-->
	
  </div><!--/row-->
  
	<?php }