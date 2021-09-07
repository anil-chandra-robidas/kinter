
	<?php
		$footer_builder_enable = kinter_option('footer_builder_control_enable');
		$footer_settings = kinter_option('footer_builder_select');
		if($footer_builder_enable=='yes' && class_exists('ElementsKit_Lite')){
			if(class_exists('\ElementsKit_Lite\Utils::render_elementor_content')){
				echo \ElementsKit_Lite\Utils::render_elementor_content($footer_settings);
			}else{
				$elementor = \Elementor\Plugin::instance();
				echo \ElementsKit_Lite\Utils::render($elementor->frontend->get_builder_content_for_display( $footer_settings ));
			}
		} else {
			get_template_part( 'template-parts/footer/footer', 'content' );
		}
		wp_footer();
	?>
   </body>
</html>