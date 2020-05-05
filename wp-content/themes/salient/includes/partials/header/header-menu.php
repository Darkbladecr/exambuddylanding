<?php
/**
* Header menu items and logo
*
* @package Salient WordPress Theme
* @subpackage Partials
* @version 11.5
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce;

$nectar_header_options = nectar_get_header_variables();
$nectar_options        = get_nectar_theme_options();

?>

<header id="top">
	<div class="container">
		<div class="row">
			<div class="col span_3">
				<a id="logo" href="<?php echo esc_url( home_url() ); ?>" data-supplied-ml-starting-dark="<?php echo esc_attr( $nectar_header_options['using_mobile_logo_starting_dark'] ); ?>" data-supplied-ml-starting="<?php echo esc_attr( $nectar_header_options['using_mobile_logo_starting'] ); ?>" data-supplied-ml="<?php echo esc_attr( $nectar_header_options['using_mobile_logo'] ); ?>" <?php echo wp_kses_post( $nectar_header_options['logo_class'] ); ?>>
					<?php nectar_logo_output( $nectar_header_options['activate_transparency'], $nectar_header_options['side_widget_class'], $nectar_header_options['using_mobile_logo'] ); ?> 
				</a>
				
				<?php
				
				$menu_label = false;
				$menu_label_class = '';
				
				if( ! empty( $nectar_options['header-menu-label'] ) && $nectar_options['header-menu-label'] === '1' ) {
					$menu_label       = true;
					$menu_label_class = ' using-label';
				}
				
				if ( $nectar_header_options['header_format'] === 'centered-menu-bottom-bar' ) {
					$has_pull_left_menu = ( has_nav_menu( 'top_nav_pull_left' ) ) ? 'true' : 'false';
					?>
					<nav class="left-side" data-using-pull-menu="<?php echo esc_attr( $has_pull_left_menu ); ?>">
						<?php
						// Pull left menu.
						if ( has_nav_menu( 'top_nav_pull_left' ) ) {
							wp_nav_menu(
								array(
									'walker'          => new Nectar_Arrow_Walker_Nav_Menu(),
									'theme_location'  => 'top_nav_pull_left',
									'container'       => '',
									'container_class' => 'pull-left-wrap',
									'items_wrap'      => '<ul id="%1$s" class="sf-menu">%3$s</ul>',
								)
							);
						}
						nectar_hook_pull_right_menu_items();
						?>
						<ul class="nectar-social"><li id="social-in-menu" class="button_social_group"><?php nectar_header_social_icons( 'main-nav' ); ?> </li></ul> 
					</nav>
					<nav class="right-side">
						<ul class="buttons" data-user-set-ocm="<?php echo esc_attr( $nectar_header_options['user_set_side_widget_area'] ); ?>"><?php nectar_header_button_items(); ?></ul>
						<?php if ( $nectar_header_options['side_widget_area'] === '1' || $nectar_header_options['side_widget_class'] === 'simple' ) { ?>
							<div class="slide-out-widget-area-toggle mobile-icon <?php echo esc_attr( $nectar_header_options['side_widget_class'] ); ?>" data-custom-color="<?php echo esc_attr($nectar_header_options['ocm_menu_btn_color']); ?>" data-icon-animation="simple-transform">
								<div> <a href="#sidewidgetarea" aria-label="<?php echo esc_attr__('Navigation Menu', 'salient'); ?>" aria-expanded="false" class="<?php echo 'closed' . esc_attr($menu_label_class); ?>">
									<?php if( true === $menu_label ) { echo '<i class="label">' . esc_html__('Menu','salient') .'</i>'; } ?><span aria-hidden="true"> <i class="lines-button x2"> <i class="lines"></i> </i> </span> </a> </div> 
							</div>
						<?php } ?>
					</nav>
				<?php } ?>
			</div><!--/span_3-->
			
			<div class="col span_9 col_last">
				<?php
				
				if ( $nectar_header_options['header_search'] != 'false' ) {
					?>
					<a class="mobile-search" href="#searchbox"><span class="nectar-icon icon-salient-search" aria-hidden="true"></span></a>
					<?php
				}
				
				if ( $nectar_header_options['user_account_btn'] != 'false' ) {
					?>
					<a class="mobile-user-account" href="<?php echo esc_url( $nectar_header_options['user_account_btn_url'] ); ?>"><span class="normal icon-salient-m-user" aria-hidden="true"></span></a>
					<?php
				}
				
				if ( ! empty( $nectar_options['enable-cart'] ) && $nectar_options['enable-cart'] === '1' ) {
					
					if ( $woocommerce ) {
						?>
						
						<a id="mobile-cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="icon-salient-cart"></i><div class="cart-wrap"><span><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?> </span></div></a>
						<?php
					}
				}
				
				
				if ( $nectar_header_options['side_widget_area'] === '1' || $nectar_header_options['side_widget_class'] === 'simple' ) {
					?>
					<div class="slide-out-widget-area-toggle mobile-icon <?php echo esc_attr( $nectar_header_options['side_widget_class'] ); ?>" data-custom-color="<?php echo esc_attr($nectar_header_options['ocm_menu_btn_color']); ?>" data-icon-animation="simple-transform">
						<div> <a href="#sidewidgetarea" aria-label="<?php echo esc_attr__('Navigation Menu', 'salient'); ?>" aria-expanded="false" class="<?php echo 'closed' . esc_attr($menu_label_class); ?>">
							<?php if( true === $menu_label ) { echo '<i class="label">' . esc_html__('Menu','salient') .'</i>'; } ?><span aria-hidden="true"> <i class="lines-button x2"> <i class="lines"></i> </i> </span>
						</a></div> 
					</div>
				<?php } ?>
				
				<?php
				if ( $nectar_header_options['header_format'] === 'left-header' ) {
					echo '<div class="nav-outer">';
				}
				?>
					
					<nav>
						
						<ul class="sf-menu">	
							<?php
							if ( $nectar_header_options['has_main_menu'] === 'true' ) {
								wp_nav_menu(
									array(
										'walker'         => new Nectar_Arrow_Walker_Nav_Menu(),
										'theme_location' => 'top_nav',
										'container'      => '',
										'items_wrap'     => '%3$s',
									)
								);
							} else {
								echo '<li class="no-menu-assigned"><a href="#">No menu assigned</a></li>';
							}
							
							if ( ! empty( $nectar_options['enable_social_in_header'] ) && 
							$nectar_options['enable_social_in_header'] === '1' && 
							$nectar_header_options['using_secondary'] !== 'header_with_secondary' && 
							$nectar_header_options['header_format'] !== 'menu-left-aligned' && 
							$nectar_header_options['header_format'] !== 'centered-menu' && 
							$nectar_header_options['header_format'] !== 'left-header' && 
							$nectar_header_options['header_format'] !== 'centered-menu-bottom-bar' ) {
								
								echo '<li id="social-in-menu" class="button_social_group">';
								nectar_header_social_icons( 'main-nav' );
								echo '</li>';
							}
							
							?>
						</ul>
						

						<?php 
						if ( $nectar_header_options['header_format'] !== 'menu-left-aligned' && 
						$nectar_header_options['header_format'] !== 'centered-menu-bottom-bar' ) { ?>
							<ul class="buttons sf-menu" data-user-set-ocm="<?php echo esc_attr( $nectar_header_options['user_set_side_widget_area'] ); ?>">
								
								<?php
								
								if ( ! empty( $nectar_options['enable_social_in_header'] ) && 
								$nectar_options['enable_social_in_header'] === '1' && 
								$nectar_header_options['using_secondary'] !== 'header_with_secondary' && 
								$nectar_header_options['header_format'] === 'centered-menu' ) {
									
									echo '<li id="social-in-menu" class="button_social_group">';
									nectar_header_social_icons( 'main-nav' );
									echo '</li>';
								}
								
								// Pull right.
								if ( $nectar_header_options['header_format'] === 'centered-menu' && 
								$nectar_header_options['using_pr_menu'] === 'true' ||
								$nectar_header_options['header_format'] === 'centered-logo-between-menu' && 
								$nectar_header_options['using_pr_menu'] === 'true' ) {
									wp_nav_menu(
										array(
											'walker'         => new Nectar_Arrow_Walker_Nav_Menu(),
											'theme_location' => 'top_nav_pull_right',
											'container'      => '',
											'items_wrap'     => '%3$s',
										)
									);
									nectar_hook_pull_right_menu_items();
								}
								
								nectar_header_button_items();
								?>
								
							</ul>
						<?php } ?>
						
					</nav>
					
					<?php
					if ( $nectar_header_options['header_format'] === 'left-header' ) {
						echo '</div>';
					}
					
					if ( $nectar_header_options['header_format'] === 'centered-menu' || 
					$nectar_header_options['header_format'] === 'centered-logo-between-menu' ) {
						nectar_logo_spacing(); 
					}
					?>
					
				</div><!--/span_9-->
				
				<?php if ( $nectar_header_options['header_format'] === 'menu-left-aligned' ) { ?>
					<div class="right-aligned-menu-items">
						<nav>
							<ul class="buttons sf-menu" data-user-set-ocm="<?php echo esc_attr( $nectar_header_options['user_set_side_widget_area'] ); ?>">
								
								<?php
								// Pull right.
								if ( $nectar_header_options['using_pr_menu'] === 'true' ) {
									wp_nav_menu(
										array(
											'walker'         => new Nectar_Arrow_Walker_Nav_Menu(),
											'theme_location' => 'top_nav_pull_right',
											'container'      => '',
											'items_wrap'     => '%3$s',
										)
									);
									nectar_hook_pull_right_menu_items();
								}
								
								nectar_header_button_items();
								?>
								
							</ul>
							
							<?php
							if ( ! empty( $nectar_options['enable_social_in_header'] ) && 
							$nectar_options['enable_social_in_header'] === '1' && 
							$nectar_header_options['using_secondary'] !== 'header_with_secondary' ) {
								
								echo '<ul><li id="social-in-menu" class="button_social_group">';
								nectar_header_social_icons( 'main-nav' );
								echo '</li></ul>';
							}
							?>
						</nav>
					</div><!--/right-aligned-menu-items-->
					
					<?php
				} elseif ( $nectar_header_options['header_format'] === 'left-header' ) {
					
					if ( ! empty( $nectar_options['enable_social_in_header'] ) && 
					$nectar_options['enable_social_in_header'] === '1' && 
					$nectar_header_options['using_secondary'] !== 'header_with_secondary' ) {
						echo '<div class="button_social_group"><ul><li id="social-in-menu">';
						nectar_header_social_icons( 'main-nav' );
						echo '</li></ul></div>';
					}
				}
				?>
				
			</div><!--/row-->
			<?php
			if( $nectar_header_options['side_widget_class'] === 'simple' ) {
				get_template_part( 'includes/partials/header/classic-mobile-nav' );
			}
			?>
		</div><!--/container-->
	</header>
