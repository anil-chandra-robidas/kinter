<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Kinter_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;


    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     *
     * @since 1.0
     */

	public function __construct(){
        add_action('elementskit/loaded', [$this, 'init']);
        $this->kinter_custom_icon_pack();
    }


	public function init(){

        add_action('elementor/init', array($this, 'kinter_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'kinter_elementor_init' ), 11 );
        add_action('elementor/widgets/widgets_registered', array($this, 'kinter_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */

     public function enqueue_scripts() {
        wp_enqueue_script( 'kinter-main-elementor', KINTER_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), KINTER_VERSION, true );

        // ekit pro script and style
        if (class_exists('ElementsKit_Lite')) {
            if(\ElementsKit_Lite::package_type() == 'free' && !in_array('elementskit/elementskit.php', apply_filters('active_plugins', get_option('active_plugins')))){
                wp_enqueue_style( 'kinter-widget-styles-pro', KINTER_CSS . '/widget-styles-pro.css', null, KINTER_VERSION );
                wp_enqueue_script( 'kinter-widget-scripts-pro', KINTER_JS . '/widget-scripts-pro.js', array( 'jquery', 'elementor-frontend' ), KINTER_VERSION, true );
            }
        }
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */


    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function kinter_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'kinter-elements',
            [
                'title' =>esc_html__( 'Kinter', 'kinter' ),
                'icon' => 'fas fa-plug',
            ],
            1
        );
    }
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */

    public function kinter_icon_pack( $controls_manager ) {

        require_once KINTER_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'Kinter_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }

    public function kinter_custom_icon_pack(  ) {

		$this->__generate_font();

        add_filter( 'elementor/icons_manager/additional_tabs', [ $this, '__add_font']);

    }
    public function __add_font( $font){
        $font_new['icon-kinter'] = [
            'name' => 'icon-kinter',
            'label' => esc_html__( 'Kinter Icon', 'kinter' ),
            'url' => KINTER_CSS . '/xs-icon-font.css',
            'enqueue' => [ KINTER_CSS . '/xs-icon-font.css' ],
            'prefix' => 'xsicon-',
            'displayPrefix' => 'xsicon',
            'labelIcon' => 'xsicon xsicon-icon031',
            'ver' => '5.9.0',
            'fetchJson' => KINTER_JS . '/xs-icon-font.js',
            'native' => true,
        ];
        return  array_merge($font, $font_new);
    }

	public function __generate_font(){
		global $wp_filesystem;

        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();
        $css_file =  KINTER_CSS_DIR . '/xs-icon-font.css';

        if ( $wp_filesystem->exists( $css_file ) ) {
            $css_source = $wp_filesystem->get_contents( $css_file );
        } // End If Statement

		preg_match_all( "/\.(xsicon-.*?):\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
		$iconList = [];

		foreach ( $matches as $match ) {
			$new_icons[$match[1] ] = str_replace('xsicon-', '', $match[1]);
			$iconList[] = str_replace('xsicon-', '', $match[1]);
		}

		$icons = new \stdClass();
		$icons->icons = $iconList;
		$icon_data = json_encode($icons);

		$file = KINTER_THEME_DIR . '/assets/js/xs-icon-font.js';

        global $wp_filesystem;
        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();
        if ( $wp_filesystem->exists( $file ) ) {
            $content =  $wp_filesystem->put_contents( $file, $icon_data) ;
        }
	}

    public function kinter_shortcode_elements($widgets_manager){
        require_once KINTER_EDITOR_ELEMENTOR.'/widgets/icon-box/icon-box.php';
        $widgets_manager->register_widget_type(new Elementor\XS_Icon_Box_Widget());

        require_once KINTER_EDITOR_ELEMENTOR.'/widgets/trainer/trainer.php';
        $widgets_manager->register_widget_type(new Elementor\XS_Trainer_Widget());

        require_once KINTER_EDITOR_ELEMENTOR.'/widgets/service-box/service-box.php';
        $widgets_manager->register_widget_type(new Elementor\XS_Service_Box_Widget());

        require_once KINTER_EDITOR_ELEMENTOR.'/widgets/bmi-calculator/bmi-calculator.php';
        $widgets_manager->register_widget_type(new Elementor\XS_Bmi_Calculator_Widget());

        require_once KINTER_EDITOR_ELEMENTOR.'/widgets/blog-post/blog-post.php';
        $widgets_manager->register_widget_type(new Elementor\Xs_Blog_Widget());

        require_once KINTER_EDITOR_ELEMENTOR.'/widgets/advanced-tab/advanced-tab.php';
        $widgets_manager->register_widget_type(new Elementor\Kinter_Advanced_Tab_Widget());

        if(class_exists('\Elementor\ElementsKit_Widget_Creative_Button')){
            $widgets_manager->register_widget_type(new Elementor\ElementsKit_Widget_Creative_Button());
        }
        if(class_exists('\Elementor\ElementsKit_Widget_table')){
            $widgets_manager->register_widget_type(new Elementor\ElementsKit_Widget_table());
        }
        if(class_exists('\Elementor\ElementsKit_Widget_Woo_Product_List')){
            $widgets_manager->register_widget_type(new Elementor\ElementsKit_Widget_Woo_Product_List());
        }
        if(class_exists('\Elementor\ElementsKit_Widget_Gallery')){
            $widgets_manager->register_widget_type(new Elementor\ElementsKit_Widget_Gallery());
        }
    }

	public static function kinter_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new kinter_Shortcode();
        }
        return self::$_instance;
    }

}
Kinter_Shortcode::kinter_get_instance();

if(!defined('ELEMENTOR_PRO_VERSION')){
    add_action( 'elementor/editor/after_enqueue_styles', function() {
        wp_enqueue_style( 'xs-elementor-editor-panel',  KINTER_CSS . '/elementor-editor-panel.css', null,  KINTER_VERSION );
    });
}