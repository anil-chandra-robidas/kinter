<?php
   $class = '';
   $title = '';
   $default_class = '';
   $general_main_logo = "";

   if ( defined( 'DEVM' ) ) {
      $header_top_info_show      = kinter_option('header_top_info_show');
      $header_contact_mail       = kinter_option('header_contact_mail');
      $header_contact_address    = kinter_option('header_contact_address');
      $header_Contact_number     = kinter_option('header_Contact_number');
      $general_main_logo         = kinter_option('general_main_logo');
      $header_nav_search_section = kinter_option('header_nav_search_section');
      $header_quota_button       = kinter_option('header_quota_button');
      $header_nav_sticky         = kinter_option('header_nav_sticky');

      if($header_quota_button == 'yes'){
         $header_quota_text = kinter_option('header_quota_text');
         $header_quota_url  = kinter_option('header_quota_url');
      }
      //Page settings
      $default_class .="";
   }else{
      $header_top_info_show      = "no";
      $header_contact_mail       = '';
      $header_contact_address    = '';
      $header_quota_button       = 'yes';
      $header_nav_search_section = 'yes';
      $header_quota_url          = "#";
      $header_quota_text         = esc_html__('Get a quote','kinter');
      $header_nav_sticky         = 'no';
      $default_class .= 'header_default';
   }

   $logo     = (isset( $general_main_logo ) && !empty( $general_main_logo ) ? wp_get_attachment_image($general_main_logo, 'full', false, array(
      'class'  => 'img-responsive',
      'alt'    => get_bloginfo( 'name' )
   ) ) : '<img class="img-responsive" width="170" height="60" src="'. KINTER_IMG . '/logo/logo-common.png' .'" alt="'.get_bloginfo( 'name' ).'">');


?>

<?php if(defined( 'DEVM' ) && $header_top_info_show =='yes' ): ?>
<div class="topbar">
   <div class="container">
      <ul class="top-info">
         <?php if($header_contact_mail!=''): ?>
           <li><i class="icon icon-envelope2"></i> <?php echo kinter_kses($header_contact_mail); ?> </li>
         <?php endif; ?>
         <?php if($header_contact_address!=''): ?>
           <li><i class="icon icon-map-marker1"></i> <?php echo kinter_kses($header_contact_address); ?></li>
         <?php endif; ?>
         <?php if($header_Contact_number!=''): ?>
           <li><i class="icon icon-phone-call2"></i> <?php echo kinter_kses($header_Contact_number); ?></li>
         <?php endif; ?>
      </ul>
   <!-- end container -->
   </div>
</div>
<?php endif; ?>
<header id="header" class="header header-standard <?php echo esc_attr( $default_class); ?> <?php echo esc_attr($header_nav_sticky=='yes'?'navbar-sticky':''); ?>">
   <div class="header-wrapper">
      <div class="container">
         <nav class="navbar navbar-expand-lg">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
               <?php echo $logo; ?>
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="header-navbar-toggler-icon"></span>
               <span class="header-navbar-toggler-icon"></span>
               <span class="header-navbar-toggler-icon"></span>
            </button>
            <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
            <?php if(defined( 'DEVM' )): ?>
               <?php if($header_nav_search_section=='yes'): ?>
               <div class="nav-search-area">
                  <div class="nav-search">
                     <span id="search">
                     <i class="fas fa-search" aria-hidden="true"></i>
                     </span>
                  </div>
                  <div class="search-block">
                     <?php get_search_form(); ?>
                  </div>
                  <!--Search End-->
               </div>
               <?php endif; ?>
            <?php endif; ?>
            <!-- Site search end-->
            <?php if(defined( 'DEVM' )): ?>
               <?php if($header_quota_button =='yes' && $header_quota_text != ''): ?>
                  <div class="header-quote <?php if(!is_user_logged_in()){echo esc_attr("ml-auto");}?>">
                     <a href="<?php echo esc_url($header_quota_url); ?>" class="quote-btn btn">  <?php echo esc_html($header_quota_text); ?>
                     </a>
                  </div>
               <?php endif; ?>
            <?php endif; ?>
         </nav>
      </div><!-- container end-->
   </div><!-- header wrapper end-->
</header>
