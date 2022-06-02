<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * register ajax
 */
if ( ! function_exists( 'atbs_enqueue_ajax_url' ) ) {
	function atbs_enqueue_ajax_url() {
        echo '<script type="application/javascript">var ajaxurl = "' . esc_url(admin_url( 'admin-ajax.php' )) . '"</script>';
	}
	add_action( 'wp_enqueue_scripts', 'atbs_enqueue_ajax_url' );
}
/**-------------------------------------------------------------------------------------------------------------------------
 * Enqueue All Scripts
 */
if ( ! function_exists( 'atbs_scripts_method' ) ) {
    function atbs_scripts_method() {
        
        wp_enqueue_script('imagesLoaded');
        wp_enqueue_script('jquery-masonry', array( 'imagesLoaded' ),'', true);

        wp_enqueue_style( 'boostrap', get_template_directory_uri().'/css/vendors/boostrap.css', array(), '' );
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/vendors/owl-carousel.css', array('boostrap'), '' );
        wp_enqueue_style( 'perfect-scrollbar', get_template_directory_uri().'/css/vendors/perfect-scrollbar.css', array('owl-carousel'), '' );
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/vendors/magnific-popup.css', array('perfect-scrollbar'), '' );
        wp_enqueue_style( 'fotorama', get_template_directory_uri().'/css/vendors/fotorama.css', array('magnific-popup'), '' );
        
        wp_enqueue_style( 'atbs-style', get_template_directory_uri().'/css/style.css', array('fotorama'), '' );

        //vendors
        wp_enqueue_script('throttle-debounce', get_template_directory_uri() . '/js/vendors/throttle-debounce.min.js', array('jquery'),false, true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendors/bootstrap.min.js', array('throttle-debounce'),false, true);
        wp_enqueue_script('fotorama', get_template_directory_uri() . '/js/vendors/fotorama.min.js', array('bootstrap'),false, true);
        wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/vendors/magnific-popup.min.js', array('fotorama'),false, true);
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/vendors/owl-carousel.min.js', array('magnific-popup'),false, true);
        wp_enqueue_script('perfect-scrollbar', get_template_directory_uri() . '/js/vendors/perfect-scrollbar.min.js', array('owl-carousel'),false, true);
        wp_enqueue_script('theiaStickySidebar', get_template_directory_uri() . '/js/vendors/theiaStickySidebar.min.js', array('perfect-scrollbar'),false, true);
        wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/vendors/fitvids.js', array('theiaStickySidebar'),false, true);

        //theme scripts
        wp_enqueue_script('atbs-scripts', get_template_directory_uri() . '/js/scripts.js', array('fitvids'),false, true);

        if ( is_singular() ) {wp_enqueue_script('comment-reply');}
     }
}

add_action('wp_enqueue_scripts', 'atbs_scripts_method');

/**-------------------------------------------------------------------------------------------------------------------------
 * Enqueue Admin Scripts
 */
if ( ! function_exists( 'atbs_post_admin_scripts_and_styles' ) ) {
    function atbs_post_admin_scripts_and_styles($hook) {
        global $wp_version;
    	if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
            wp_enqueue_script( 'bootstrap-admin', get_template_directory_uri().'/framework/bootstrap-admin/bootstrap.js', array(), '', true );
            wp_enqueue_style( 'bootstrap-admin', get_template_directory_uri().'/framework/bootstrap-admin/bootstrap.css', array(), '' );
   		}

        wp_enqueue_style( 'datepicker', get_template_directory_uri().'/css/admin/bootstrap-datepicker3.min.css', array(), '' );
        wp_enqueue_style( 'colorpicker', get_template_directory_uri().'/css/admin/bootstrap-colorpicker.min.css', array(), '' );
        wp_enqueue_style( 'keylin-admin', get_template_directory_uri().'/css/admin/keylin-admin.css', array(), '' );
        add_editor_style('css/admin/editorstyle.css');
        wp_enqueue_script('throttle-debounce', get_template_directory_uri() . '/js/vendors/throttle-debounce.min.js', array('jquery'),false, true);
        wp_enqueue_script( 'datepickerjs', get_template_directory_uri().'/js/admin/bootstrap-datepicker.min.js', array(), '', true );
        wp_enqueue_script( 'colorpickerjs', get_template_directory_uri().'/js/admin/bootstrap-colorpicker.min.js', array(), '', true );
        wp_enqueue_script( 'autosize', get_template_directory_uri().'/js/admin/jquery.autosize.min.js', array(), '', true );

        if (is_admin()) {
            if ( version_compare( $wp_version, '5.0', '>=' ) ) {
                if ( !class_exists( 'Classic_Editor' ) ) {
                    wp_enqueue_script( 'atbs-admin', get_template_directory_uri().'/js/admin/admin-gutenberg.js', array('jquery-ui-sortable'), '', true );
                }else {
                    wp_enqueue_script( 'atbs-admin', get_template_directory_uri().'/js/admin/admin.js', array('jquery-ui-sortable'), '', true );
                }
            }else {
                if (!function_exists('gutenberg_pre_init')) {
                    wp_enqueue_script( 'atbs-admin', get_template_directory_uri().'/js/admin/admin.js', array('jquery-ui-sortable'), '', true );
                }else {
                    wp_enqueue_script( 'atbs-admin', get_template_directory_uri().'/js/admin/admin-gutenberg.js', array('jquery-ui-sortable'), '', true );
                }
            }
        }
    }
}
add_action('admin_enqueue_scripts', 'atbs_post_admin_scripts_and_styles');