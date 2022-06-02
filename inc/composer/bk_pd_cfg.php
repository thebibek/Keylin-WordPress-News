<?php
/*
 * Sections Configuration
 */
 if ( ! function_exists( 'atbs_init_sections' ) ) {
	function atbs_init_sections() {
		$sections = array(
            'fullwidth' => esc_html__('FullWidth Section','keylin'), 'has-rsb' => esc_html__('Content Section', 'keylin')
		);
		wp_localize_script( 'bk-composer-script', 'bk_sections', $sections );
        $modules = array(
			'featured_module_1' => array(
				'title'      => esc_html__( 'Featured Module 1','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_2' => array(
				'title'      => esc_html__( 'Featured Module 2','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_2.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	                array(
	                	'heading_style' => array(
		                    'title' => esc_html__('Title Style','keylin'),
		                    'optionclass' => 'option-tab-1',
		                    'field' => 'select',
		                    'default' => 'heading-style-16',
		                    'options' => array(
		                        'heading-style-1'        => esc_html__( 'Heading Style 1','keylin'),
		                        'heading-style-2'        => esc_html__( 'Heading Style 2','keylin'),
		                        'heading-style-3'        => esc_html__( 'Heading Style 3','keylin'),
		                        'heading-style-4'        => esc_html__( 'Heading Style 4','keylin'),
		                        'heading-style-12'       => esc_html__( 'Heading Style 12','keylin'),
		                        'heading-style-13'       => esc_html__( 'Heading Style 13','keylin'),
		                        'heading-style-14'       => esc_html__( 'Heading Style 14','keylin'),
		                        'heading-style-15'       => esc_html__( 'Heading Style 15','keylin'),
		                        'heading-style-16'       => esc_html__( 'Heading Style 16','keylin')
		                    )
		                )
	                )
	            )
	   		),
	   		'featured_module_3' => array(
				'title'      => esc_html__( 'Featured Module 3','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_3.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_4' => array(
				'title'      => esc_html__( 'Featured Module 4','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_5' => array(
				'title'      => esc_html__( 'Featured Module 5','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_5.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_6' => array(
				'title'      => esc_html__( 'Featured Module 6','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_6.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_7' => array(
				'title'      => esc_html__( 'Featured Module 7','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_7.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_8' => array(
				'title'      => esc_html__( 'Featured Module 8','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_8.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_9' => array(
				'title'      => esc_html__( 'Featured Module 9','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_9.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_10' => array(
				'title'      => esc_html__( 'Featured Module 10','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_10.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_11' => array(
				'title'      => esc_html__( 'Featured Module 11','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_11.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_12' => array(
				'title'      => esc_html__( 'Featured Module 12','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_12.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_13' => array(
				'title'      => esc_html__( 'Featured Module 13','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_13.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_14' => array(
				'title'      => esc_html__( 'Featured Module 14','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_14.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_15' => array(
				'title'      => esc_html__( 'Featured Module 15','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_15.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_16' => array(
				'title'      => esc_html__( 'Featured Module 16','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_16.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_module_17' => array(
				'title'      => esc_html__( 'Featured Module 17','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_17.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target'))
	   		),
	   		'featured_module_18' => array(
				'title'      => esc_html__( 'Featured Module 18','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_18.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target'))
	   		),
	   		'featured_module_19' => array(
				'title'      => esc_html__( 'Featured Module 19','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_19.png',
	            'tabdisable' => 'tab-option-4 tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('sub_title', 'heading_style', 'heading_color', 'container_width', 'limit', 'ajax_load_more','view_all_link','view_all_text','view_all_target'))
	   		),
	   		'featured_module_20' => array(
				'title'      => esc_html__( 'Featured Module 20','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_20.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target'))
	   		),
	   		'featured_module_21' => array(
				'title'      => esc_html__( 'Featured Module 21','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_21.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('limit','ajax_load_more','view_all_link','view_all_text','view_all_target'))
	   		),
	   		'featured_module_22' => array(
				'title'      => esc_html__( 'Featured Module 22','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_22.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target'))
	   		),
	   		'posts_grid_1' => array(
				'title'      => esc_html__( 'Posts Grid 1','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_posts_grid_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'posts_grid_2' => array(
				'title'      => esc_html__( 'Posts Grid 2','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_posts_grid_2.png',
	            'tabdisable' => '',
	            'tabnames'   => array(
	                'tab-1' => 'General',
	                'tab-2' => 'Query Option',
	                'tab-3' => 'Manually Pick Post',
	                'tab-4' => 'Post Type',
	                'tab-5' => 'Spacing',
	                'tab-6' => 'Mailchimp Subscribe Form Shortcode',
	            ),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
                	array(
						'mailchimp_shortcode' => array(
							'title' => esc_html__('Mailchimp Subscribe Form Shortcode','keylin'),
		                    'optionclass' => 'option-tab-6',
							'field' => 'text',
							'default' => '',
						),
					)
                ),
	   		),
	   		'posts_grid_3' => array(
				'title'      => esc_html__( 'Posts Grid 3','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_posts_grid_3.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'posts_grid_4' => array(
				'title'      => esc_html__( 'Posts Grid 4','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_posts_grid_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'posts_grid_6' => array(
				'title'      => esc_html__( 'Posts Gird 6','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_posts_grid_6.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('post_icon','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'featured_slider_1' => array(
				'title'      => esc_html__( 'Featured Slider 1','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_slider_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','ajax_load_more','view_all_link','view_all_text','view_all_target'), 3)
	   		),
	   		'posts_carousel_1' => array(
				'title'      => esc_html__( 'Posts Carousel 1','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_carousel_2i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','ajax_load_more','view_all_link','view_all_text','view_all_target'), 5)
	   		),
	   		'posts_carousel_2' => array(
				'title'      => esc_html__( 'Posts Carousel 2','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_carousel_3i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','ajax_load_more','view_all_link','view_all_text','view_all_target'), 6)
	   		),
	   		'posts_carousel_3' => array(
				'title'      => esc_html__( 'Posts Carousel 3','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_carousel_center.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','ajax_load_more','view_all_link','view_all_text','view_all_target'), 5)
	   		),
	   		'posts_carousel_4' => array(
				'title'      => esc_html__( 'Posts Carousel 4','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_carousel_4i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','ajax_load_more','view_all_link','view_all_text','view_all_target'), 7)
	   		),
	   		'block_posts_listing_grid_1' => array(
				'title' => esc_html__( 'Listing Grid 1','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_2' => array(
				'title' => esc_html__( 'Listing Grid 2','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_vertical_3i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_3' => array(
				'title' => esc_html__( 'Listing Grid 3','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_vertical_4i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_grid_4' => array(
				'title' => esc_html__( 'Listing Grid 4','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','post_icon'), 9)
	        ),
	        'block_posts_listing_grid_5' => array(
				'title'      => esc_html__( 'Listing Grid 5','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_5.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9),
                	ATBS_Composer_Global_Options::composer_render_load_post_pagination_only_option()
                )
	   		),
	   		'block_posts_listing_grid_6' => array(
				'title'      => esc_html__( 'Listing Grid 6','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_6.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width')),
                	array(
		                'limit' => array(
		                    'title' => esc_html__('Number of Posts','keylin'),
		                    'description' => esc_html__( 'Enter the number of posts. eg. 5, 10, 15, 20 ... (10, 20, ... are recommended)','keylin'),
		                    'optionclass' => 'option-tab-2',
		                    'field' => 'number',
		                    'default' => 10,
		                )
                	)
            	)
	   		),
	   		'block_posts_listing_grid_7' => array(
				'title'      => esc_html__( 'Listing Grid 7','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_7.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9),
                	ATBS_Composer_Global_Options::composer_render_background_pattern()
                )
	   		),
	   		'block_posts_listing_grid_8' => array(
				'title'      => esc_html__( 'Listing Grid 8','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_123.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	   		),
	        'block_posts_listing_grid_overlay_aside_1' => array(
				'title' => esc_html__( 'Listing Grid Overlay Aside 1','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_overlay_aside_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9),
                	ATBS_Composer_Global_Options::composer_render_listing_grid_overlay_aside_options()
                )
	        ),
	        'block_posts_listing_grid_overlay_aside_2' => array(
				'title' => esc_html__( 'Listing Grid Overlay Aside 2','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_overlay_aside_2.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9),
                	ATBS_Composer_Global_Options::composer_render_listing_grid_overlay_aside_options()
                )
	        ),
	        'block_posts_listing_grid_overlay_aside_3' => array(
				'title' => esc_html__( 'Listing Grid Overlay Aside 3','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_overlay_aside_3.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => array_merge(
                	ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9),
                	ATBS_Composer_Global_Options::composer_render_listing_grid_overlay_aside_options()
                )
	        ),
	        'block_posts_listing_list_1' => array(
				'title' => esc_html__( 'Listing List 1','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_list_2' => array(
				'title' => esc_html__( 'Listing List 2','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_2.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_list_3' => array(
				'title' => esc_html__( 'Listing List 3','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_3.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_list_4' => array(
				'title' => esc_html__( 'Listing List 4','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_list_5' => array(
				'title' => esc_html__( 'Listing List 5','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_5.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_list_6' => array(
				'title' => esc_html__( 'Listing List 6','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_6.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_list_7' => array(
				'title' => esc_html__( 'Listing List 7','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_7.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
            'custom_html' => array(
				'title' => esc_html__( 'Custom HTML', 'keylin'),
                'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/custom_html.png',
                'tabdisable' => 'tab-option-2 tab-option-3 tab-option-4 tab-option-5 tab-option-6',
                'tabnames'  => array(
                    'tab-1' => 'HTML Config Panel',
                ),
				'options' => array(
                    'title' => array(
						'title' => esc_html__('Title','keylin'),
						'description' => esc_html__( 'Lower Font Weight by put the text inside <span> tag','keylin'),
                        'optionclass' => 'option-tab-1',
						'field' => 'text',
						'default' => '',
					),
                    'heading_style' => array(
						'title' => esc_html__('Title Style','keylin'),
                        'optionclass' => 'option-tab-1 atbs-heading-style',
						'field' => 'select',
						'default' => 'default',
						'options' => array(
							'default'        => esc_html__( 'Default - From Theme Option','keylin'),
	                        'heading-style-1'        => esc_html__( 'Heading Style 1','keylin'),
	                        'heading-style-2'        => esc_html__( 'Heading Style 2','keylin'),
	                        'heading-style-2-center' => esc_html__( 'Heading Style 2 Center','keylin'),
	                        'heading-style-3'        => esc_html__( 'Heading Style 3','keylin'),
	                        'heading-style-3-center' => esc_html__( 'Heading Style 3 Center','keylin'),
	                        'heading-style-4'        => esc_html__( 'Heading Style 4','keylin'),
	                        'heading-style-5-center' => esc_html__( 'Heading Style 5 Center','keylin'),
	                        'heading-style-6'        => esc_html__( 'Heading Style 6','keylin'),
	                        'heading-style-7'        => esc_html__( 'Heading Style 7','keylin'),
	                        'heading-style-8'        => esc_html__( 'Heading Style 8','keylin'),
	                        'heading-style-9'        => esc_html__( 'Heading Style 9','keylin'),
	                        'heading-style-10'       => esc_html__( 'Heading Style 10','keylin'),
	                        'heading-style-11'       => esc_html__( 'Heading Style 11','keylin'),
	                        'heading-style-12'       => esc_html__( 'Heading Style 12','keylin'),
	                       	'heading-style-13'       => esc_html__( 'Heading Style 13','keylin'),
	                       	'heading-style-14'       => esc_html__( 'Heading Style 14','keylin'),
	                       	'heading-style-15'       => esc_html__( 'Heading Style 15','keylin'),
	                       	'heading-style-16'       => esc_html__( 'Heading Style 16','keylin'),
	                       	'heading-style-17'       => esc_html__( 'Heading Style 17','keylin'),
	                        'heading-style-18'       => esc_html__( 'Heading Style 18','keylin'),
						),
					),
                    'custom_html' => array(
						'title' => esc_html__('HTML Code', 'keylin'),
						'description' => esc_html__( 'Put your custom HTML code here', 'keylin'),
						'field' => 'textarea',
						'default' => '',
					),
                    'custom_class' => array(
						'title' => esc_html__('Custom Class [Should be added to the div wrap of the module]','keylin'),
						'description' => esc_html__( '[Optional] Separate classes by a space. e.g. class1 class2 class3','keylin'),
                        'optionclass' => 'option-tab-1',
						'field' => 'text',
						'default' => '',
					),
				),
			),
            'shortcode' => array(
				'title' => esc_html__( 'Short Code', 'keylin'),
                'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/shortcode.png',
                'tabdisable' => 'tab-option-2 tab-option-3 tab-option-4 tab-option-5 tab-option-6',
                'tabnames'  => array(
                    'tab-1' => 'Shortcode Config Panel',
                ),
				'options' => array(
                    'title' => array(
						'title' => esc_html__('Title','keylin'),
						'description' => esc_html__( 'Lower Font Weight by put the text inside <span> tag','keylin'),
                        'optionclass' => 'option-tab-1',
						'field' => 'text',
						'default' => '',
					),
                    'heading_style' => array(
						'title' => esc_html__('Title Style','keylin'),
                        'optionclass' => 'option-tab-1 atbs-heading-style',
						'field' => 'select',
						'default' => 'default',
						'options' => array(
                            'default'        => esc_html__( 'Default - From Theme Option','keylin'),
	                        'heading-style-1'        => esc_html__( 'Heading Style 1','keylin'),
	                        'heading-style-2'        => esc_html__( 'Heading Style 2','keylin'),
	                        'heading-style-2-center' => esc_html__( 'Heading Style 2 Center','keylin'),
	                        'heading-style-3'        => esc_html__( 'Heading Style 3','keylin'),
	                        'heading-style-3-center' => esc_html__( 'Heading Style 3 Center','keylin'),
	                        'heading-style-4'        => esc_html__( 'Heading Style 4','keylin'),
	                        'heading-style-5-center' => esc_html__( 'Heading Style 5 Center','keylin'),
	                        'heading-style-6'        => esc_html__( 'Heading Style 6','keylin'),
	                        'heading-style-7'        => esc_html__( 'Heading Style 7','keylin'),
	                        'heading-style-8'        => esc_html__( 'Heading Style 8','keylin'),
	                        'heading-style-9'        => esc_html__( 'Heading Style 9','keylin'),
	                        'heading-style-10'       => esc_html__( 'Heading Style 10','keylin'),
	                        'heading-style-11'       => esc_html__( 'Heading Style 11','keylin'),
	                        'heading-style-12'       => esc_html__( 'Heading Style 12','keylin'),
	                       	'heading-style-13'       => esc_html__( 'Heading Style 13','keylin'),
	                       	'heading-style-14'       => esc_html__( 'Heading Style 14','keylin'),
	                       	'heading-style-15'       => esc_html__( 'Heading Style 15','keylin'),
	                       	'heading-style-16'       => esc_html__( 'Heading Style 16','keylin'),
	                       	'heading-style-17'       => esc_html__( 'Heading Style 17','keylin'),
	                        'heading-style-18'       => esc_html__( 'Heading Style 18','keylin'),
						),
					),
                    'shortcode' => array(
						'title' => esc_html__('Shortcode -- separated by [shortcode_separator]', 'keylin'),
						'description' => esc_html__( 'Put Shortcode here -- the shortcodes are separated by [shortcode_separator] -- eg: [shortcode1]  [shortcode_separator]  [shortcode2]', 'keylin'),
						'field' => 'textarea',
						'default' => '',
					),
				),
			),
        );
		wp_localize_script( 'bk-composer-script', 'bk_fullwidth_modules', $modules );
        $modules = array(
        	'block_posts_main_col_1' => array(
				'title' => esc_html__( 'Block Main Col 1','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_7.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
        	'block_posts_main_col_2' => array(
				'title'      => esc_html__( 'Block Main Col 2','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_9.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
        	'block_posts_main_col_3' => array(
				'title'      => esc_html__( 'Block Main Col 3','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_featured_10.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
	   		'block_posts_main_col_4' => array(
				'title'      => esc_html__( 'Block Main Col 4','keylin'),
	            'img'        => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_block_main_col_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width','limit','ajax_load_more','view_all_link','view_all_text','view_all_target')),
	   		),
        	'block_posts_listing_grid_1_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid 1','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_1_has_sidebar.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
			'block_posts_listing_grid_2_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid 2','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_vertical_2i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 8)
	        ),
	        'block_posts_listing_grid_3_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid 3','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/listing_grid_vertical_3i.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_4_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid 4','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_124.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 6)
	        ),
	        'block_posts_listing_list_1_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 1','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_list_2_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 2','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_2.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_list_3_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 3','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_3.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_list_4_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 4','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_list_5_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 5','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_5.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_list_6_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 6','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_6.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_list_7_has_sidebar' => array(
				'title' => esc_html__( 'Listing List 7','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_list_7.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_alt_1_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid Alt 1','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_alt_1.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_alt_2_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid Alt 2','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_alt_2.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_alt_3_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid Alt 3','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_alt_3.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),
	        'block_posts_listing_grid_alt_4_has_sidebar' => array(
				'title' => esc_html__( 'Listing Grid Alt 4','keylin'),
	            'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/keylin_listing_grid_alt_4.png',
	            'tabdisable' => 'tab-option-6',
	            'tabnames'   => ATBS_Composer_Global_Options::composer_render_settings_tabs(),
                'options'    => ATBS_Composer_Global_Options::composer_render_module_options(array('container_width'), 9)
	        ),

            'custom_html' => array(
				'title' => esc_html__( 'Custom HTML', 'keylin'),
                'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/custom_html.png',
                'tabdisable' => 'tab-option-2 tab-option-3 tab-option-4 tab-option-5 tab-option-6',
                'tabnames'  => array(
                    'tab-1' => 'HTML Config Panel',
                ),
				'options' => array(
                    'title' => array(
						'title' => esc_html__('Title','keylin'),
						'description' => esc_html__( 'Lower Font Weight by put the text inside <span> tag','keylin'),
                        'optionclass' => 'option-tab-1',
						'field' => 'text',
						'default' => '',
					),
                    'heading_style' => array(
						'title' => esc_html__('Title Style','keylin'),
                        'optionclass' => 'option-tab-1 atbs-heading-style',
						'field' => 'select',
						'default' => 'default',
						'options' => array(
							'default'        => esc_html__( 'Default - From Theme Option','keylin'),
	                        'heading-style-1'        => esc_html__( 'Heading Style 1','keylin'),
	                        'heading-style-2'        => esc_html__( 'Heading Style 2','keylin'),
	                        'heading-style-2-center' => esc_html__( 'Heading Style 2 Center','keylin'),
	                        'heading-style-3'        => esc_html__( 'Heading Style 3','keylin'),
	                        'heading-style-3-center' => esc_html__( 'Heading Style 3 Center','keylin'),
	                        'heading-style-4'        => esc_html__( 'Heading Style 4','keylin'),
	                        'heading-style-5-center' => esc_html__( 'Heading Style 5 Center','keylin'),
	                        'heading-style-6'        => esc_html__( 'Heading Style 6','keylin'),
	                        'heading-style-7'        => esc_html__( 'Heading Style 7','keylin'),
	                        'heading-style-8'        => esc_html__( 'Heading Style 8','keylin'),
	                        'heading-style-9'        => esc_html__( 'Heading Style 9','keylin'),
	                        'heading-style-10'       => esc_html__( 'Heading Style 10','keylin'),
	                        'heading-style-11'       => esc_html__( 'Heading Style 11','keylin'),
	                        'heading-style-12'       => esc_html__( 'Heading Style 12','keylin'),
	                       	'heading-style-13'       => esc_html__( 'Heading Style 13','keylin'),
	                       	'heading-style-14'       => esc_html__( 'Heading Style 14','keylin'),
	                       	'heading-style-15'       => esc_html__( 'Heading Style 15','keylin'),
	                       	'heading-style-16'       => esc_html__( 'Heading Style 16','keylin'),
	                       	'heading-style-17'       => esc_html__( 'Heading Style 17','keylin'),
	                        'heading-style-18'       => esc_html__( 'Heading Style 18','keylin'),
						),
					),
                    'custom_html' => array(
						'title' => esc_html__('HTML Code', 'keylin'),
						'description' => esc_html__( 'Put your custom HTML code here', 'keylin'),
						'field' => 'textarea',
						'default' => '',
					),
                    'custom_class' => array(
						'title' => esc_html__('Custom Class [Should be added to the div wrap of the module]','keylin'),
						'description' => esc_html__( '[Optional] Separate classes by a space. e.g. class1 class2 class3','keylin'),
                        'optionclass' => 'option-tab-1',
						'field' => 'text',
						'default' => '',
					),
				),
			),
            'shortcode' => array(
				'title' => esc_html__( 'Short Code', 'keylin'),
                'img'   => get_template_directory_uri().'/images/admin_panel/pagebuilder-modules/shortcode.png',
                'tabdisable' => 'tab-option-2 tab-option-3 tab-option-4 tab-option-5 tab-option-6',
                'tabnames'  => array(
                    'tab-1' => 'Shortcode Config Panel',
                ),
				'options' => array(
                    'title' => array(
						'title' => esc_html__('Title','keylin'),
						'description' => esc_html__( 'Lower Font Weight by put the text inside <span> tag','keylin'),
                        'optionclass' => 'option-tab-1',
						'field' => 'text',
						'default' => '',
					),
                    'heading_style' => array(
						'title' => esc_html__('Title Style','keylin'),
                        'optionclass' => 'option-tab-1 atbs-heading-style',
						'field' => 'select',
						'default' => 'default',
						'options' => array(
                            'default'        => esc_html__( 'Default - From Theme Option','keylin'),
	                        'heading-style-1'        => esc_html__( 'Heading Style 1','keylin'),
	                        'heading-style-2'        => esc_html__( 'Heading Style 2','keylin'),
	                        'heading-style-2-center' => esc_html__( 'Heading Style 2 Center','keylin'),
	                        'heading-style-3'        => esc_html__( 'Heading Style 3','keylin'),
	                        'heading-style-3-center' => esc_html__( 'Heading Style 3 Center','keylin'),
	                        'heading-style-4'        => esc_html__( 'Heading Style 4','keylin'),
	                        'heading-style-5-center' => esc_html__( 'Heading Style 5 Center','keylin'),
	                        'heading-style-6'        => esc_html__( 'Heading Style 6','keylin'),
	                        'heading-style-7'        => esc_html__( 'Heading Style 7','keylin'),
	                        'heading-style-8'        => esc_html__( 'Heading Style 8','keylin'),
	                        'heading-style-9'        => esc_html__( 'Heading Style 9','keylin'),
	                        'heading-style-10'       => esc_html__( 'Heading Style 10','keylin'),
	                        'heading-style-11'       => esc_html__( 'Heading Style 11','keylin'),
	                        'heading-style-12'       => esc_html__( 'Heading Style 12','keylin'),
	                       	'heading-style-13'       => esc_html__( 'Heading Style 13','keylin'),
	                       	'heading-style-14'       => esc_html__( 'Heading Style 14','keylin'),
	                       	'heading-style-15'       => esc_html__( 'Heading Style 15','keylin'),
	                       	'heading-style-16'       => esc_html__( 'Heading Style 16','keylin'),
	                       	'heading-style-17'       => esc_html__( 'Heading Style 17','keylin'),
	                        'heading-style-18'       => esc_html__( 'Heading Style 18','keylin'),
						),
					),
                    'shortcode' => array(
						'title' => esc_html__('Shortcode -- separated by [shortcode_separator]', 'keylin'),
						'description' => esc_html__( 'Put Shortcode here -- the shortcodes are separated by [shortcode_separator] -- eg: [shortcode1]  [shortcode_separator]  [shortcode2]', 'keylin'),
						'field' => 'textarea',
						'default' => '',
					),
				),
			),
        );
		wp_localize_script( 'bk-composer-script', 'bk_has_rsb_modules', $modules );
        $modules = array(

        );
		wp_localize_script( 'bk-composer-script', 'bk_has_innersb_left_modules', $modules );
        $modules = array(

        );
		wp_localize_script( 'bk-composer-script', 'bk_has_innersb_right_modules', $modules );
	}
}