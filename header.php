<?php
/**
* The header template for the theme
*/
?>
   <!DOCTYPE html>
 <html <?php language_attributes(); ?>>

   <head>
       <meta charset="<?php bloginfo( 'charset' ); ?>">
       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
       <?php wp_head(); ?>
   </head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<?php
$header_builder_enable = kinter_option('header_builder_enable');
$header_settings       = kinter_option('header_builder_select');

if($header_builder_enable == 'yes' && class_exists('ElementsKit_Lite')){
  if(class_exists('\ElementsKit_Lite\Utils::render_elementor_content')){
     echo \ElementsKit_Lite\Utils::render_elementor_content($header_settings);
   }else{
      $elementor = \Elementor\Plugin::instance();
      echo \ElementsKit_Lite\Utils::render($elementor->frontend->get_builder_content_for_display( $header_settings ));
   }
}else{
  get_template_part( 'template-parts/headers/header', 'content' );
}