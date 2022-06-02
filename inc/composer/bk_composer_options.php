<?php
/*
 * Sections Configuration
 */
if (!class_exists('ATBS_Composer_Global_Options')) {
    class ATBS_Composer_Global_Options {

        /**
         *  Composer Tabs
         **/

        static function composer_render_settings_tabs(){
            $composerTabs =  array(
                'tab-1' => 'General',
                'tab-2' => 'Query Option',
                'tab-3' => 'Manually Pick Post',
                'tab-4' => 'Post Type',
                'tab-5' => 'Spacing',
                // 'tab-6' => 'Ajax Load More',
            );
            return $composerTabs;
        } //End composer_render_settings_tabs

        static function composer_render_module_options($optionDisable = array(), $limit = ''){
            $composerGetGeneralOptions = self::composer_render_general_options($limit);
            $composerReturnOptions = array();
            foreach ($composerGetGeneralOptions as $key => $option) {
                if (!in_array($key, $optionDisable)) {
                    $composerReturnOptions[$key] = $option;
                }
            }
            return($composerReturnOptions);
        }

        /**
         *  Composer Get General Options
         **/
        static function composer_render_general_options($limit = '') {
            $composerOptions = array(
                // Tab 1
                'title' => array(
					'title' => esc_html__('Title','keylin'),
					'description' => esc_html__( 'Lower Font Weight by put the text inside <span> tag','keylin'),
                    'optionclass' => 'option-tab-1',
					'field' => 'text',
					'default' => '',
				),
                'sub_title' => array(
					'title' => esc_html__('Sub Title','keylin'),
                    'optionclass' => 'option-tab-1',
					'field' => 'text',
					'default' => '',
				),
				'heading_style' => array(
					'title' => esc_html__('Title Style','keylin'),
                    'optionclass' => 'option-tab-1',
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
                'heading_color' => array(
					'title' => esc_html__('Heading Color','keylin'),
					'description' => esc_html__( 'Leave empty to use the default color','keylin'),
                    'optionclass' => 'option-tab-1',
					'field' => 'colorpicker',
					'default' => '#222222',
				),
                'ajax_load_more' => array(
                     'title' => esc_html__('Ajax Load More', 'keylin'),
                     'description' => esc_html__( 'Select an Ajax Load More Type','keylin'),
                     'optionclass' => 'option-tab-1 atbs-ajax-load-more',
                     'field' => 'select',
                     'default' => 'disable',
                     'options' => array(
                         'disable' => esc_html__( 'Disable','keylin'),
                         'pagination' => esc_html__( 'Ajax Pagination','keylin'),
                         'loadmore' => esc_html__( 'Ajax Load More Button','keylin'),
                         'infinity' => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                         'viewall' => esc_html__( 'View All Button','keylin'),
                     ),
                 ),
                 'view_all_link' => array(
                     'title' => esc_html__('View All Button Link','keylin'),
                     'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_text' => array(
                     'title' => esc_html__('View All Button Text','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_target' => array(
                     'title' => esc_html__('Target', 'keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'select',
                     'default' => '_blank',
                     'options' => array(
                         '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                         '_self'    => esc_html__( 'Open link in current tab','keylin'),
                     ),
                 ),
                'container_width' => array(
                    'title' => esc_html__('Container Width','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'select',
                    'options' => array(
                        'normal'    => esc_html__( 'Normal','keylin'),
                        'wide'     => esc_html__( 'Wide','keylin'),
                    ),
                    'default' => 'normal',
                ),

                'custom_class' => array(
					'title' => esc_html__('Custom Class [Should be added to the div wrap of the module]','keylin'),
					'description' => esc_html__( '[Optional] Separate classes by a space. e.g. class1 class2 class3','keylin'),
                    'optionclass' => 'option-tab-1',
					'field' => 'text',
					'default' => '',
				),


				//tab 2
                'limit' => array(
                    'title' => esc_html__('Number of Posts','keylin'),
                    'description' => esc_html__( 'Enter the number of posts','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'number',
                    'default' => $limit,
                ),
                'offset' => array(
					'title' => esc_html__('Offset','keylin'),
					'description' => esc_html__( 'Enter the offset number','keylin'),
					'optionclass' => 'option-tab-2',
                    'field' => 'number',
					'default' => 0
				),
                'feature' => array(
					'title' => esc_html__('Display featured posts as highest priority', 'keylin'),
                    'description' => esc_html__( 'Yes: Display featured posts as highest priority','keylin'),
					'optionclass' => 'option-tab-2',
                    'field' => 'select',
					'default' => 'no',
					'options' => array(
						'no' => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
					),
				),
                'orderby' => array(
					'title'        => esc_html__('Order By','keylin'),
                    'optionclass'  => 'option-tab-2',
					'field'        => 'select',
					'default'      => 'date',
					'options'      => array(
                        'date'              => esc_html__( 'Latest Posts','keylin'),
                        'comment_count'     => esc_html__( 'Popular Post by Comments','keylin'),
                        'view_count'        => esc_html__( 'Popular Post by Views','keylin'),
                        'top_review'        => esc_html__( 'Best Review','keylin'),
                        'modified'          => esc_html__( 'Modified','keylin'),
                        'speed_reads'       => esc_html__( 'Speed Reads','keylin'),
                        'alphabetical_asc'  => esc_html__( 'Alphabetical A->Z','keylin'),
                        'alphabetical_decs' => esc_html__( 'Alphabetical Z->A','keylin'),
					),
				),
                'tags' => array(
					'title' => esc_html__('Tags','keylin'),
					'description' => esc_html__( '[Optional] Separate tags by the comma. e.g. tag1,tag2','keylin'),
                    'optionclass' => 'option-tab-2',
					'field' => 'text',
					'default' => '',
				),
				'category' => array(
					'title' => esc_html__('Category','keylin'),
					'description' => esc_html__( 'Choose a post category to be shown up','keylin'),
					'optionclass' => 'option-tab-2',
                    'field' => 'category',
					'default' => '0',
				),

                // Tab 3
                'editor_pick' => array(
					'title' => esc_html__('Manually Pick Post (By Post IDs)','keylin'),
					'description' => esc_html__( 'Insert the post IDs here, separated by a comma','keylin'),
                    'optionclass' => 'option-tab-3',
					'field' => 'text',
					'default' => '',
				),
                'editor_exclude' => array(
					'title' => esc_html__('Manually Exclude Posts (By Post IDs)','keylin'),
					'description' => esc_html__( 'Insert the post IDs here, separated by a comma','keylin'),
                    'optionclass' => 'option-tab-3',
					'field' => 'text',
					'default' => '',
				),

                // Tab 4
                'post_icon' => array(
                    'title' => esc_html__('Post Icon','keylin'),
                    'description' => esc_html__( 'Configure Post Icon on This Module','keylin'),
                    'optionclass' => 'option-tab-4',
                    'field' => 'select',
                    'default' => 'disable',
                    'options' => array(
                        'disable'           => esc_html__( 'Disable Post Icon','keylin'),
                        'enable'            => esc_html__( 'Enable Post Icon','keylin'),
                    ),
                ),
                'post_source' => array(
					'title' => esc_html__('Show only Post Type','keylin'),
                    'description' => esc_html__( 'All - Show All Post Type, This module does not show the post icons','keylin'),
                    'optionclass' => 'option-tab-4',
					'field' => 'select',
					'default' => 'all',
					'options' => array(
                        'all'        => esc_html__( 'All','keylin'),
						'video'      => esc_html__( 'Video','keylin'),
                        'gallery'    => esc_html__( 'Gallery','keylin'),
                        'review'     => esc_html__( 'Review','keylin'),
					),
				),

				//tab 5
                'module_custom_spacing_option' => array(
					'title' => esc_html__('Module Custom Spacing Option','keylin'),
                    'description' => esc_html__( 'Enable / Disable Custom Spacing of this module','keylin'),
                    'optionclass' => 'option-tab-5',
					'field' => 'select',
                    'options' => array(
                        'disable'    => esc_html__( 'Disable','keylin'),
                        'enable'     => esc_html__( 'Enable','keylin'),
					),
					'default' => 'disable',
				),
                'module_margin_top' => array(
                	'title' => esc_html__('Module Margin Top','keylin'),
                	'description' => esc_html__( 'Setup to a margin number','keylin'),
                    'required'    => array('module_custom_spacing_option' => 'enable'),
                    'optionclass' => 'option-tab-5',
                	'field' => 'range_slider',
                	'default' => 0,
                ),
                'heading_margin_bottom' => array(
                	'title' => esc_html__('Heading Margin Bottom','keylin'),
                	'description' => esc_html__( 'Setup to a margin number','keylin'),
                    'required'    => array('module_custom_spacing_option' => 'enable'),
                    'optionclass' => 'option-tab-5',
                	'field' => 'range_slider_positive',
                	'default' => 50,
                ),
			);
            return $composerOptions;
        } //End composer_get_general_options

        /**
         *  Composer Get General Posts Grid 5 Options
         **/
        static function composer_render_general_posts_grid_5_options() {
            $composerOptions = array(
                // Tab 1
                'title_1' => array(
                    'title' => esc_html__('Title','keylin'),
                    'description' => esc_html__( 'The Column Title','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'text',
                    'default' => '',
                ),
                'load_more_1' => array(
                    'title' => esc_html__('Header View More Button', 'keylin'),
                    'optionclass' => 'option-tab-1 atbs-ajax-load-more',
                    'field' => 'select',
                    'default' => 'disable',
                    'options' => array(
                        'disable' => esc_html__( 'Disable','keylin'),
                        'viewall' => esc_html__( 'Enable','keylin'),
                    ),
                ),
                'view_all_link_1' => array(
                    'title' => esc_html__('View All Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-all',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_all_text_1' => array(
                    'title' => esc_html__('View All Button Text','keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-all',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_all_target_1' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-all',
                    'field' => 'select',
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),
                'limit_1' => array(
                    'title' => esc_html__('Number of Posts','keylin'),
                    'description' => esc_html__( 'Enter the number of posts','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'number',
                    'default' => 5
                ),
                'offset_1' => array(
                    'title' => esc_html__('Offset','keylin'),
                    'description' => esc_html__( 'Enter the offset number','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'number',
                    'default' => 0
                ),
                'feature_1' => array(
                    'title' => esc_html__('Display featured posts as highest priority', 'keylin'),
                    'description' => esc_html__( 'Yes: Display featured posts as highest priority','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no' => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
                    ),
                ),
                'orderby_1' => array(
                    'title' => esc_html__('Order By','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'select',
                    'default' => 'date',
                    'options' => array(
                        'date'              => esc_html__( 'Latest Posts','keylin'),
                        'comment_count'     => esc_html__( 'Popular Post by Comments','keylin'),
                        'view_count'        => esc_html__( 'Popular Post by Views','keylin'),
                        'top_review'        => esc_html__( 'Best Review','keylin'),
                        'modified'          => esc_html__( 'Modified','keylin'),
                        'speed_reads'       => esc_html__( 'Speed Reads','keylin'),
                        'alphabetical_asc'  => esc_html__( 'Alphabetical A->Z','keylin'),
                        'alphabetical_decs' => esc_html__( 'Alphabetical Z->A','keylin'),
                    ),
                ),
                'tags_1' => array(
                    'title' => esc_html__('Tags','keylin'),
                    'description' => esc_html__( '[Optional] Separate tags by the comma. e.g. tag1,tag2','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'text',
                    'default' => '',
                ),
                'category_1' => array(
                    'title' => esc_html__('Category','keylin'),
                    'description' => esc_html__( 'Choose a post category to be shown up','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'onecategory',
                    'default' => '0',
                ),
                'editor_exclude_1' => array(
                    'title' => esc_html__('Manually Exclude Posts (By Post IDs)','keylin'),
                    'description' => esc_html__( 'Insert the post IDs here, separated by a comma','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'text',
                    'default' => '',
                ),
                'viewmore_1' => array(
                    'title' => esc_html__('Enable View More Button','keylin'),
                    'description' => esc_html__('Should be displayed at the bottom of column', 'keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-more-button',
                    'field' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no'  => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
                    ),
                ),
                'view_more_link_1' => array(
                    'title' => esc_html__('View More Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View More button','keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-more',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_more_text_1' => array(
                    'title' => esc_html__('View More Button Text','keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-more',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_more_target_1' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-1 atbs-view-more',
                    'field' => 'select',
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),

                // Tab 2
                'title_2' => array(
                    'title' => esc_html__('Title','keylin'),
                    'description' => esc_html__( 'The Column Title','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'text',
                    'default' => '',
                ),
                'load_more_2' => array(
                    'title' => esc_html__('Header View More Button', 'keylin'),
                    'optionclass' => 'option-tab-2 atbs-ajax-load-more',
                    'field' => 'select',
                    'default' => 'disable',
                    'options' => array(
                        'disable' => esc_html__( 'Disable','keylin'),
                        'viewall' => esc_html__( 'Enable','keylin'),
                    ),
                ),
                'view_all_link_2' => array(
                    'title' => esc_html__('View All Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-all',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_all_text_2' => array(
                    'title' => esc_html__('View All Button Text','keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-all',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_all_target_2' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-all',
                    'field' => 'select',
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),
                'limit_2' => array(
                    'title' => esc_html__('Number of Posts','keylin'),
                    'description' => esc_html__( 'Enter the number of posts','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'number',
                    'default' => 5
                ),
                'offset_2' => array(
                    'title' => esc_html__('Offset','keylin'),
                    'description' => esc_html__( 'Enter the offset number','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'number',
                    'default' => 0
                ),
                'feature_2' => array(
                    'title' => esc_html__('Display featured posts as highest priority', 'keylin'),
                    'description' => esc_html__( 'Yes: Display featured posts as highest priority','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no' => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
                    ),
                ),
                'orderby_2' => array(
                    'title' => esc_html__('Order By','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'select',
                    'default' => 'date',
                    'options' => array(
                        'date'              => esc_html__( 'Latest Posts','keylin'),
                        'comment_count'     => esc_html__( 'Popular Post by Comments','keylin'),
                        'view_count'        => esc_html__( 'Popular Post by Views','keylin'),
                        'top_review'        => esc_html__( 'Best Review','keylin'),
                        'modified'          => esc_html__( 'Modified','keylin'),
                        'speed_reads'       => esc_html__( 'Speed Reads','keylin'),
                        'alphabetical_asc'  => esc_html__( 'Alphabetical A->Z','keylin'),
                        'alphabetical_decs' => esc_html__( 'Alphabetical Z->A','keylin'),
                    ),
                ),
                'tags_2' => array(
                    'title' => esc_html__('Tags','keylin'),
                    'description' => esc_html__( '[Optional] Separate tags by the comma. e.g. tag1,tag2','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'text',
                    'default' => '',
                ),
                'category_2' => array(
                    'title' => esc_html__('Category','keylin'),
                    'description' => esc_html__( 'Choose a post category to be shown up','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'onecategory',
                    'default' => '0',
                ),
                'editor_exclude_2' => array(
                    'title' => esc_html__('Manually Exclude Posts (By Post IDs)','keylin'),
                    'description' => esc_html__( 'Insert the post IDs here, separated by a comma','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'text',
                    'default' => '',
                ),
                'viewmore_2' => array(
                    'title' => esc_html__('Enable View More Button','keylin'),
                    'description' => esc_html__('Should be displayed at the bottom of column', 'keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-more-button',
                    'field' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no'  => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
                    ),
                ),
                'view_more_link_2' => array(
                    'title' => esc_html__('View More Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View More button','keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-more',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_more_text_2' => array(
                    'title' => esc_html__('View More Button Text','keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-more',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_more_target_2' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-2 atbs-view-more',
                    'field' => 'select',
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),

                // Tab 3
                'title_3' => array(
                    'title' => esc_html__('Title','keylin'),
                    'description' => esc_html__( 'The Column Title','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'text',
                    'default' => '',
                ),
                'load_more_3' => array(
                    'title' => esc_html__('Header View More Button', 'keylin'),
                    'optionclass' => 'option-tab-3 atbs-ajax-load-more',
                    'field' => 'select',
                    'default' => 'disable',
                    'options' => array(
                        'disable' => esc_html__( 'Disable','keylin'),
                        'viewall' => esc_html__( 'Enable','keylin'),
                    ),
                ),
                'view_all_link_3' => array(
                    'title' => esc_html__('View All Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-all',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_all_text_3' => array(
                    'title' => esc_html__('View All Button Text','keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-all',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_all_target_3' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-all',
                    'field' => 'select',
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),
                'limit_3' => array(
                    'title' => esc_html__('Number of Posts','keylin'),
                    'description' => esc_html__( 'Enter the number of posts','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'number',
                    'default' => 5
                ),
                'offset_3' => array(
                    'title' => esc_html__('Offset','keylin'),
                    'description' => esc_html__( 'Enter the offset number','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'number',
                    'default' => 0
                ),
                'feature_3' => array(
                    'title' => esc_html__('Display featured posts as highest priority', 'keylin'),
                    'description' => esc_html__( 'Yes: Display featured posts as highest priority','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no' => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
                    ),
                ),
                'orderby_3' => array(
                    'title' => esc_html__('Order By','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'select',
                    'default' => 'date',
                    'options' => array(
                        'date'              => esc_html__( 'Latest Posts','keylin'),
                        'comment_count'     => esc_html__( 'Popular Post by Comments','keylin'),
                        'view_count'        => esc_html__( 'Popular Post by Views','keylin'),
                        'top_review'        => esc_html__( 'Best Review','keylin'),
                        'modified'          => esc_html__( 'Modified','keylin'),
                        'speed_reads'       => esc_html__( 'Speed Reads','keylin'),
                        'alphabetical_asc'  => esc_html__( 'Alphabetical A->Z','keylin'),
                        'alphabetical_decs' => esc_html__( 'Alphabetical Z->A','keylin'),
                    ),
                ),
                'tags_3' => array(
                    'title' => esc_html__('Tags','keylin'),
                    'description' => esc_html__( '[Optional] Separate tags by the comma. e.g. tag1,tag2','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'text',
                    'default' => '',
                ),
                'category_3' => array(
                    'title' => esc_html__('Category','keylin'),
                    'description' => esc_html__( 'Choose a post category to be shown up','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'onecategory',
                    'default' => '0',
                ),
                'editor_exclude_3' => array(
                    'title' => esc_html__('Manually Exclude Posts (By Post IDs)','keylin'),
                    'description' => esc_html__( 'Insert the post IDs here, separated by a comma','keylin'),
                    'optionclass' => 'option-tab-3',
                    'field' => 'text',
                    'default' => '',
                ),
                'viewmore_3' => array(
                    'title' => esc_html__('Enable View More Button','keylin'),
                    'description' => esc_html__('Should be displayed at the bottom of column', 'keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-more-button',
                    'field' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no'  => esc_html__( 'No','keylin'),
                        'yes' => esc_html__( 'Yes','keylin'),
                    ),
                ),
                'view_more_link_3' => array(
                    'title' => esc_html__('View More Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View More button','keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-more',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_more_text_3' => array(
                    'title' => esc_html__('View More Button Text','keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-more',
                    'field' => 'text',
                    'default' => '',
                ),
                'view_more_target_3' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-3 atbs-view-more',
                    'field' => 'select',
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),

                //Tab 5
                'custom_class' => array(
                    'title' => esc_html__('Custom Class [Should be added to the div wrap of the module]','keylin'),
                    'description' => esc_html__( '[Optional] Separate classes by a space. e.g. class1 class2 class3','keylin'),
                    'optionclass' => 'option-tab-5',
                    'field' => 'text',
                    'default' => '',
                ),

                //Tab 6
                'post_icon' => array(
                    'title' => esc_html__('Post Icon','keylin'),
                    'description' => esc_html__( 'Configure Post Icon on This Module','keylin'),
                    'optionclass' => 'option-tab-6',
                    'field' => 'select',
                    'default' => 'disable',
                    'options' => array(
                        'disable'           => esc_html__( 'Disable Post Icon','keylin'),
                        'enable'            => esc_html__( 'Enable Post Icon','keylin'),
                    ),
                ),
                'post_source' => array(
                    'title' => esc_html__('Show only Post Type','keylin'),
                    'description' => esc_html__( 'All - Show All Post Type, This module does not show the post icons','keylin'),
                    'optionclass' => 'option-tab-6',
                    'field' => 'select',
                    'default' => 'all',
                    'options' => array(
                        'all'        => esc_html__( 'All','keylin'),
                        'video'      => esc_html__( 'Video','keylin'),
                        'gallery'    => esc_html__( 'Gallery','keylin'),
                        'review'     => esc_html__( 'Review','keylin'),
                    ),
                )
            );
            return $composerOptions;
        } //End composer_render_general_posts_grid_5_options

        /**
         *  Composer Get Options Listing Grid Overlay Aside
         **/
        static function composer_render_listing_grid_overlay_aside_options(){
            $composerOptions = array(
                // 'heading_color' => array(
                //     'title' => esc_html__('Heading Color','keylin'),
                //     'description' => esc_html__( 'Leave empty to use the default color','keylin'),
                //     'optionclass' => 'option-tab-1',
                //     'field' => 'colorpicker',
                //     'default' => '#222222',
                // ),
                'banner_title' => array(
                    'title' => esc_html__('Banner Title','keylin'),
                    'description' => esc_html__( 'Put Title Text Here','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'text',
                    'default' => '',
                ),
                'banner_img' => array(
                    'title' => esc_html__('Banner Image URL - #1','keylin'),
                    'description' => esc_html__( 'Upload your image here','keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'image',
                    'default' => '',
                ),
                'banner_button' => array(
                    'title' => esc_html__('Banner  Button', 'keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'select',
                    'default' => 'enable',
                    'options' => array(
                        'disable' => esc_html__( 'Disable','keylin'),
                        'enable' => esc_html__( 'Enable','keylin'),
                    ),
                ),
                'banner_link' => array(
                    'title' => esc_html__('Banner Button Link','keylin'),
                    'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                    'optionclass' => 'option-tab-1',
                    'required'    => array('banner_button' => 'enable'),
                    'field' => 'text',
                    'default' => '',
                ),
                'banner_text' => array(
                    'title' => esc_html__('Banner Button Text','keylin'),
                    'optionclass' => 'option-tab-1',
                    'required'    => array('banner_button' => 'enable'),
                    'field' => 'text',
                    'default' => '',
                ),
                'banner_target' => array(
                    'title' => esc_html__('Target', 'keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'select',
                    'required'    => array('banner_button' => 'enable'),
                    'default' => '_blank',
                    'options' => array(
                        '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                        '_self'    => esc_html__( 'Open link in current tab','keylin'),
                    ),
                ),
            );
            return $composerOptions;
        } //End composer_get_general_options

        /**
         *  Composer Get Background Pattern
         **/
        static function composer_render_background_pattern() {
            $composerOption = array(
                'background_pattern' => array(
                    'title' => esc_html__('Background Pattern', 'keylin'),
                    'optionclass' => 'option-tab-1',
                    'field' => 'select',
                    'options' => array(
                        'disable' => esc_html__( 'Disable','keylin'),
                        'enable' => esc_html__( 'Enable','keylin'),
                    ),
                    'default' => 'disable',
                ),
                'background_color' => array(
                    'title' => esc_html__('Background Color','keylin'),
                    'description' => esc_html__( 'Leave empty to use the default color','keylin'),
                    'field' => 'colorpicker',
                    'optionclass' => 'option-tab-1',
                    'required'    => array('background_pattern' => 'enable'),
                    'default' => '#f8f8f8',
                ),
                'background_pattern_svg' => array(
                    'title' => esc_html__('Background Pattern SVG','keylin'),
                    'description' => esc_html__( 'Copy your SVG code here. Leave empty to use the default pattern','keylin'),
                    'optionclass' => 'option-tab-1',
                    'required'    => array('background_pattern' => 'enable'),
                    'field' => 'textarea',
                )
            );
            return $composerOption;
        } //End composer_render_background_pattern

        /**
         *  Composer Get Limit Article Number
         **/
        static function composer_render_limit_option($limitNumber = 6){
            $composerOption = array(
                'limit' => array(
                    'title' => esc_html__('Number of Posts','keylin'),
                    'description' => esc_html__( 'Enter the number of posts','keylin'),
                    'optionclass' => 'option-tab-2',
                    'field' => 'number',
                    'default' => $limitNumber
                )
            );
            return $composerOption;
        } //End composer_get_limit_option

        /**
         *  Composer get Load Posts Option
         **/
        static function composer_render_icon_option(){
            $composerOption = array(
                'post_icon' => array(
					'title' => esc_html__('Post Icon','keylin'),
                    'description' => esc_html__( 'Configure Post Icon on This Module','keylin'),
                    'optionclass' => 'option-tab-4',
					'field' => 'select',
					'default' => 'disable',
					'options' => array(
                        'disable'           => esc_html__( 'Disable Post Icon','keylin'),
						'enable'            => esc_html__( 'Enable Post Icon','keylin'),
					),
				)
            );
            return $composerOption;
        }

        /**
         *  Composer get Icon Option
         **/
        static function composer_render_load_post_option(){
            $composerOption = array(
                'ajax_load_more' => array(
                     'title' => esc_html__('Ajax Load More', 'keylin'),
                     'description' => esc_html__( 'Select an Ajax Load More Type','keylin'),
                     'optionclass' => 'option-tab-1 atbs-ajax-load-more',
                     'field' => 'select',
                     'default' => 'disable',
                     'options' => array(
                         'disable' => esc_html__( 'Disable','keylin'),
                         'pagination' => esc_html__( 'Ajax Pagination','keylin'),
                         'loadmore' => esc_html__( 'Ajax Load More Button','keylin'),
                         'infinity' => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                         'viewall' => esc_html__( 'View All Button','keylin'),
                     ),
                 ),
                 'view_all_link' => array(
                     'title' => esc_html__('View All Button Link','keylin'),
                     'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_text' => array(
                     'title' => esc_html__('View All Button Text','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_target' => array(
                     'title' => esc_html__('Target', 'keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'select',
                     'default' => '_blank',
                     'options' => array(
                         '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                         '_self'    => esc_html__( 'Open link in current tab','keylin'),
                     ),
                 )
            );

            return $composerOption;
        }
        static function composer_render_load_post_pagination_only_option(){
            $composerOption = array(
                'ajax_load_more' => array(
                     'title' => esc_html__('Ajax Load More', 'keylin'),
                     'description' => esc_html__( 'Select an Ajax Load More Type','keylin'),
                     'optionclass' => 'option-tab-1 atbs-ajax-load-more',
                     'field' => 'select',
                     'default' => 'disable',
                     'options' => array(
                         'disable' => esc_html__( 'Disable','keylin'),
                         'pagination' => esc_html__( 'Ajax Pagination','keylin'),
                         'viewall' => esc_html__( 'View All Button','keylin'),
                     ),
                 ),
                 'view_all_link' => array(
                     'title' => esc_html__('View All Button Link','keylin'),
                     'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_text' => array(
                     'title' => esc_html__('View All Button Text','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_target' => array(
                     'title' => esc_html__('Target', 'keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'select',
                     'default' => '_blank',
                     'options' => array(
                         '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                         '_self'    => esc_html__( 'Open link in current tab','keylin'),
                     ),
                 )
            );

            return $composerOption;
        }
        static function composer_render_load_post_viewAll_option(){
            $composerOption = array(
                'ajax_load_more' => array(
                     'title' => esc_html__('Ajax Load More', 'keylin'),
                     'description' => esc_html__( 'Select an Ajax Load More Type','keylin'),
                     'optionclass' => 'option-tab-1 atbs-ajax-load-more',
                     'field' => 'select',
                     'default' => 'disable',
                     'options' => array(
                         'disable' => esc_html__( 'Disable','keylin'),
                         'viewall' => esc_html__( 'View All Button','keylin'),
                     ),
                 ),
                 'view_all_link' => array(
                     'title' => esc_html__('View All Button Link','keylin'),
                     'description' => esc_html__( 'Insert the link for the View All button','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_text' => array(
                     'title' => esc_html__('View All Button Text','keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'text',
                     'default' => '',
                 ),
                 'view_all_target' => array(
                     'title' => esc_html__('Target', 'keylin'),
                     'optionclass' => 'option-tab-1 atbs-view-all',
                     'field' => 'select',
                     'default' => '_blank',
                     'options' => array(
                         '_blank'   => esc_html__( 'Open link in new tab','keylin'),
                         '_self'    => esc_html__( 'Open link in current tab','keylin'),
                     ),
                 )
            );

            return $composerOption;
        }


        /**
         *  composer_get_configured_options
         **/
        static function composer_get_configured_options($page_info) {
            $composerConfiguredOptions = array();

            $composerConfiguredOptions['orderby']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_orderby', true );
            $composerConfiguredOptions['tags']      = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_tags', true );
            $composerConfiguredOptions['offset'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_offset', true );
            $composerConfiguredOptions['feature'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_feature', true );
            $composerConfiguredOptions['category_id'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_category', true );
            $composerConfiguredOptions['editor_pick'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_editor_pick', true );
            $composerConfiguredOptions['editor_exclude'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_editor_exclude', true );
            $composerConfiguredOptions['custom_class']  = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_custom_class', true );
            $composerConfiguredOptions['post_source'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_post_source', true );
            $composerConfiguredOptions['post_icon'] = get_post_meta( $page_info['page_id'], $page_info['block_prefix'].'_post_icon', true );

            return $composerConfiguredOptions;
        }
    }
}