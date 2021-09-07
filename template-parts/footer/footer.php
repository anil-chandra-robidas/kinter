<?php
   $general_footer_logo = "";
   $back_to_top = "";

   if ( defined( 'DEVM' ) ) {
      $back_to_top         = kinter_option('back_to_top');
      $general_footer_logo = kinter_option('general_footer_logo');
   }

?>

   <?php if(defined( 'DEVM' )): ?>
      <?php if( is_active_sidebar('footer-left') || is_active_sidebar('footer-center') || is_active_sidebar('footer-right') ): ?>
         <footer class="xs-footer solid-bg-two xs-footer-classic" >
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-12">
                     <?php  dynamic_sidebar( 'footer-left' ); ?>

                  </div>
                  <div class="col-lg-4 col-md-6">
                     <?php  dynamic_sidebar( 'footer-center' ); ?>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <?php  dynamic_sidebar( 'footer-right' ); ?>
                  </div>
                  <!-- end col -->
               </div>
           </div>

         </footer>
      <?php endif; ?>
   <?php endif; ?>
   <?php if (has_nav_menu('footermenu')) { ?>
   <div class="footer-menu header header-standard">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="navbar navbar-expand-lg <?php echo esc_attr(($general_footer_logo == "" || $general_footer_logo == null) ? "logo-not-entry" : ""); ?>">
                  <?php if ($general_footer_logo != "" || $general_footer_logo != null) { ?>
                  <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                     <?php echo wp_get_attachment_image($general_footer_logo, 'full', false, array(
                        'class' => 'img-fluid',
                        'alt'   => get_bloginfo('name')
                      )); ?>
                  </a>
                  <?php } ?>
                  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#footermenu-nav" aria-controls="footermenu-nav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="header-navbar-toggler-icon"></span>
                     <span class="header-navbar-toggler-icon"></span>
                     <span class="header-navbar-toggler-icon"></span>
                  </button>
                  <?php get_template_part( 'template-parts/navigations/nav', 'footer' ); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php }; ?>
   <div class="copy-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
                  <div class="copyright-text">
                  <?php
                        $copyright_text = kinter_option('footer_copyright', 'Copyright &copy; '.date('Y').' Kinter. All Right Reserved.');
                     echo kinter_kses($copyright_text);
                  ?>
                  </div>
            </div>
         </div>
         <!-- end row -->
      </div>
   </div>
   <!-- end footer -->
   <?php if($back_to_top=="yes"): ?>
      <div class="back_to_top">
         <a href="#" class="fas fa-angle-up" aria-hidden="true"></a>
      </div>
   <?php endif; ?>