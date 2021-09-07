<?php
$banner_image             = '';
$banner_title             = '';
$banner_overlay           = "";
if ( defined( 'DEVM' ) ) {

	$woo_single_show_banner   = kinter_option('woo_single_show_banner');
	if ("yes" !== $woo_single_show_banner) {
		return;
	}

	$banner_woo_single_image       = kinter_option('banner_woo_single_image');
	$banner_overlay                = kinter_option('show_woo_single_banner_overlay');
	$banner_image                  = KINTER_IMG.'/banner/bredcumbs-1.png';
	$woo_single_banner_title_color = kinter_option('woo_single_banner_title_color');

	//image
	if( $banner_woo_single_image != ''){
		$banner_image = wp_get_attachment_image_url($banner_woo_single_image, "full");
	}
}else{
	//default
	$banner_title                  = get_the_title();
	$banner_overlay                = "";
	$banner_image                  = "";
	$woo_single_banner_title_color = "#FFFFFF";
}
if( $banner_image != ''){
	$banner_image = $banner_image;
}

?>
<section class="xs-jumbotron d-flex align-items-center  xs_single_blog_banner <?php  echo esc_attr($banner_image == '' ?' banner-solid':' banner-bg'); ?>" style="background-image: url(<?php echo esc_attr( $banner_image ); ?>)">
	<?php if ($banner_overlay === 'yes') {
		$banner_overlay_color = "";
		if ( defined( 'DEVM' ) ) {
			$banner_overlay_color = kinter_option("woo_single_banner_overlay_color");
		}
		?>
	<div class="xs-solid-overlay" style="background-color: <?php echo esc_attr($banner_overlay_color === '' ? 'rgba(0,0,0,.5)' : $banner_overlay_color); ?>"></div>
	<?php }; ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="xs-jumbotron-content-wraper">
					<h1 class="xs-jumbotron-title" style="color: <?php echo esc_attr($woo_single_banner_title_color === '' ? '#FFFFFF' : $woo_single_banner_title_color); ?>">
						<?php echo esc_html__('Products','kinter'); ?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>