<?php
$banner_image             = '';
$banner_title             = '';
$page_show_breadcrumb     = "";
$page_meta_show_breadcumb = "";
$banner_overlay           = "";

if ( defined( 'DEVM' ) ) {
    $page_show_banner      = kinter_option('page_show_banner');
    $page_meta_show_banner = kinter_meta_option( get_the_ID(), 'page_meta_show_banner', 'yes' );

    if( $page_meta_show_banner != 'yes' ){
        return;
    } elseif ( $page_show_banner != 'yes' ){
        return;
    }

    $page_banner_title        = kinter_option('page_banner_title');
    $banner_page_image        = kinter_option('banner_page_image');
    $page_show_breadcrumb     = kinter_option('page_show_breadcrumb');
    $banner_overlay           = kinter_option('show_page_banner_overlay');
    $page_banner_title_color  = kinter_option('page_banner_title_color');

    $banner_image             = kinter_meta_option( get_the_ID(), 'header_image' );
    $page_meta_show_breadcumb = kinter_meta_option( get_the_ID(), 'page_meta_show_breadcumb' );

    //title
    if( kinter_meta_option( get_the_ID(), 'header_title' ) !== '' ){
        $banner_title = kinter_meta_option( get_the_ID(), 'header_title' );
    } elseif ( $page_banner_title !== '' ){
        $banner_title = $page_banner_title;
    } else {
        $banner_title   = get_the_title();
    }

    //image
    if( $banner_image != '' ){
        $banner_image = wp_get_attachment_image_url($banner_image, "full");
    } elseif ( $banner_page_image != '' ){
        $banner_image = wp_get_attachment_image_url($banner_page_image, "full");
    } else {
        $banner_image = KINTER_IMG.'/banner/bredcumbs-1.png';
    }

} else {
     //default
     $banner_image = "";
     $banner_title = get_the_title();
     $page_banner_title_color = "#ffffff";
     $banner_overlay = "";
     $page_show_breadcrumb = "yes";
 }

 if( $banner_image != '' ){
    $banner_image = $banner_image;
 }

?>

<section class="xs-jumbotron xs-innner-page-banner d-flex align-items-center <?php echo esc_attr($banner_image == ''?'banner-solid':'banner-bg'); ?>" style="background-image: url(<?php echo esc_attr( $banner_image ); ?>)">
    <?php if ($banner_overlay === 'yes') {
        $banner_overlay_color = "";
		if ( defined( 'DEVM' ) ) {
			$banner_overlay_color = kinter_option("page_banner_overlay_color");
		}
        ?>
    <div class="xs-solid-overlay" style="background-color: <?php echo esc_attr($banner_overlay_color === '' ? 'rgba(0,0,0,.5)' : $banner_overlay_color); ?>"></div>
    <?php }; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="xs-jumbotron-content-wraper">
                    <h1 class="xs-jumbotron-title" style="color: <?php echo esc_attr($page_banner_title_color === '' ? '#ffffff' : $page_banner_title_color); ?>">
                        <?php
                        if(is_archive()) {
                            the_archive_title();
                        } elseif(is_single()) {
                            the_title();
                        } else {
                            echo kinter_kses( $banner_title );
                        }
                        ?>
                    </h1>
                    <?php
                    if( $page_show_breadcrumb === 'yes' ){
                        kinter_get_breadcrumbs(" / ");
                    } elseif ( $page_meta_show_breadcumb === 'yes' ){
                        kinter_get_breadcrumbs(" / ");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>