<?php 

extract(shortcode_atts(array(
	"image" => "", 
	"url" => '#', 
	"alt" => ""), $atts));

$img_dimens   = false;	
$img_dimens_w = null;
$img_dimens_h = null;

(!empty($alt)) ? $alt_tag = $alt : $alt_tag = esc_html__('client','salient');

if (preg_match('/^\d+$/',$image) ) {
	
	$wp_img_alt_tag = get_post_meta( $image, '_wp_attachment_image_alt', true );
	if (!empty($wp_img_alt_tag)) { 
		$alt_tag = $wp_img_alt_tag;
	}
	
	$image_src = wp_get_attachment_image_src($image, 'full');
	$image     = $image_src[0];
	
	$img_dimens   = true;
	$img_dimens_w = $image_src[1];
	$img_dimens_h = $image_src[2];
}

	
if (!empty($url) && $url !== 'none' && $url !== '#') : ?>
	<div><a href="<?php echo esc_attr( $url ); ?>" target="_blank"><img src="<?php echo esc_url( $image ); ?>" <?php if($img_dimens) { echo 'width="'.esc_attr($img_dimens_w).'" height="'.esc_attr($img_dimens_h).'"'; } ?> alt="<?php echo esc_attr( $alt_tag ); ?>" /></a></div>
<?php else : ?>
	<div class="no-link"><img src="<?php echo esc_url($image); ?>" <?php if($img_dimens) { echo 'width="'.esc_attr($img_dimens_w).'" height="'.esc_attr($img_dimens_h).'"'; } ?> alt="<?php echo esc_attr( $alt_tag ); ?>" /></div>
<?php endif; ?>