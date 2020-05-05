<?php
/**
 * Salient welcome page
 *
 * @package Salient WordPress Theme
 * @version 10.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action('after_switch_theme','nectar_salient_welcome_redirect');

/**
* Redirect to welcome page when Salient is activated.
*
* @since 10.5
*/
function nectar_salient_welcome_redirect() {
  
  global $pagenow;
  
  // Verify that the theme was activated.
  if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ) {
    
    // Do not redirect if network activated.
    if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
      return;
    }
    
    // Redirect.
    wp_safe_redirect( add_query_arg( array( 'page' => 'salient-welcome-screen' ), admin_url( 'index.php' ) ) );
    
  }
  
}


add_action('admin_menu', 'nectar_salient_welcome_page');

/**
* Create Salient welcome page.
*
* @since 10.5
*/
function nectar_salient_welcome_page() {
  add_dashboard_page(
    esc_html__( 'Welcome To Salient', 'salient' ),
    esc_html__( 'Welcome To Salient', 'salient' ),
    'edit_theme_options',
    'salient-welcome-screen',
    'nectar_salient_welcome_content'
  );
}


/**
* Add welcome page content.
*
* @since 10.5
*/
function nectar_salient_welcome_content() {
  
  $salient_theme_version = nectar_get_theme_version();
  
  ?>
  <div class="salient-welcome-wrap">
    <div class="header-wrap">
      <h1 class="welcome"><?php echo esc_html__('Welcome to Salient','salient'); ?> <span><?php echo 'v'. esc_html($salient_theme_version); ?></span></h1>
      <div class="sub-text">
        <?php echo esc_html__('Thank you for choosing Salient as your WordPress theme!','salient'); ?>
      </div>
    </div>
		<?php 
		if( ! class_exists('Salient_Portfolio') ||
			! class_exists('Salient_Nectar_Slider') ||
			! class_exists('Salient_Home_Slider') ||
			! class_exists('Salient_Shortcodes') ||
			! class_exists('Salient_Demo_Importer') ||
			! class_exists('Salient_Core') ||
			! class_exists('Salient_Widgets') ||
			! class_exists('Salient_Social') ) { ?>
	    <div class="notice-box">
	      <div class="inner">
	        <h3><?php echo esc_html__('Important Update Notice','salient'); ?></h3>
	        <p><?php echo esc_html__('In accordance with new','salient') . ' <a href="//help.author.envato.com/hc/en-us/articles/360000481223" target="_blank">'. esc_html__('Envato guidelines', 'salient') .'</a>, ' . esc_html__('Salient has separated all of the custom post types and plugin territory functionality into individual plugins. Please install and activate the required plugins and any of the desired optional plugins which you wish to use on your site:','salient'); ?></p>
						<ul>
							<?php 
							if( ! defined( 'SALIENT_VC_ACTIVE' ) ) {
								echo '<li><span class="core">'.esc_html__('Required','salient').'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '"> '. esc_html__('Salient WPBakery Page Builder', 'salient') . '</a></li>'; 
							}
							if( ! class_exists('Salient_Core') ) {
								echo '<li><span class="core">'.esc_html__('Required','salient').'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '"> '. esc_html__('Salient Core', 'salient') . '</a></li>'; 
							}
							if( ! class_exists('Salient_Demo_Importer') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '"> '. esc_html__('Salient Demo Importer', 'salient') . '</a></li>'; 
							}
							if( ! class_exists('Salient_Social') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '"> '. esc_html__('Salient Social', 'salient') . '</a></li>'; 
							}
							if( ! class_exists('Salient_Widgets') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '"> '. esc_html__('Salient Widgets', 'salient') . '</a></li>'; 
							}
							if( ! class_exists('Salient_Portfolio') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">'. esc_html__('Salient Portfolio', 'salient') . '</a></li>';
							} 
							if( ! class_exists('Salient_Nectar_Slider') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">'. esc_html__('Salient Nectar Slider', 'salient') . '</a></li>';
							}
							if( ! class_exists('Salient_Home_Slider') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">'. esc_html__('Salient Home Slider', 'salient') . '</a></li>'; 
							}
							if( ! class_exists('Salient_Shortcodes') ) {
								echo '<li><span>'. esc_html__('Optional','salient') .'</span><a target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">'. esc_html__('Salient Shortcodes', 'salient') . '</a></li>'; 
							}
							?>
						</ul>
						<?php echo '<div class="cta-wrap"><a class="begin-installing" target="_blank" href="'. esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '"><strong>' . esc_html__('Begin Installing Plugins','salient') .'</strong></a></div>'; ?>
				</div>
	    </div>
		<?php } ?>
  </div>
  <div class="welcome-container">
    <div class="row">
      <div class="col col-3">
        <h3><?php echo esc_html__('Documentation','salient'); ?></h3>
        <p><?php echo esc_html__('View our online user guide and documentation to get started.','salient'); ?></p>
        <a class="button button-primary" href="//themenectar.com/docs/salient" target="_blank"><?php echo esc_html__('View Documentation','salient'); ?> </a>
      </div>
      <div class="col col-3">
        <h3><?php echo esc_html__('What\'s New','salient'); ?></h3></p>
        <p><?php echo esc_html__('Salient has been going strong for over 6 years and is constantly evolving. ','salient'); ?></p>
        <a class="button button-primary" href="//themenectar.com/changelogs/salient.html" target="_blank"><?php echo esc_html__('View Changelog','salient'); ?> </a>
      </div>
      <div class="col col-3">
        <h3><?php echo esc_html__('Get Support','salient'); ?></h3>
        <p><?php echo esc_html__('Feeling stuck? Head over to the forum and open a ticket so that we may assist you.','salient'); ?></p>
        <a class="button button-primary" href="//themenectar.ticksy.com/" target="_blank"><?php echo esc_html__('Open Support Forum','salient'); ?> </a>
      </div>
    </div>
  </div>
  <?php 
}


/**
* Hide the welcome page from appearing in the menu.
*
* @since 10.5
*/
add_action( 'admin_head', 'nectar_salient_welcome_remove_menu' );

function nectar_salient_welcome_remove_menu() {
    remove_submenu_page( 'index.php', 'salient-welcome-screen' );
}



add_action( 'admin_enqueue_scripts', 'nectar_salient_welcome_assets' );

/**
* Enqueue welcome assets.
*
* @since 10.5
*/
function nectar_salient_welcome_assets($hook) {
  
  if( $hook !== 'dashboard_page_salient-welcome-screen' ) {
    return;
  }
  
  wp_register_style( 'nectar_salient_welcome_css', get_template_directory_uri() . '/nectar/welcome/css/style.css', false, '1.0.0' );
  wp_enqueue_style( 'nectar_salient_welcome_css' );
}
