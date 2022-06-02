<?php
if ( ! function_exists( 'keylin_enqueue_editor' ) ) {
    function keylin_enqueue_editor() {
        wp_enqueue_style( 'keylin-google-font-editor', esc_url_raw( keylin_editor_font_urls() ), array(), false, 'all' );
        wp_enqueue_style( 'keylin-editor-style', get_theme_file_uri( 'css/backend/assets/editor.css' ), array(), false, 'all' );
    }
}
add_action( 'enqueue_block_editor_assets', 'keylin_enqueue_editor', 990 );
add_action( 'enqueue_block_editor_assets', 'keylin_editor_dynamic', 999 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function atbs_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'atbs_pingback_header' );

if ( ! function_exists( 'keylin_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function keylin_theme_setup() {
	   
	   /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
        load_theme_textdomain( 'keylin', get_template_directory() .'/languages' );
        
        // Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        
        add_theme_support( 'post-formats', array( 'gallery', 'video' ) );
        
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        
        add_image_size( 'atbs-xxs-4_3', 180, 135, true );
        add_image_size( 'atbs-xxs-1_1', 180, 180, true );
        add_image_size( 'atbs-xxs-16_9', 400, 225, true );
        add_image_size( 'atbs-xs-4_3', 400, 300, true );
        add_image_size( 'atbs-xs-2_1', 400, 200, true );
        add_image_size( 'atbs-xs-1_1', 400, 400, true );
        add_image_size( 'atbs-s-16_9', 600, 338, true );
        add_image_size( 'atbs-s-4_3', 600, 450, true );
        add_image_size( 'atbs-s-2_1', 600, 300, true );
        add_image_size( 'atbs-s-1_1', 600, 600, true );
        add_image_size( 'atbs-m-1_1', 800, 800, true );
        add_image_size( 'atbs-m-16_9', 800, 450, true );
        add_image_size( 'atbs-m-4_3', 800, 600, true );
        add_image_size( 'atbs-m-2_1', 800, 400, true );
        add_image_size( 'atbs-l-16_9', 1200, 675, true );
        add_image_size( 'atbs-l-4_3', 1200, 900, true );
        add_image_size( 'atbs-l-2_1', 1200, 600, true );
        add_image_size( 'atbs-xl-16_9', 1600, 900, true );
        add_image_size( 'atbs-xl-4_3', 1600, 1200, true );
        add_image_size( 'atbs-xl-2_1', 1600, 800, true );
        add_image_size( 'atbs-xxl', 2000, 1125, true );
        add_image_size( 'atbs-auto-size', 400, 99999, false );
        add_image_size( 'atbs-auto-size-w800', 800, 99999, false );
        
        // This theme uses wp_nav_menu().
        register_nav_menu('top-menu', esc_html__( 'Top Menu','keylin'));
        register_nav_menu('main-menu', esc_html__( 'Main Menu','keylin'));
        register_nav_menu('footer-menu', esc_html__( 'Footer Menu','keylin'));
        register_nav_menu('offcanvas-menu', esc_html__( 'Offcanvas Menu','keylin'));
        
        // Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
    }
	   
endif;
add_action( 'after_setup_theme', 'keylin_theme_setup' );


function atbs_modify_main_query( $query ) {
    global $atbs_option;
    if ($atbs_option == '') {
        return;
    }

    if($query->is_main_query() AND !is_admin() ) {
        if ( is_category() ){
            $excludeIDs = array();
            $posts_per_page = 0;
            $term_id = get_queried_object_id();
            $featAreaOption  = ATBS_Archive::bk_get_archive_option($term_id, 'bk_category_feature_area__post_option');
            if(function_exists('rwmb_meta')) {
                $is_exclude = rwmb_meta( 'bk_category_exclude_posts', array( 'object_type' => 'term' ), $term_id );
            }else {
                $is_exclude = '';
            }
            if (isset($is_exclude) && (($is_exclude == 'global_settings') || ($is_exclude == ''))):
                $is_exclude = $atbs_option['bk_category_exclude_posts'];
            endif;
            if(($is_exclude == 1) || ($featAreaOption == 'latest')) {
                $sticky = get_option('sticky_posts') ;
                rsort( $sticky );
                if(function_exists('rwmb_meta')) {
                    $featLayout = rwmb_meta( 'bk_category_feature_area', array( 'object_type' => 'term' ), $term_id );
                }else {
                    $featLayout = 'global_settings';
                }
                if (isset($is_exclude) && (($featLayout == 'global_settings') || ($featLayout == ''))):
                    $featLayout = $atbs_option['bk_category_feature_area'];
                endif;
                $args = array (
                    'post_type'     => 'post',
                    'cat'           => $term_id, // Get current category only
                    'order'         => 'DESC',
                );
                $exclude_posts_sw  = ATBS_Archive::bk_get_archive_option($term_id, 'bk_category_exclude_posts');
                if($exclude_posts_sw == 'global_settings'):
                    $exclude_posts  = isset($atbs_option['bk_category_exclude_posts']) ? $atbs_option['bk_category_exclude_posts'] : '1';
                else:
                    $exclude_posts  = ATBS_Archive::bk_get_archive_option($term_id, 'bk_category_exclude_posts');
                endif;
                if($exclude_posts == '0' ):
                    $posts_per_page = 0;
                else:
                    switch($featLayout){
                        case 'posts_block_b' :
                            $posts_per_page = 6;
                            break;
                        case 'mosaic_a' :
                        case 'mosaic_a_bg' :
                        case 'featured_block_e' :
                        case 'featured_block_f' :
                        case 'posts_block_i' :
                            $posts_per_page = 5;
                            break;
                        case 'mosaic_b' :
                        case 'mosaic_b_bg' :
                        case 'posts_block_c' :
                            $posts_per_page = 4;
                            break;
                        case 'mosaic_c' :
                        case 'mosaic_c_bg' :
                        case 'posts_block_e' :
                        case 'posts_block_e_bg' :
                            $posts_per_page = 3;
                            break;
                        default:
                            $posts_per_page = 0;
                            break;
                    }
                endif;
                if($posts_per_page == 0) :
                    wp_reset_postdata();
                    return;
                endif;
                $args['posts_per_page'] = $posts_per_page;
                if($featAreaOption == 'featured') {
                    $args['post__in'] = $sticky; // Get stickied posts
                }
                $sticky_query = new WP_Query( $args );
                while ( $sticky_query->have_posts() ): $sticky_query->the_post();
                    $excludeIDs[] = get_the_ID();
                endwhile;
                wp_reset_postdata();
                $query->set( 'post__not_in', $excludeIDs );
            }else {
                return;
            }
        }
    }
}
add_action( 'pre_get_posts', 'atbs_modify_main_query' );

require_once (get_template_directory() . '/library/meta_box_config.php');


/**
 * http://codex.wordpress.org/Content_Width
 */
if ( ! isset($content_width)) {
	$content_width = 1200;
}

/**
 * Remove Comment Default Style
 */
add_filter( 'show_recent_comments_widget_style', '__return_false' );


/**
 * Add Image Column To Posts Page
 */
function atbs_featured_image_column_image( $image ) {
    if ( !ATBS_Core::bk_check_has_post_thumbnail(get_the_ID()) )
        return trailingslashit( get_stylesheet_directory_uri() ) . 'images/no-featured-image';
}
add_filter( 'featured_image_column_default_image', 'atbs_featured_image_column_image' );

function atbs_category_nav_class( $classes, $item ){
    if ( 'category' == $item->object ){
        $classes[] = 'menu-item-cat-' . $item->object_id;
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'atbs_category_nav_class', 10, 4 );

function atbs_custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'atbs_custom_excerpt_length', 999 );

/**
 * ReduxFramework
 */
if ( ! function_exists( 'atbs_remove_redux_page' ) ) {
	function atbs_remove_redux_page() {
		remove_submenu_page( 'tools.php', 'redux-about' );
	}
	add_action( 'admin_menu', 'atbs_remove_redux_page', 12 );
}
/**-------------------------------------------------------------------------------------------------------------------------
 * Init
 */
if ( !isset( $atbs_option ) && file_exists( ATBS_LIBS.'theme-options/theme-option.php' ) ) {
    require_once( ATBS_THEMEOPTONS.'theme-option.php' );
    require_once( ATBS_THEMEOPTONS_SECTIONS.'all-sections.php' );
}
/**
 * Register sidebars and widgetized areas.
 *---------------------------------------------------
 */
 if ( ! function_exists( 'atbs_widgets_init' ) ) {
    function atbs_widgets_init() {

        $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
        $headingStyle = isset($atbs_option['bk-default-widget-heading']) ? $atbs_option['bk-default-widget-heading'] : '';
        if ($headingStyle) {
            $headingClass = ATBS_Core::bk_get_widget_heading_class($headingStyle);
        }else {
            $headingClass = 'block-heading--line';
        }
        register_sidebar( array(
    		'name' => esc_html__('Sidebar', 'keylin'),
    		'id' => 'home_sidebar',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget' => '</div>',
    		'before_title' => '<div class="widget__title block-heading '.$headingClass.'"><h4 class="widget__title-text">',
    		'after_title' => '</h4></div>',
    	) );
        
        if(($atbs_option['bk-footer-template'] == 'footer-6') || ($atbs_option['bk-footer-template'] == 'footer-7')) :
            register_sidebar( array(
        		'name' => esc_html__('Footer Column 1', 'keylin'),
        		'id' => 'footer_col_1',
        		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        		'after_widget' => '</div>',
        		'before_title' => '<div class="widget__title block-heading '.$headingClass.'"><h4 class="widget__title-text">',
        		'after_title' => '</h4></div>',
        	) );
    
            register_sidebar( array(
        		'name' => esc_html__('Footer Column 2', 'keylin'),
        		'id' => 'footer_col_2',
        		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        		'after_widget' => '</div>',
        		'before_title' => '<div class="widget__title block-heading '.$headingClass.'"><h4 class="widget__title-text">',
        		'after_title' => '</h4></div>',
        	) );
    
            register_sidebar( array(
        		'name' => esc_html__('Footer Column 3', 'keylin'),
        		'id' => 'footer_col_3',
        		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        		'after_widget' => '</div>',
        		'before_title' => '<div class="widget__title block-heading '.$headingClass.'"><h4 class="widget__title-text">',
        		'after_title' => '</h4></div>',
        	) );
        endif;
    }
}
add_action( 'widgets_init', 'atbs_widgets_init' );

/**
 * Save Post Content Word Count
 *---------------------------------------------------
 */
function atbs_post_content__word_count($postID){
    $content = get_post_field( 'post_content', $postID );
    $word_count = str_word_count( strip_tags( $content ) );
    $lastLength = get_post_meta($postID, 'atbs_post_content__word_count');
    if (!empty($lastLength)) :
        if (($lastLength[0] != '') && ($lastLength[0] != $word_count)) :
            update_post_meta($postID, 'atbs_post_content__word_count', $word_count);
        elseif ($lastLength[0] == '') :
            add_post_meta($postID, 'atbs_post_content__word_count', $word_count, true);
        endif;
    endif;
}

add_action( 'post_updated', 'atbs_post_content__word_count', 10, 1 ); //don't forget the last argument to allow all three arguments of the function

/**
 * Remove Pages form search results
 *---------------------------------------------------
 */
function atbs_remove_pages_from_search() {
    $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');
    if(isset($atbs_option['bk_search_exclude_page_result']) && ($atbs_option['bk_search_exclude_page_result'] == 'enable')) {
        global $wp_post_types;
        $wp_post_types['page']->exclude_from_search = true;
    }
}
add_action('init', 'atbs_remove_pages_from_search');

/**
 * Add responsive container to embeds video
 */
if ( !function_exists('atbs_embed_html') ){
	function atbs_embed_html( $embed, $url = '', $attr = '' ) {
		$accepted_providers = array(
			'youtube',
			'vimeo',
			'slideshare',
			'dailymotion',
			'viddler.com',
			'hulu.com',
			'blip.tv',
			'revision3.com',
			'funnyordie.com',
			'wordpress.tv',
		);
		$resize = false;

		// Check each provider
		foreach ( $accepted_providers as $provider ) {
			if ( strstr( $url, $provider ) ) {
				$resize = true;
				break;
			}
		}
		if ( $resize ) {
	    	return '<div class="atbs-keylin-responsive-video">' . $embed . '</div>';
	    } else {
	    	return $embed;
	    }
	}
}
add_filter( 'embed_oembed_html', 'atbs_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'atbs_embed_html' ); // Jetpack

/**
 * Limit number of tags in widget tag cloud
 */
if ( !function_exists('atbs_tag_widget_limit') ) {
  function atbs_tag_widget_limit($args){

    //Check if taxonomy option inside widget is set to tags
    if (isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
      $args['number'] = 16; //Limit number of tags
      $args['smallest'] = 12; //Size of lowest count tags
      $args['largest'] = 12; //Size of largest count tags
      $args['unit'] = 'px'; //Unit of font size
      $args['orderby'] = 'count'; //Order by counts
      $args['order'] = 'DESC';
    }

    return $args;
  }
}
add_filter('widget_tag_cloud_args', 'atbs_tag_widget_limit');

add_action('amp_post_template_css','ampforwp_add_custom_css', 11);
function ampforwp_add_custom_css() {
    require_once (get_template_directory().'/ampforwp/custom_style.php');
}


function atbs_setup_darkmode_status() {
    $atbs_option          = ATBS_Core::bk_get_global_var('atbs_option');
    $darkModeEnabled      = ( isset($atbs_option['bk_enable_darkmode']) && $atbs_option['bk_enable_darkmode'] ) ? true : false;
    $darkModeSW           = ( isset($atbs_option['bk_darkmode_sw']) && $atbs_option['bk_darkmode_sw'] ) ? true : false;
    $darkModeDefault      = ( isset($atbs_option['bk_default_darkmode']) && $atbs_option['bk_default_darkmode'] ) ? true : false;
    $darkModeCookie       = ATBS_Core::bk_get_darkmode_cookie();

    if ( $darkModeEnabled ) {
        if ( $darkModeDefault ) {
            if ( $darkModeCookie !== false ) { // Cookie not set
                if ( !$darkModeSW ) {
                    ATBS_Core::bk_remove_darkmode_cookie();
                }
            }
        } elseif ( !$darkModeSW && !$darkModeDefault ) {
            ATBS_Core::bk_remove_darkmode_cookie();
        }
    } else {
        if ( $darkModeCookie !== false ) {
            ATBS_Core::bk_remove_darkmode_cookie();
        }
    }
}
add_action( 'init', 'atbs_setup_darkmode_status');
?>
