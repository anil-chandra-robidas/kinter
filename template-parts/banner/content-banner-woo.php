<?php
$banner_image    = '';
$banner_title    = '';
$woo_show_banner = "";
$banner_overlay = "";
if ( defined( 'DEVM' ) ) {

	$woo_show_banner          = kinter_option('woo_show_banner');

	if ("yes" !== $woo_show_banner) {
		return;
	}

	$banner_settings        = kinter_option('kinter_shop_banner_setting');
	$banner_woo_image       = kinter_option('banner_woo_image');
	$banner_overlay         = kinter_option('show_woo_banner_overlay');
	$woo_banner_title_color = kinter_option('woo_banner_title_color');
	$banner_image           = KINTER_IMG.'/banner/bredcumbs-1.png';

	//image
	if( $banner_woo_image != '' ){
		$banner_image = wp_get_attachment_image_url($banner_woo_image, "full");
	}
}else{
	//default
	$banner_title    = get_the_title();
	$banner_image    = "";
	$banner_overlay  = "";
	$woo_banner_title_color = "#FFFFFF";
}
if( $banner_image != ''){
	$banner_image = $banner_image;
}

?>

<section class="xs-jumbotron d-flex align-items-center  xs_single_blog_banner <?php  echo esc_attr($banner_image == '' ?' banner-solid':' banner-bg'); ?>" style="background-image: url(<?php echo esc_attr( $banner_image ); ?>)">
	<?php if ($banner_overlay === 'yes') {
		$banner_overlay_color = "";
		if ( defined( 'DEVM' ) ) {
			$banner_overlay_color = kinter_option("woo_banner_overlay_color");
		}
		?>
	<div class="xs-solid-overlay" style="background-color: <?php echo esc_attr($banner_overlay_color === '' ? 'rgba(0,0,0,.5)' : $banner_overlay_color); ?>"></div>
	<?php }; ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="xs-jumbotron-content-wraper">
					<h1 class="xs-jumbotron-title xs-woocommerce-title" style="color: <?php echo esc_attr($woo_banner_title_color === '' ? '#FFFFFF' : $woo_banner_title_color); ?>">
						<?php
						if(is_archive()) {
							$shop_title = explode(':',get_the_archive_title() );
							echo kinter_kses($shop_title[1]);
						} else {
							wp_title();
						}
						?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</section>