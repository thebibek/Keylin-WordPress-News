<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'id'    => 'page-settings-section',
        'icon' => 'el el-wrench',
        'title' => esc_html__('Page Settings', 'keylin'),
        'customizer_width' => '500px',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Page','keylin'),
        'id'               => 'cagegory-page-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
           array(
                'id'=>'bk_category_header_style',
                'type' => 'select',
                'title' => esc_html__('Page Heading', 'keylin'),
                'options'   => array(
                                'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                                'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                                'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                                'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                                'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                                'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                                'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                                'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                                'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                                'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                                'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                                'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                                'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                                'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                                'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                                'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                                'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                                'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                                'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                            ),
                'default'    => 'heading-style-16',
            ),
            array(
                'id'          => 'bk_category_page_heading_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Category Page Heading Font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform' => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.archive.category .block-heading .block-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Category Page Heading.', 'keylin' ),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-size'     => '48px',
                    'font-weight'    => '700',
                ),
            ),
            array(
                'id'          => 'bk_category_page_sub_heading_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Category Page Sub Heading Font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform' => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.archive.category .block-heading .page-heading__subtitle p',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Category Page Sub Heading.', 'keylin' ),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-size'     => '18px',
                    'font-weight'    => '300',
                ),
            ),
            array(
                'id'=>'bk_category_page_heading_color',
                'type'        => 'typography',
                'title'       => esc_html__( 'Category Page Heading Color ( border )','keylin'),
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'font-family'    => false,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> false,  // Defaults to false
                'color'         => true,
                'preview'       => false, // Disable the previewer
                'all_styles'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.archive.category .block-heading:not(.widget__title), .archive.category .block-heading:not(.widget__title) .block-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Color option for Category Page Heading.', 'keylin' ),
                'default'     => array(
                    'color' => '',
                ),
                'required' => array(
                    array('bk_category_header_style', 'equals' , array( 'heading-style-1','heading-style-2','heading-style-2-center','heading-style-3','heading-style-3-center','heading-style-4','heading-style-5-center','heading-style-6','heading-style-7','heading-style-8','heading-style-9','heading-style-10','heading-style-11','heading-style-12','heading-style-13','heading-style-14','heading-style-15','heading-style-16','heading-style-17')),
                ),
            ),
            array(
                'id'=>'bk_category_page_heading_background_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Category Page Heading Background Color', 'keylin' ),
                'output'   => array(
                    'background-color' => '.archive.category .block-heading.heading-style-15 .block-heading__title, .archive.category .block-heading.heading-style-9 .block-heading__title, .archive.category .block-heading.heading-style-8 .block-heading__title, .archive.category .block-heading.heading-style-7 .block-heading__title',
                    'border-color' => '.archive.category .block-heading.heading-style-15, .archive.category .block-heading.heading-style-9:before, .archive.category .block-heading.heading-style-8:before, .archive.category .block-heading.heading-style-7:before'
                ),
                'default'  => array(),
                'required' => array('bk_category_header_style', 'equals' , array('heading-style-7', 'heading-style-8', 'heading-style-9', 'heading-style-15')),
            ),
            array(
                'id'=>'bk_category_feature_area',
                'type' => 'image_select',
                'title' => esc_html__('Feature Area Layout', 'keylin'),
                'options'  => array(
                    'disable'            => get_template_directory_uri().'/images/admin_panel/disable.png',
                    'mosaic_a'           => get_template_directory_uri().'/images/admin_panel/archive/mosaic_a.png',
                    'mosaic_b'           => get_template_directory_uri().'/images/admin_panel/archive/mosaic_b.png',
                    'mosaic_c'           => get_template_directory_uri().'/images/admin_panel/archive/mosaic_c.png',
                    'featured_block_e'   => get_template_directory_uri().'/images/admin_panel/archive/featured_block_e.png',
                    'featured_block_f'   => get_template_directory_uri().'/images/admin_panel/archive/featured_block_f.png',
                    'posts_block_b'       => get_template_directory_uri().'/images/admin_panel/archive/posts_block_b.png',
                    'posts_block_e'       => get_template_directory_uri().'/images/admin_panel/archive/posts_block_e.png',
                    'posts_block_i'       => get_template_directory_uri().'/images/admin_panel/archive/posts_block_i.png',
                ),
                'default' => 'disable',
            ),
            array(
                'id'        => 'bk_category_feature_area__post_option',
                'type'      => 'select',
                'multi'     => false,
                'title'     => esc_html__('Feature Area Post Option', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    'featured'          => esc_html__( 'Show Featured Posts','keylin'),
                    'latest'            => esc_html__( 'Show Latest Posts','keylin'),
                ),
                'default' => 'latest',
            ),
            array(
                'title' => 'Container Width',
                'id'   => 'bk_container_width',
                'type' => 'button_set',
                'options'   => array(
                    'normal'   => esc_html__( 'Normal','keylin'),
                    'wide'     => esc_html__( 'Wide','keylin'),
                ),
                'default'       => 'normal',
                'required' => array( 'bk_category_feature_area', '=', array('mosaic_a','mosaic_b','featured_block_e','featured_block_f','posts_block_e')),
            ),
            array(
                'id'        => 'bk_feature_area__show_hide',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Show Feature Area on only first page', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1    => esc_html__( 'Yes','keylin'),
                    0    => esc_html__( 'No','keylin'),
                ),
                'default' => 0,
            ),
            array(
                'id'=>'bk_category_content_layout',
                'type' => 'image_select',
                'title' => esc_html__('Content Layout', 'keylin'),
                'options'  => array(
                                    'block_posts_listing_grid_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                                    'block_posts_listing_grid_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                                    'block_posts_listing_grid_3_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                                    'block_posts_listing_list_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                                    'block_posts_listing_list_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                                    'block_posts_listing_grid_alt_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_1.png',
                                    'block_posts_listing_grid_alt_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_2.png',
                                    'block_posts_listing_grid_alt_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_3.png',
                                    'block_posts_listing_grid_alt_4_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_4.png',

                                    // no sidebar Keylin
                                    'block_posts_listing_grid_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                                    'block_posts_listing_grid_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                                    'block_posts_listing_grid_3'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                                    'block_posts_listing_list_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                                    'block_posts_listing_list_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',
                ),
                'default' => 'block_posts_listing_grid_1_has_sidebar',
            ),
            array(
                'id'        => 'bk_category_post_icon',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Post Icon', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    'enable'    => esc_html__( 'Enable','keylin'),
                    'disable'   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 'enable',
            ),
            array(
                'id'        => 'bk_category_pagination',
                'type'      => 'select',
                'multi'     => false,
                'title'     => esc_html__('Pagination', 'keylin'),
                'subtitle'  => esc_html__('Select an option for the pagination', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'default'           => esc_html__( 'Default Pagination','keylin'),
                                    'ajax-pagination'   => esc_html__( 'Ajax Pagination','keylin'),
                                    'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                                    'infinity'          => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                            ),
                'default' => 'default',
            ),
            array(
                'id'=>'bk_category_exclude_posts',
                'type' => 'button_set',
                'required' => array('bk_category_feature_area','!=','disable'),
                'title' => esc_html__('[Content Section] Exclude Posts', 'keylin'),
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-category-sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_category_sidebar_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Category Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose a sidebar for the category page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_category_sidebar_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_category_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-archive-sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Archive Page','keylin'),
        'id'               => 'archive-page-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk_archive_header_style',
                'type' => 'select',
                'title' => esc_html__('Page Heading', 'keylin'),
                'options'   => array(
                                'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                                'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                                'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                                'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                                'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                                'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                                'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                                'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                                'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                                'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                                'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                                'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                                'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                                'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                                'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                                'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                                'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                                'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                                'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                            ),
                'default'    => 'heading-style-16',
            ),
            array(
                'id'          => 'bk_archive_page_heading_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Archive Page Heading Font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform' => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.archive .archive_page .block-heading .block-heading__title, .archive.tag .block-heading .block-heading__title  ',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Archive Page Heading.', 'keylin' ),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-size'     => '48px',
                    'font-weight'    => '700',
                ),
            ),
            array(
                'id'=>'bk_archive_page_heading_color',
                'type'        => 'typography',
                'title'       => esc_html__( 'Archive Page Heading Color ( border )','keylin'),
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'font-family'    => false,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> false,  // Defaults to false
                'color'         => true,
                'preview'       => false, // Disable the previewer
                'all_styles'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.archive .archive_page .block-heading:not(.widget__title), .archive .archive_page .block-heading:not(.widget__title) .block-heading__title, .archive.tag .block-heading:not(.widget__title), .archive.tag .block-heading:not(.widget__title) .block-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Color option for Archive Page Heading.', 'keylin' ),
                'default'     => array(
                    'color' => '',
                ),
                'required' => array(
                    array ('bk_archive_header_style', 'equals' , array( 'heading-style-1','heading-style-2','heading-style-2-center','heading-style-3','heading-style-3-center','heading-style-4','heading-style-5-center','heading-style-6','heading-style-7','heading-style-8','heading-style-9','heading-style-10','heading-style-11','heading-style-12','heading-style-13','heading-style-14','heading-style-15','heading-style-16','heading-style-17')),
                ),
            ),
            array(
                'id'=>'bk_archive_page_heading_background_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Archive Page Heading Background Color', 'keylin' ),
                'output'   => array(
                    'background-color' => '.archive .block-heading.heading-style-15 .block-heading__title, .archive .block-heading.heading-style-9 .block-heading__title, .archive .block-heading.heading-style-8 .block-heading__title, .archive .block-heading.heading-style-7 .block-heading__title',
                    'border-color' => '.archive .block-heading.heading-style-15, .archive .block-heading.heading-style-9:before, .archive .block-heading.heading-style-8:before, .archive .block-heading.heading-style-7:before'
                ),
                'default'  => array(),
                'required' => array('bk_archive_header_style', 'equals' , array('heading-style-7', 'heading-style-8', 'heading-style-9', 'heading-style-15')),
            ),
            array(
                'id'=>'bk_archive_content_layout',
                'type' => 'image_select',
                'title' => esc_html__('Content Layout', 'keylin'),
                'options'  => array(
                    'block_posts_listing_grid_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                    'block_posts_listing_grid_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                    'block_posts_listing_grid_3_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                    'block_posts_listing_list_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                    'block_posts_listing_list_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                    'block_posts_listing_grid_alt_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_1.png',
                    'block_posts_listing_grid_alt_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_2.png',
                    'block_posts_listing_grid_alt_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_3.png',
                    'block_posts_listing_grid_alt_4_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_4.png',

                    // no sidebar Keylin
                    'block_posts_listing_grid_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                    'block_posts_listing_grid_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                    'block_posts_listing_grid_3'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                    'block_posts_listing_list_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                    'block_posts_listing_list_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',
                ),
                'default' => 'block_posts_listing_grid_1_has_sidebar',
            ),
            array(
                'id'        => 'bk_archive_post_icon',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Post Icon', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    'enable'    => esc_html__( 'Enable','keylin'),
                    'disable'   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 'enable',
            ),
            array(
                'id'        => 'bk_archive_pagination',
                'type'      => 'select',
                'multi'     => false,
                'title'     => esc_html__('Pagination', 'keylin'),
                'subtitle'  => esc_html__('Select an option for the pagination', 'keylin'),
                'desc'      => esc_html__('This option is only valid on Tag Pages', 'keylin'),
                'options'   => array(
                                    'default'           => esc_html__( 'Default Pagination','keylin'),
                                    'ajax-pagination'   => esc_html__( 'Ajax Pagination','keylin'),
                                    'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                                    'infinity'          => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                            ),
                'default' => 'default',
            ),
            array(
                'id'=>'section-archive-sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_archive_sidebar_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Archive Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose a sidebar for the archive page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_archive_sidebar_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_archive_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-archive-sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Author Page','keylin'),
        'id'               => 'author-page-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk_author_content_layout',
                'type' => 'image_select',
                'title' => esc_html__('Content Layout', 'keylin'),
                'options'  => array(
                    'block_posts_listing_grid_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                    'block_posts_listing_grid_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                    'block_posts_listing_grid_3_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                    'block_posts_listing_list_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                    'block_posts_listing_list_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                    'block_posts_listing_grid_alt_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_1.png',
                    'block_posts_listing_grid_alt_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_2.png',
                    'block_posts_listing_grid_alt_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_3.png',
                    'block_posts_listing_grid_alt_4_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_4.png',

                    // no sidebar Keylin
                    'block_posts_listing_grid_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                    'block_posts_listing_grid_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                    'block_posts_listing_grid_3'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                    'block_posts_listing_list_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                    'block_posts_listing_list_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',

                ),
                'default' => 'block_posts_listing_grid_1_has_sidebar',
            ),
            // array(
            //     'id'        => 'bk_author_post_icon',
            //     'type'      => 'button_set',
            //     'multi'     => false,
            //     'title'     => esc_html__('Post Icon', 'keylin'),
            //     'desc'      => '',
            //     'options'   => array(
            //         'enable'    => esc_html__( 'Enable','keylin'),
            //         'disable'   => esc_html__( 'Disable','keylin'),
            //     ),
            //     'default' => 'enable',
            // ),
            array(
                'id'        => 'bk_author_pagination',
                'type'      => 'select',
                'multi'     => false,
                'title'     => esc_html__('Pagination', 'keylin'),
                'subtitle'  => esc_html__('Select an option for the pagination', 'keylin'),
                'options'   => array(
                                'default'           => esc_html__( 'Default Pagination','keylin'),
                                'ajax-pagination'   => esc_html__( 'Ajax Pagination','keylin'),
                                'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                                'infinity'          => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                            ),
                'default' => 'default',
            ),
            array(
                'id'=>'section-author-sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_author_sidebar_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Author Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose a sidebar for the author page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_author_sidebar_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_author_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-author-sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search Page','keylin'),
        'id'               => 'search-page-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk_search_header_style',
                'type' => 'select',
                'title' => esc_html__('Page Heading', 'keylin'),
                'options'   => array(
                                'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                                'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                                'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                                'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                                'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                                'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                                'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                                'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                                'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                                'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                                'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                                'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                                'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                                'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                                'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                                'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                                'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                                'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                                'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                            ),
                'default'    => 'heading-style-16',
            ),
            array(
                'id'          => 'bk_search_page_heading_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Search Page Heading Font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform' => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.search .block-heading:not(.widget__title) .block-heading__title.page-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Search Page Heading.', 'keylin' ),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-size'     => '48px',
                    'font-weight'    => '700',
                ),
            ),
            array(
                'id'          => 'bk_search_page_sub_heading_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Search Page Sub Heading Font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform' => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => true,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.search .block-heading:not(.widget__title) .page-heading__subtitle',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Search Page Sub Heading.', 'keylin' ),
                'default'     => array(
                    'font-family' => 'Rubik',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-size'     => '18px',
                    'font-weight'    => '300',
                ),
            ),
            array(
                'id'=>'bk_search_page_heading_color',
                'type'        => 'typography',
                'title'       => esc_html__( 'Search Page Heading Color ( border )','keylin'),
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'font-family'    => false,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> false,  // Defaults to false
                'color'         => true,
                'preview'       => false, // Disable the previewer
                'all_styles'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.search .block-heading:not(.widget__title), .search .block-heading:not(.widget__title) .block-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Color option for Search Page Heading.', 'keylin' ),
                'default'     => array(
                    'color' => '',
                ),
                'required' => array(
                    array ('bk_search_header_style', 'equals' , array( 'heading-style-1','heading-style-2','heading-style-2-center','heading-style-3','heading-style-3-center','heading-style-4','heading-style-5-center','heading-style-6','heading-style-7','heading-style-8','heading-style-9','heading-style-10','heading-style-11','heading-style-12','heading-style-13','heading-style-14','heading-style-15','heading-style-16','heading-style-17')),
                ),
            ),
            array(
                'id'=>'bk_search_page_heading_background_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Search Page Heading Background Color', 'keylin' ),
                'output'   => array(
                    'background-color' => '.search .block-heading.heading-style-15 .block-heading__title, .search .block-heading.heading-style-9 .block-heading__title, .search .block-heading.heading-style-8 .block-heading__title, .search .block-heading.heading-style-7 .block-heading__title',
                    'border-color' => '.search .block-heading.heading-style-15, .search .block-heading.heading-style-9:before, .search .block-heading.heading-style-8:before, .search .block-heading.heading-style-7:before'
            ),
                'default'  => array(),
                'required' => array('bk_search_header_style', 'equals' , array('heading-style-7', 'heading-style-8', 'heading-style-9', 'heading-style-15')),
            ),
            array(
                'id'=>'bk_search_content_layout',
                'type' => 'image_select',
                'title' => esc_html__('Content Layout', 'keylin'),
                'options'  => array(
                    'block_posts_listing_grid_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                    'block_posts_listing_grid_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                    'block_posts_listing_grid_3_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                    'block_posts_listing_list_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                    'block_posts_listing_list_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                    'block_posts_listing_grid_alt_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_1.png',
                    'block_posts_listing_grid_alt_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_2.png',
                    'block_posts_listing_grid_alt_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_3.png',
                    'block_posts_listing_grid_alt_4_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_4.png',

                    // no sidebar Keylin
                    'block_posts_listing_grid_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                    'block_posts_listing_grid_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                    'block_posts_listing_grid_3'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                    'block_posts_listing_list_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                    'block_posts_listing_list_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',

                ),
                'default' => 'block_posts_listing_grid_1_has_sidebar',
            ),
            array(
                'id'        => 'bk_search_post_icon',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Post Icon', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    'enable'    => esc_html__( 'Enable','keylin'),
                    'disable'   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 'enable',
            ),
            array(
                'id'        => 'bk_search_exclude_page_result',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Exclude Pages from the search results', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    'enable'    => esc_html__( 'Enable','keylin'),
                    'disable'   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 'disable',
            ),
            array(
                'id'        => 'bk_search_pagination',
                'type'      => 'select',
                'multi'     => false,
                'title'     => esc_html__('Pagination', 'keylin'),
                'subtitle'  => esc_html__('Select an option for the pagination', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'default'           => esc_html__( 'Default Pagination','keylin'),
                                    'ajax-pagination'   => esc_html__( 'Ajax Pagination','keylin'),
                                    'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                                    'infinity'          => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                            ),
                'default' => 'default',
            ),
            array(
                'id'=>'section-search-sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_search_sidebar_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Search Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose a sidebar for the search page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_search_sidebar_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_search_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-search-sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Page','keylin'),
        'id'               => 'blog-page-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk_blog_header_style',
                'type' => 'select',
                'title' => esc_html__('Page Heading', 'keylin'),
                'options'   => array(
                                'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                                'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                                'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                                'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                                'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                                'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                                'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                                'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                                'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                                'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                                'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                                'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                                'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                                'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                                'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                                'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                                'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                                'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                                'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                            ),
                'default'    => 'heading-style-16',
            ),
            array(
                'id'          => 'bk_blog_heading_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Blog Page Heading Font','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => true,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                'text-transform' => true,
                //'word-spacing'  => true,  // Defaults to false
                'letter-spacing'=> true,  // Defaults to false
                'color'         => false,
                'preview'       => true, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.blog_page .block-heading:not(.widget__title) .block-heading__title.page-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Blog Page Heading.', 'keylin' ),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-backup' => 'Arial, Helvetica, sans-serif',
                    'font-size'     => '48px',
                    'font-weight'    => '700',
                ),
            ),
            array(
                'id'=>'bk_blog_page_heading_color',
                'type'        => 'typography',
                'title'       => esc_html__( 'Blog Page Heading Color ( border )','keylin'),
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'font-family'    => false,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> false,  // Defaults to false
                'color'         => true,
                'preview'       => false, // Disable the previewer
                'all_styles'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => '.blog_page .block-heading:not(.widget__title), .blog_page .block-heading:not(.widget__title) .block-heading__title',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option for Blog Page Sub Heading.', 'keylin' ),
                'default'     => array(
                    'color' => '',
                ),
                'required' => array(
                    array ('bk_blog_header_style', 'equals' , array( 'heading-style-1','heading-style-2','heading-style-2-center','heading-style-3','heading-style-3-center','heading-style-4','heading-style-5-center','heading-style-6','heading-style-7','heading-style-8','heading-style-9','heading-style-10','heading-style-11','heading-style-12','heading-style-13','heading-style-14','heading-style-15','heading-style-16','heading-style-17')),
                ),
            ),
            array(
                'id'=>'bk_blog_page_heading_background_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Blog Page Heading Background Color', 'keylin' ),
                'output'   => array(
                    'background-color' => '.blog_page .block-heading.heading-style-15 .block-heading__title, .blog_page .block-heading.heading-style-9 .block-heading__title, .blog_page .block-heading.heading-style-8 .block-heading__title, .blog_page .block-heading.heading-style-7 .block-heading__title',
                    'border-color' => '.blog_page .block-heading.heading-style-15, .blog_page .block-heading.heading-style-9:before, .blog_page .block-heading.heading-style-8:before, .blog_page .block-heading.heading-style-7:before'
                ),
                'default'  => array(),
                'required' => array('bk_blog_header_style', 'equals' , array('heading-style-7', 'heading-style-8', 'heading-style-9', 'heading-style-15')),
            ),
            array(
                'id'=>'bk_blog_page_heading_background_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Blog Page Heading Background Color', 'keylin' ),
                'output'   => array(
                    'background-color' => '.blog_page .block-heading.heading-style-15 .block-heading__title, .blog_page .block-heading.heading-style-9 .block-heading__title, .blog_page .block-heading.heading-style-8 .block-heading__title, .blog_page .block-heading.heading-style-7 .block-heading__title',
                    'border-color' => '.blog_page .block-heading.heading-style-15, .blog_page .block-heading.heading-style-9:before, .blog_page .block-heading.heading-style-8:before, .blog_page .block-heading.heading-style-7:before'
                ),
                'default'  => array(),
                'required' => array('bk_blog_header_style', 'equals' , array('heading-style-7', 'heading-style-8', 'heading-style-9', 'heading-style-15')),
            ),
            array(
                'id'=>'bk_blog_content_layout',
                'type' => 'image_select',
                'title' => esc_html__('Content Layout', 'keylin'),
                'options'  => array(
                    'block_posts_listing_grid_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                    'block_posts_listing_grid_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                    'block_posts_listing_grid_3_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                    'block_posts_listing_list_1_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                    'block_posts_listing_list_2_has_sidebar'        => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                    'block_posts_listing_grid_alt_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_1.png',
                    'block_posts_listing_grid_alt_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_2.png',
                    'block_posts_listing_grid_alt_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_3.png',
                    'block_posts_listing_grid_alt_4_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_alt_4.png',

                    // no sidebar Keylin
                    'block_posts_listing_grid_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                    'block_posts_listing_grid_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                    'block_posts_listing_grid_3'         => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                    'block_posts_listing_list_1'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                    'block_posts_listing_list_2'         => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',
                ),
                'default' => 'block_posts_listing_grid_1_has_sidebar',
            ),
            array(
                'id'        => 'bk_blog_post_icon',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Post Icon', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    'enable'    => esc_html__( 'Enable','keylin'),
                    'disable'   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 'enable',
            ),
            array(
                'id'        => 'bk_blog_pagination',
                'type'      => 'select',
                'multi'     => false,
                'title'     => esc_html__('Pagination', 'keylin'),
                'subtitle'  => esc_html__('Select an option for the pagination', 'keylin'),
                'options'   => array(
                    'default'           => esc_html__( 'Default Pagination','keylin'),
                    'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                    'infinity'          => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                ),
                'default' => 'default',
            ),
            array(
                'id'=>'section-blog-sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_blog_sidebar_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Blog Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose a sidebar for the blog page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_blog_sidebar_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_blog_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-blog-sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( '404 Page', 'keylin' ),
        'id'               => '404-page-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'section-404-logo-start',
                'title' => esc_html__('404 Logo', 'keylin'),
                'type' => 'section',                             
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => '404-logo-toggle',  
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Enable 404 Logo', 'keylin'),
                'subtitle'  => esc_html__('Enable / Disable 404 Logo', 'keylin'),
                'options'   => array(
                    1   => esc_html__( 'Enable', 'keylin' ),
                    0   => esc_html__( 'Disable', 'keylin' ),
                ),
                'default' => 0,
            ),
            array(
                'id'=>'404-logo',
                'type' => 'media',
                'required' => array(
                    array('404-logo-toggle', 'equals' , 1),
                ),
                'url'=> true,
                'title' => esc_html__('Logo', 'keylin'),
                'subtitle' => esc_html__('Upload the logo that should be displayed in 404 page', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id' => '404-logo-width',
                'type' => 'slider',
                'title' => esc_html__('Site Logo Width (px)', 'keylin'),
                'required' => array(
                    array('404-logo-toggle', 'equals' , 1),
                ),
                'display_value' => 'text',
                'min' => 0,
                'step' => 10,
                'max' => 1000,
                'default' => 200,
            ),
            array(
                'id'=>'section-404-logo-end',
                'type' => 'section', 
                'indent' => false // Indent all options below until the next 'section' option is set.
            ), 
            array(
                'id'=>'section-404-image-start',
                'title' => esc_html__('404 Image', 'keylin'),
                'type' => 'section',                             
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'=>'404-image',
                'type' => 'media', 
                'url'=> true,
                'title' => esc_html__('404 Image', 'keylin'),
                'subtitle' => esc_html__('Leave this field empty if you would like to use the default option', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'section-404-image-end',
                'type' => 'section', 
                'indent' => false // Indent all options below until the next 'section' option is set.
            ), 
            array(
                'id'=>'section-404-text-start',
                'title' => esc_html__('404 Text', 'keylin'),
                'type' => 'section',                             
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => '404-subtitle',
                'type'     => 'textarea',
                'rows'     => 3,
                'title'    => esc_html__('404 Subtitle', 'keylin'),
                'default'  => esc_html__('Something went wrong!' , 'keylin')
            ),   
            array(
                'id'       => '404-description',
                'type'     => 'textarea',
                'rows'     => 3,
                'title'    => esc_html__('404 Description', 'keylin'),
            ),
            array(
                'id'=>'section-404-text-end',
                'type' => 'section', 
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'=>'section-404-search-start',
                'title' => esc_html__('404 Search', 'keylin'),
                'type' => 'section',                             
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => '404-search',  
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Search Field', 'keylin'),
                'subtitle'  => esc_html__('Enable / Disable Search Field', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable', 'keylin' ),
                    0   => esc_html__( 'Disable', 'keylin' ),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-404-search-end',
                'type' => 'section', 
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Default Page Template','keylin'),
        'id'               => 'default-page-template-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'bk_page_header_style',
                'title' => 'Page Heading',
                'type'  => 'select',
                'options'   => array(
                    'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                    'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                    'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                    'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                    'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                    'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                    'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                    'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                    'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                    'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                    'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                    'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                    'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                    'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                    'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                    'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                    'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                    'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                    'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                    'heading-style-18'        => esc_html__( 'Heading Style 18','keylin'),
                    ),
                'default'    => 'heading-style-16',
            ),
            array(
                'id'        => 'bk_page_feat_img',
                'title'     => esc_html__( 'Feature Image Show/Hide','keylin'),
                'type'      => 'switch',
                'options'   => array(
                                1 => esc_html__( 'Show','keylin'),
                                0 => esc_html__( 'Hide','keylin'),
                            ),
                'default'    => 1,
            ),
            array(
                'id'=>'bk_page_layout',
                'type' => 'select',
                'title' => esc_html__('Layout', 'keylin'),
                'options'  => array(
                    'has_sidebar' => esc_html__( 'Has Sidebar','keylin'),
                    'no_sidebar'  => esc_html__( 'Full Width -- No sidebar','keylin'),
                ),
                'default' => 'has_sidebar',
            ),
            array(
                'id'=>'section-default-page--sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_page_sidebar_select',
                'type'      => 'select',
                'data'      => 'sidebars',
                'multi'     => false,
                'title'     => esc_html__('Page Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Choose a sidebar for the page', 'keylin'),
                'default'   => 'home_sidebar',
            ),
            array(
                'id'        => 'bk_page_sidebar_position',
                'type'      => 'image_select',
                'multi'     => false,
                'title'     => esc_html__('Sidebar Postion', 'keylin'),
                'desc'      => '',
                'options'   => array(
                                    'right' => array(
                                        'alt' => 'Sidebar Right',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                    ),
                                    'left' => array(
                                        'alt' => 'Sidebar Left',
                                        'img' => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                                    ),
                            ),
                'default' => 'right',
            ),
            array(
                'id'        => 'bk_page_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-default-page--sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Pagebuilder Template','keylin'),
        'id'               => 'pagebuilder-template-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'section-pagebuilder--sidebar-start',
                'title' => esc_html__('Sidebar', 'keylin'),
                'type' => 'section',
                'indent' => true // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'        => 'bk_pagebuilder_sidebar_sticky',
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Sticky Sidebar', 'keylin'),
                'subtitle'  => esc_html__('Enable Sticky Sidebar / Disable Sticky Sidebar', 'keylin'),
                'desc'      => '',
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
                'default' => 1,
            ),
            array(
                'id'=>'section-pagebuilder--sidebar-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );
