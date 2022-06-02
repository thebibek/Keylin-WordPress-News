<?php
/** delete cache */
add_action( 'after_switch_theme', 'keylin_delete_editor_styles_cache' );
add_action( 'redux/options/keylin_option/saved', 'keylin_delete_editor_styles_cache' );
add_action( 'redux/options/keylin_option/reset', 'keylin_delete_editor_styles_cache' );
add_action( 'redux/options/keylin_option/section/reset', 'keylin_delete_editor_styles_cache' );

/** load default fonts */
if ( ! function_exists( 'keylin_font_urls' ) ) {
	function keylin_font_urls() {

		$fonts_url       = '';
		$font_head  = _x( 'on', 'Poppins font: on or off', 'keylin' );
		$font_body = _x( 'on', 'Roboto font: on or off', 'keylin' );

		if ( 'off' !== $font_head || 'off' !== $font_body ) {

			$font_families = array();
			if ( 'off' !== $font_head ) {
				$font_families[] = 'Poppins:300,400,500,600,700';
			}
			if ( 'off' !== $font_body ) {
				$font_families[] = 'Roboto:400,400i,500,600,700,900';
			}
			$params    = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
			$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

/** editor fonts */
if ( ! function_exists( 'keylin_editor_font_urls' ) ) {
	function keylin_editor_font_urls() {
		if ( ! class_exists( 'ReduxFramework' ) ) {
			return keylin_font_urls();
		}
        
		$body_font    = ATBS_Core::bk_get_theme_option( 'body-typography' );
		$heading_font = ATBS_Core::bk_get_theme_option( 'heading-typography' );
        $secondary_font = ATBS_Core::bk_get_theme_option( 'meta-typography' );
		$meta_font    = ATBS_Core::bk_get_theme_option( 'tertiary-typography' );

		$font_families = array();
		if ( ! empty( $body_font['font-family'] ) ) {
			$font_families[] = $body_font['font-family'] . ':300,400,500,600,700';
		} else {
			$font_families[] = 'Roboto:400,400i,700,700i';
		}
		if ( ! empty( $heading_font['font-family'] ) ) {
			$font_families[] = $heading_font['font-family'] . ':300,400,500,600,700';
		} else {
			$font_families[] = 'Poppins:300,400,500,600,700';
		}
        
        if ( ! empty( $secondary_font['font-family'] ) ) {
			$font_families[] = $secondary_font['font-family'] . ':300,400,500,600,700';
		} else {
			$font_families[] = 'Poppins:300,400,500,600,700';
		}
        
		if ( ! empty( $meta_font['font-family'] ) ) {
			$font_families[] = $meta_font['font-family'] . ':400';
		} else {
			$font_families[] = 'Poppins:400';
		}


		$params    = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );

		return $fonts_url;
	}
}

/** dynamic editor */
if ( ! function_exists( 'keylin_editor_dynamic' ) ) {
	function keylin_editor_dynamic() {
        $keylin_font_body = ATBS_Core::bk_get_theme_option( 'body-typography' );
        
		if ( ! class_exists( 'ReduxFramework' ) && empty( $keylin_font_body ) ) {
			return;
		}

		$cache = get_option( 'keylin_editor_cache' );
        
		if ( 1 ) {
			$editor_css   = '';
			$body_font    = ATBS_Core::bk_get_theme_option( 'body-typography' );
			$heading_font = ATBS_Core::bk_get_theme_option( 'heading-typography' );
            $secondary_font = ATBS_Core::bk_get_theme_option( 'secondary-typography' );
			$meta_font    = ATBS_Core::bk_get_theme_option( 'tertiary-typography' );
			$primary_color = ATBS_Core::bk_get_theme_option( 'bk-primary-color' );

			if ( ! empty( $body_font['font-family'] ) ) {
				$editor_css .= 'body, .editor-styles-wrapper, .wp-block-file,';
				$editor_css .= '.block-editor .wp-block-latest-comments__comment-link, .block-editor .wp-block-latest-posts__list a';
				$editor_css .= '{font-family: ' . $body_font['font-family'] . ' !important;';
				$editor_css .= '}';
			}

			if ( ! empty( $heading_font['font-family'] ) ) {
				$editor_css .= 'body .wp-block h1, body .wp-block h2,';
				$editor_css .= 'body .wp-block h3, body .wp-block h4,';
				$editor_css .= 'body .wp-block h5, body .wp-block h6,';
                $editor_css .= 'body h1.wp-block, body h2.wp-block,';
				$editor_css .= 'body h3.wp-block, body h4.wp-block,';
				$editor_css .= 'body h5.wp-block, body h6.wp-block,';
				$editor_css .= 'body .wp-block .editor-post-title__input,';
				$editor_css .= 'body .wp-block-cover h2 ';
				$editor_css .= '{font-family: ' . $heading_font['font-family'] . ';';
				$editor_css .= '}';
			}
            
            if ( ! empty( $secondary_font['font-family'] ) ) {
				$editor_css .= 'blockquote, .text-font-secondary, .block-heading__subtitle, .widget_nav_menu ul, .typography-copy blockquote, .comment-content blockquote';
				$editor_css .= '{font-family: ' . $secondary_font['font-family'] . ' !important;';
				$editor_css .= '}';
			}
            
			if ( ! empty( $meta_font['font-family'] ) ) {
				$editor_css .= 'blockquote cite, .block-editor .wp-block-archives-dropdown select,';
				$editor_css .= '.block-editor .wp-block-latest-posts__post-date, .block-editor .wp-block-latest-comments__comment-date, .wp-block-image figcaption, .wp-block-embed figcaption';
				$editor_css .= '{font-family: ' . $meta_font['font-family'] . ' !important;';
				$editor_css .= '}';
			}

			if ( ! empty( $primary_color ) && '#3343E9' != strtolower( $primary_color ) ) {
				$editor_css .= '.wp-block-button.is-style-outline, .wp-block-button.is-style-outline:hover,
                                .wp-block-button.is-style-outline:focus, .wp-block-button.is-style-outline:active, a:active, a:hover,';
				$editor_css .= '.block-editor-rich-text__editable a, .wp-block-file .wp-block-file__textlink, .wp-block-file .wp-block-file__textlink:hover';
				$editor_css .= ' .block-editor-rich-text__editable a, a:active, a:hover, .wp-block-latest-comments a, .wp-block-latest-posts a ';
				$editor_css .= '{ color: ' . $primary_color . '}';

				$editor_css .= '.wp-block-pullquote.is-style-solid-color:not(.has-background-color)';
				$editor_css .= '{ background-color: ' . $primary_color . '}';
			}

			$cache = addslashes( $editor_css );
			delete_option( 'keylin_editor_cache' );
			add_option( 'keylin_editor_cache', $cache );
		} else {
			$editor_css = stripslashes( $cache );
		}

		if ( ! empty( $editor_css ) ) {
			wp_add_inline_style( 'keylin-editor-style', $editor_css );
		}
	}
}

/** delete dynamic css */
if ( ! function_exists( 'keylin_delete_editor_styles_cache' ) ) {
	function keylin_delete_editor_styles_cache() {
		delete_option( 'keylin_editor_cache' );

		return;
	}
}