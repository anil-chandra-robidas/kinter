<?php

if ( defined( 'DEVM' ) ) {
   // Get page banner control
   $xs_banner_page_settings     = kinter_option('page_banner_setting');

   // Get blog post banner control
   $xs_banner_blog_settings     = kinter_option('blog_banner_setting');

   // Get single post banner control
   $xs_banner_single_blog_settings     = kinter_option('blog_single_banner_setting');

   // Get custom post type banner control
   $xs_banner_custom_post_type_settings     = kinter_option('custom_post_banner_settings');

   // style option
   // Body Bg
   $xs_style_body_bg     = kinter_option('style_body_bg');

   // Primary color
   $xs_style_primary     = kinter_option('style_primary', '#f63c25');


   // Secondary color
   $xs_style_secondary     = kinter_option('style_secondary', '#f5260d');


   // Title color
   $xs_title_color     = kinter_option('title_color', "#101010");

   // Footer color
   $xs_footer_bg_color     = kinter_option('footer_bg_color', '#000');

   // Theme Dark Mode Enable
   $theme_dark_mode_enable     = kinter_option('theme_dark_mode_enable');
   $theme_dark_mode_color     = kinter_option('theme_dark_mode_color');


   $global_body_font = kinter_option( 'body_font' );

   Kinter_DMS_Google_Fonts::add_typography_v2( $global_body_font );
   $body_font = kinter_advanced_font_styles( $global_body_font );

   $heading_font_one = kinter_option( 'heading_font_one' );
   Kinter_DMS_Google_Fonts::add_typography_v2( $heading_font_one );
   $heading_font_one = kinter_advanced_font_styles( $heading_font_one );

   $heading_font_two = kinter_option( 'heading_font_two' );
   Kinter_DMS_Google_Fonts::add_typography_v2( $heading_font_two );
   $heading_font_two = kinter_advanced_font_styles( $heading_font_two );

   $heading_font_three = kinter_option( 'heading_font_three' );
   Kinter_DMS_Google_Fonts::add_typography_v2( $heading_font_three );
   $heading_font_three = kinter_advanced_font_styles( $heading_font_three );

   $heading_font_four = kinter_option( 'heading_font_four' );
   Kinter_DMS_Google_Fonts::add_typography_v2( $heading_font_four );
   $heading_font_four = kinter_advanced_font_styles( $heading_font_four );

   $heading_font_five = kinter_option( 'heading_font_five' );
   kinter_DMS_Google_Fonts::add_typography_v2( $heading_font_five );
   $heading_font_five = kinter_advanced_font_styles( $heading_font_five );

   $heading_font_six = kinter_option( 'heading_font_six' );
   Kinter_DMS_Google_Fonts::add_typography_v2( $heading_font_six );
   $heading_font_six = kinter_advanced_font_styles( $heading_font_six );

   $body_dark_bg = '#101010';
   if ($theme_dark_mode_enable === 'yes') {
       $body_dark_bg = $theme_dark_mode_color;
   }

   $custom_css = "
      h1{
            $heading_font_one
      }
      h2{
            $heading_font_two
      }
      h3{
            $heading_font_three
      }
      h4{
            $heading_font_four
      }
      h5{
            $heading_font_five
      }
      h6{
            $heading_font_six
      }
      body{
         background-color:{$xs_style_body_bg };
         $body_font
      }
      body.xs_theme_dark_mode {
         background-color: $body_dark_bg;
      }
      .logo-area .site-title a , .logo-area .site-desc, .banner-title span{
         color: $xs_style_primary;
      }
      .post .entry-header .entry-title a, .widget-title ,.post-title a ,h1,h2,h3,h4,h5,h6 {
         color: $xs_title_color;
      }
      .post .entry-header .entry-title a:hover,
      .sidebar ul li a:hover, .xs-footer-section ul li a:hover,
      .post-navigation h3:hover, .post-navigation span:hover ,
      .post-meta a:hover,
      .header .navbar-light .navbar-nav li a:hover {
         color:  $xs_style_primary;
      }
      .tag-lists a:hover, .tagcloud a:hover,
      .widget-title:before,
      .block-title.title-border .title-bg,
      .block-title.title-border .title-bg::before ,
      .owl-next, .owl-prev,
      .header .navbar-light .navbar-nav>li.active>a:before,
      .main-slider .owl-prev.disabled,
      .owl-dots:before,
      .featured-tab-item .nav-tabs .nav-link.active:before,
      .owl-theme .owl-dots .owl-dot.active span,
      .ts-footer .widget-title:before,
      .main-slider .owl-next:hover, .main-slider .owl-prev:hover,
      .sidebar .widget.widget_search .input-group-btn, .xs-footer-section .widget.widget_search .input-group-btn,
      .banner-solid,
      .pagination li.active a,
      .wp-block-button:not(.is-style-outline) .wp-block-button__link,
      .wp-block-button .wp-block-button__link:not(.has-background),
      .wp-block-file .wp-block-file__button,
      .back_to_top>a {
         background: $xs_style_primary;
      }
      .pagination li.active a:hover,
      .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover,
      .wp-block-file .wp-block-file__button:hover,
      .btn-primary:hover,
      .back_to_top>a:hover {
         background: $xs_style_secondary;
      }
      .is-style-outline .wp-block-button__link:hover,
      .wp-block-button.is-style-outline .wp-block-button__link:active:not(.has-text-color):hover,
      .wp-block-button.is-style-outline .wp-block-button__link:focus:not(.has-text-color):hover,
      .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color):hover,
      .breadcrumb>li a:hover {
         color: $xs_style_secondary;
      }
      .wp-block-button.is-style-outline .wp-block-button__link:active:not(.has-text-color),
      .wp-block-button.is-style-outline .wp-block-button__link:focus:not(.has-text-color),
      .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color),
      .navbar-nav .nav-link:hover,
      .dropdown-item.active,
      .dropdown-item:active,
      .navbar-nav .dropdown-menu li:hover>a,
      .kinter-recent-post-widget .widget-post .entry-title:hover {
         color: $xs_style_primary;
      }
      .tag-lists a:hover, .tagcloud a:hover,
      .owl-theme .owl-dots .owl-dot.active span{
         border-color: $xs_style_primary;
      }
      .block-title.title-border .title-bg::after{
         border-left-color: $xs_style_primary;
      }
      .block-title.title-border{
         border-bottom-color: $xs_style_primary;
      }

      .topbar .top-nav li a:hover,
      .comments-list .comment-author a:hover,
      .comments-list .comment-reply-link:hover,
      .post-title a:hover,
      .copyright-area a:hover,
      .ts-footer .widget ul li a:hover,
      .featured-tab-item .nav-tabs .nav-link.active .tab-head>span.tab-text-title,
      .social-links li a:hover,
      .comment-author cite a:hover,
      .entry-header .post-meta span i,
      .post .entry-header .post-meta span i,
      .search .page .entry-header .post-meta span i,
      .post .post-media .video-link-btn a,
      .search .page .post-media .video-link-btn a,
      .post .post-footer .readmore:hover,
      .product .post-footer .readmore:hover,
      .search .page .post-footer .readmore:hover,
      .post-navigation-item:hover .post-nav-content>span,
      .author-box .author-url:hover,
      .comment-edit-link:hover,
      #cancel-comment-reply-link:hover,
      .sidebar ul li a.rsswidget:hover, .sidebar ul li a:hover,
      .kinter-recent-post-widget .widget-post .entry-title>a:hover,
      .banner-bg .banner-title span, 
      .banner-bg .xs-jumbotron-title span,
      div.calendar_wrap .wp-calendar-nav span a:hover,
      .header-standard .navbar-nav .dropdown-menu>li:hover>a,
      .navbar-nav .nav-item:hover .nav-link,
      .wp-block-pullquote::before,
      .entry-content a:hover{
         color: $xs_style_primary;
      }
      .copy-right{
         background-color:   $xs_footer_bg_color;
      }
      .btn-primary {
         background-color: $xs_style_primary;
      }
      .sidebar .widget .widget-title:before,
      .kinter-widget>h5:before,
      .pagination li:hover a:hover,
      .navbar-nav .menu-item-has-children .dropdown-menu:before,
      .entry-content .page-links .current span.page-link,
      .entry-content .page-links span.page-link:hover,
      .footer-widget .widget-title:before,
      .post-password-form input[type=submit] {
         background: $xs_style_primary;
      }
      .post.sticky .meta-featured-post::before {
         border-top-color: $xs_style_primary;
         border-left-color: $xs_style_primary;
         border-right-color: $xs_style_primary;
      }
      .post.sticky .meta-featured-post::after,
      .post .post-media .video-link-btn a:hover,
      .search .page .post-media .video-link-btn a:hover,
      .wp-calendar-table #today {
         background: $xs_style_primary;
      }
      .comment-content blockquote, .entry-content blockquote {
         border-left-color: $xs_style_primary;
      }
      .blog-post-comment .comment-respond .comment-form .form-control:focus {
         border-color: $xs_style_primary;
      }
      ";
   wp_add_inline_style( 'kinter-master', $custom_css );
}