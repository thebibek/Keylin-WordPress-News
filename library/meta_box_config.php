<?php
/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
add_filter( 'rwmb_meta_boxes', 'atbs_register_meta_boxes' );
if ( ! function_exists( 'atbs_register_meta_boxes' ) ) {
    function atbs_register_meta_boxes( $meta_boxes ) {
    
        // Better has an underscore as last sign
    
        global $meta_boxes;
    
        $bk_sidebar = array();
        foreach ( $GLOBALS['wp_registered_sidebars'] as $value => $label ) {
            $bk_sidebar[$value] = ucwords( $label['name'] );
        }
        $bk_sidebar['global_settings']  = esc_html__( 'From Theme Options','keylin');
    
        // Post SubTitle
        $meta_boxes[] = array(
            'id' => 'bk_post_subtitle_section',
            'title' => esc_html__( 'BK SubTitle','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__( 'SubTitle','keylin'),
                    'desc' => esc_html__('Insert the SubTitle for this post', 'keylin'),
                    'id' => 'bk_post_subtitle',
                    'type' => 'textarea',
                    'placeholder' => esc_html__('SubTitle ...', 'keylin'),
                    'std' => ''
                ),
            )
        );
        // Page Descriptipon
        $meta_boxes[] = array(
            'id'        => 'bk_page_description_section',
            'title'     => esc_html__( 'Page Description','keylin'),
            'pages'     => array( 'page' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'hidden'   => array( 'page_template', 'in', array('page_builder.php')),
            'fields'    => array(
                array(
                    'name' => esc_html__( 'Page Description','keylin'),
                    'id' => 'bk_page_description',
                    'type' => 'textarea',
                    'placeholder' => esc_html__('description ...', 'keylin'),
                    'std' => ''
                ),
            ),
        );
        // Page Settings
        $meta_boxes[] = array(
            'id'        => 'bk_page_settings_section',
            'title'     => esc_html__( 'Page Settings','keylin'),
            'pages'     => array( 'page' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'hidden'   => array( 'page_template', 'in', array('blog.php', 'page_builder.php')),
            'fields'    => array(
                // Featured Image Config
                array(
                    'name'      => esc_html__( 'Featured Image','keylin'),
                    'id'        => 'bk_page_feat_img',
                    'type'      => 'button_group',
                    'options'   => array(
                                    'global_settings' => esc_html__( 'From Theme Options','keylin'),
                                    1 => esc_html__( 'On','keylin'),
                                    0 => esc_html__( 'Off','keylin'),
                                ),
                    // Select multiple values, optional. Default is false.
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                // Layout
                array(
                    'name' => esc_html__( 'Layout','keylin'),
                    'id' => 'bk_page_layout',
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings' => esc_html__( 'From Theme Options','keylin'),
                                    'has_sidebar' => esc_html__( 'Has Sidebar','keylin'),
                                    'no_sidebar'  => esc_html__( 'Full Width -- No sidebar','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
    
                // Sidebar
                array(
                    'name' => esc_html__( 'Choose a sidebar for this page','keylin'),
                    'id' => 'bk_page_sidebar_select',
                    'type' => 'select',
                    'options'  => $bk_sidebar,
                    'std'  => 'global_settings',
                    'hidden' => array( 'bk_page_layout', 'in', array('no_sidebar')),
                ),
                array(
                    'name' => esc_html__( 'Sidebar Position -- Left/Right','keylin'),
                    'id' => 'bk_page_sidebar_position',
                    'type' => 'image_select',
                    'options'   => array(
                            'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                            'right' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                            'left'  => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                    ),
                    'std'  => 'global_settings',
                    'hidden' => array( 'bk_page_layout', 'in', array('no_sidebar')),
                ),
                array(
                    'name'      => esc_html__( 'Sticky Sidebar','keylin'),
                    'id'        => 'bk_page_sidebar_sticky',
                    'type'      => 'button_group',
                    'options'   => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Enable','keylin'),
                                    0                   => esc_html__( 'Disable','keylin'),
                                ),
                    'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Default Page Template','keylin'),
                    'std'       => 'global_settings',
                    'hidden' => array( 'bk_page_layout', 'in', array('no_sidebar')),
                ),
            )
        );
        // Post Layout Options
        $meta_boxes[] = array(
            'id' => 'bk_post_ops',
            'title' => esc_html__( 'BK Layout Options','keylin'),
            'desc'   =>  esc_html__( 'From Theme Option: Theme Options -> Single Page','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
    
            'fields' => array(
                array(
                    'id' => 'bk_post_layout_standard',
                    'class' => 'post-layout-options',
                    'name' => esc_html__( 'Post Layout Option','keylin'),
                    'type' => 'image_select',
                    'options'  => array(
                                    'global_settings' => get_template_directory_uri().'/images/admin_panel/default.png',
                                    'single-1' => get_template_directory_uri().'/images/admin_panel/single_page/single-1.png',
                                    'single-2' => get_template_directory_uri().'/images/admin_panel/single_page/single-2.png',
                                    'single-3' => get_template_directory_uri().'/images/admin_panel/single_page/single-3.png',
                                    'single-4' => get_template_directory_uri().'/images/admin_panel/single_page/single-4.png',
                                    'single-5' => get_template_directory_uri().'/images/admin_panel/single_page/single-5.png',
                                    'single-6' => get_template_directory_uri().'/images/admin_panel/single_page/single-6.png',
                                    'single-7' => get_template_directory_uri().'/images/admin_panel/single_page/single-7.png',
                                    'single-8' => get_template_directory_uri().'/images/admin_panel/single_page/single-8.png',
                                    'single-9' => get_template_directory_uri().'/images/admin_panel/single_page/single-9.png',
                                    'single-10' => get_template_directory_uri().'/images/admin_panel/single_page/single-10.png',
                                    'single-11' => get_template_directory_uri().'/images/admin_panel/single_page/single-11.png',
                                    'single-12' => get_template_directory_uri().'/images/admin_panel/single_page/single-12.png',
                                    'single-13' => get_template_directory_uri().'/images/admin_panel/single_page/single-13.png',
                                    'single-14' => get_template_directory_uri().'/images/admin_panel/single_page/single-14.png',
                                    'single-15' => get_template_directory_uri().'/images/admin_panel/single_page/single-15.png',
                                    'single-16' => get_template_directory_uri().'/images/admin_panel/single_page/single-16.png',
                                    'single-17' => get_template_directory_uri().'/images/admin_panel/single_page/single-17.png',
    
                                ),
                    'std'         => 'global_settings',
                ),
                array(
                    'type' => 'divider',
                    'visible' => array(
                             array( 'bk_post_layout_standard', 'in', array('single-7', 'single-8', 'single-9', 'single-10')),
                        ),
                ),
                array(
                    'name' => 'Single Header Background',
                    'desc' => esc_html__('Leave empty to use the setting from Theme Options', 'keylin'),
                    'id'   => 'bk-single-header--bg-color',
                    'type' => 'color',
                    'std'  => '#151416',
                    'visible' => array(
                             array( 'bk_post_layout_standard', 'in', array('single-7', 'single-8', 'single-9', 'single-10')),
                        )
                ),
                array(
                    'name'      => esc_html__( 'Background Pattern','keylin'),
                    'id'        => 'bk-single-header--bg-pattern',
                    'type'      => 'button_group',
                    'options'   => array(
                                    1 => esc_html__( 'Enable','keylin'),
                                    0 => esc_html__( 'Disable','keylin'),
                                ),
                    'std'       => 0,
                    'visible' => array(
                                 array( 'bk_post_layout_standard', 'in', array('single-7', 'single-8', 'single-9', 'single-10')),
                            ),
                ),
                array(
                    'name'      => esc_html__( 'Header Text','keylin'),
                    'id'        => 'bk-single-header--inverse',
                    'type'      => 'button_group',
                    'options'   => array(
                                    1 => esc_html__( 'White','keylin'),
                                    0 => esc_html__( 'Black','keylin'),
                                ),
                    'std'       => '1',
                    'visible' => array(
                                 array( 'bk_post_layout_standard', 'in', array('single-7', 'single-8', 'single-9', 'single-10')),
                            ),
                ),
                array(
                    'type' => 'divider',
                    'visible' => array(
                                 array( 'bk_post_layout_standard', 'in', array('single-1', 'single-2', 'single-3', 'single-4',
                                                                               'single-5', 'single-6', 'single-9', 'single-10')),
                            ),
                ),
                // Feature Image Config
                array(
                    'name' => esc_html__( 'Featured Image Config','keylin'),
                    'id' => 'bk-feat-img-status',
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings' => esc_html__( 'From Theme Options','keylin'),
                                    1 => esc_html__( 'On','keylin'),
                                    0 => esc_html__( 'Off','keylin'),
                                ),
                    'std'         => 'global_settings',
                    'visible' => array(
                                 array( 'bk_post_layout_standard', 'in', array('single-1', 'single-2', 'single-3', 'single-4',
                                                                               'single-5', 'single-6', 'single-9', 'single-10')),
                            ),
                ),
            )
        );
        $meta_boxes[] = array(
            'id' => 'bk_section_show_hide',
            'title' => esc_html__( 'BK Single Post Section Show/Hide','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(
                array(
                    'id' => 'bk-authorbox-sw',
                    'class' => 'bk-authorbox-sw',
                    'name' => esc_html__( 'Author Box','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Show','keylin'),
                                    0                   => esc_html__( 'Hide','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk-postnav-sw',
                    'class' => 'bk-postnav-sw',
                    'name' => esc_html__( 'Post Nav Section','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Show','keylin'),
                                    0                   => esc_html__( 'Hide','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk-related-sw',
                    'class' => 'bk-related-sw',
                    'name' => esc_html__( 'Related Section','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Show','keylin'),
                                    0                   => esc_html__( 'Hide','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk-same-cat-sw',
                    'class' => 'bk-same-cat-sw',
                    'name' => esc_html__( 'Same Category Section','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Show','keylin'),
                                    0                   => esc_html__( 'Hide','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            ),
        );
        //Comments
        $meta_boxes[] = array(
            'id' => 'bk_comments_post_ops',
            'title' => esc_html__( 'BK Comments Post Setting','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(
                array(
                    'id' => 'bk_comments_heading_style',
                    'class' => 'comments_heading_style',
                    'name' => esc_html__( 'Heading Style','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings'    => esc_html__( 'From Theme Options','keylin'),
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
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            )
        );
        // Related Post Options
        $meta_boxes[] = array(
            'id' => 'bk_related_post_ops',
            'title' => esc_html__( 'BK Related Post Setting','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'hidden' => array(
                            'when' => array(
                                 array( 'bk_post_layout_standard', 'in', array('global_settings', 'single-3', 'single-6', 'single-8', 'single-10', 'single-13', 'single-16')),
                                 array( 'bk-related-sw', 0 )
                             ),
                             'relation' => 'or'
                        ),
            'fields' => array(
                array(
                    'id' => 'bk_related_heading_style',
                    'class' => 'related_heading_style',
                    'name' => esc_html__( 'Heading Style','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings'    => esc_html__( 'From Theme Options','keylin'),
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
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_related_source',
                    'class' => 'related_post_options',
                    'name' => esc_html__( 'Related Posts','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings' => esc_html__( 'From Theme Options','keylin'),
                                    'category_tag' => esc_html__( 'Same Categories and Tags','keylin'),
                                    'tag'          => esc_html__( 'Same Tags','keylin'),
                                    'category'     => esc_html__( 'Same Categories','keylin'),
                                    'author'       => esc_html__( 'Same Author','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_related_post_layout',
                    'class' => 'related_post_layout',
                    'name' => esc_html__( 'Layout','keylin'),
                    'type' => 'image_select',
                    'options'  => array(
                                    'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                                    'listing_grid_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                                    'listing_grid_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                                    'listing_grid_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                                    'listing_list_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                                    'listing_list_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_related_post_icon',
                    'class' => 'related_post_icon',
                    'name' => esc_html__( 'Post Icon','keylin'),
                    'type' => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    'disable'           => esc_html__( 'Disable','keylin'),
                                    'enable'            => esc_html__( 'Enable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_number_related',
                    'class' => 'related_post_options',
                    'name' => esc_html__( 'Number of Related Posts','keylin'),
                    'type' => 'select',
                    'options'  => array(
                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                        '1'                 => esc_html__( '1','keylin'),
                        '2'                 => esc_html__( '2','keylin'),
                        '3'                 => esc_html__( '3','keylin'),
                        '4'                 => esc_html__( '4','keylin'),
                        '5'                 => esc_html__( '5','keylin'),
                        '6'                 => esc_html__( '6','keylin'),
                        '7'                 => esc_html__( '7','keylin'),
                        '8'                 => esc_html__( '8','keylin'),
                        '9'                 => esc_html__( '9','keylin'),
                        '10'                => esc_html__( '10','keylin'),
                        '11'                => esc_html__( '11','keylin'),
                        '12'                => esc_html__( '12','keylin'),
                    ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            )
        );
        // Related Post Options
        $meta_boxes[] = array(
            'id' => 'bk_related_post_ops_wide',
            'title' => esc_html__( 'BK Related Post Section - Wide Setting','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'visible' => array(
                             array( 'bk_post_layout_standard', 'in', array('single-3', 'single-6', 'single-8', 'single-10', 'single-13', 'single-16')),
                             array( 'bk-related-sw', '!=', 0 )
                        ),
            'fields' => array(
                array(
                    'id' => 'bk_same_cat_heading_style_wide',
                    'class' => 'same_cat_heading_style',
                    'name' => esc_html__( 'Heading Style','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings'    => esc_html__( 'From Theme Options','keylin'),
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
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_related_source_wide',
                    'class' => 'related_post_options',
                    'name' => esc_html__( 'Related Posts','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings' => esc_html__( 'From Theme Options','keylin'),
                                    'category_tag' => esc_html__( 'Same Categories and Tags','keylin'),
                                    'tag'          => esc_html__( 'Same Tags','keylin'),
                                    'category'     => esc_html__( 'Same Categories','keylin'),
                                    'author'       => esc_html__( 'Same Author','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_related_post_layout_wide',
                    'class' => 'related_post_layout',
                    'name' => esc_html__( 'Layout','keylin'),
                    'type' => 'image_select',
                    'options'  => array(
                                    'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                                    'listing_grid_1'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                                    'listing_grid_2'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                                    'listing_grid_3'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                                    'listing_list_1'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                                    'listing_list_2'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',
    
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_related_post_icon_wide',
                    'class' => 'related_post_icon',
                    'name' => esc_html__( 'Post Icon','keylin'),
                    'type' => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    'disable'           => esc_html__( 'Disable','keylin'),
                                    'enable'            => esc_html__( 'Enable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_number_related_wide',
                    'class' => 'related_post_options',
                    'name' => esc_html__( 'Number of Posts', 'keylin' ),
                    'type' => 'select', 
                    'options'  => array(
                        'global_settings'   => esc_html__( 'From Theme Options', 'keylin' ),
                        '1'                 => esc_html__( '1', 'keylin' ),
                        '2'                 => esc_html__( '2', 'keylin' ),
                        '3'                 => esc_html__( '3', 'keylin' ),
                        '4'                 => esc_html__( '4', 'keylin' ),
                        '5'                 => esc_html__( '5', 'keylin' ),
                        '6'                 => esc_html__( '6', 'keylin' ),
                        '7'                 => esc_html__( '7', 'keylin' ),
                        '8'                 => esc_html__( '8', 'keylin' ),
                        '9'                 => esc_html__( '9', 'keylin' ),
                        '10'                => esc_html__( '10', 'keylin' ),
                        '11'                => esc_html__( '11', 'keylin' ),
                        '12'                => esc_html__( '12', 'keylin' ),
                    ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            )
        );
        // Same Category Posts Options
        $allCategories = get_categories();
        $catArray = array();
        $catArray['current_cat'] = esc_html__('Current Category', 'keylin');
        foreach ( $allCategories as $key => $category ) {
            $catArray[$category->term_id] = $category->name;
        }
        $meta_boxes[] = array(
            'id' => 'bk_same_cat_post_ops',
            'title' => esc_html__( 'BK Same Category Posts Setting','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'hidden' => array(
                            'when' => array(
                                 array( 'bk_post_layout_standard', 'in', array('global_settings', 'single-3', 'single-6', 'single-8', 'single-10', 'single-13', 'single-16')),
                                 array( 'bk-same-cat-sw', 0 )
                             ),
                             'relation' => 'or'
                        ),
            'fields' => array(
                array(
                    'id'         => 'bk_same_cat_id',
                    'class'      => 'same_cat_id',
                    'name'       => esc_html__( 'Category: ','keylin'),
                    'type'       => 'select',
                    'options'    => $catArray,
                    'multiple'   => false,
                    'std'        => 'current_cat',
                ),
                array(
                    'id' => 'bk_same_cat_heading_style',
                    'class' => 'same_cat_heading_style',
                    'name' => esc_html__( 'Heading Style','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings'    => esc_html__( 'From Theme Options','keylin'),
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
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_post_layout',
                    'class' => 'same_cat_post_layout',
                    'name' => esc_html__( 'Layout','keylin'),
                    'type' => 'image_select',
                    'options'  => array(
                                    'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                                    'listing_grid_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1.png',
                                    'listing_grid_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2.png',
                                    'listing_grid_3_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3.png',
                                    'listing_list_1_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1.png',
                                    'listing_list_2_has_sidebar'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2.png',
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_post_icon',
                    'class' => 'same_cat_post_icon',
                    'name' => esc_html__( 'Post Icon','keylin'),
                    'type' => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    'disable'           => esc_html__( 'Disable','keylin'),
                                    'enable'            => esc_html__( 'Enable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_number_posts',
                    'class' => 'same_cat_number_posts',
                    'name' => esc_html__( 'Number of Posts','keylin'),
                    'type' => 'select',
                    'options'  => array(
                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                        '1'                 => esc_html__( '1','keylin'),
                        '2'                 => esc_html__( '2','keylin'),
                        '3'                 => esc_html__( '3','keylin'),
                        '4'                 => esc_html__( '4','keylin'),
                        '5'                 => esc_html__( '5','keylin'),
                        '6'                 => esc_html__( '6','keylin'),
                        '7'                 => esc_html__( '7','keylin'),
                        '8'                 => esc_html__( '8','keylin'),
                        '9'                 => esc_html__( '9','keylin'),
                        '10'                => esc_html__( '10','keylin'),
                        '11'                => esc_html__( '11','keylin'),
                        '12'                => esc_html__( '12','keylin'),
                    ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_more_link',
                    'class' => 'same_cat_more_link',
                    'name' => esc_html__( 'More Link','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Enable','keylin'),
                                    0                   => esc_html__( 'Disable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            )
        );
    
        // Related Post Options
        $meta_boxes[] = array(
            'id' => 'bk_same_cat_post_ops_wide',
            'title' => esc_html__( 'BK Same Category Post Section - Wide Setting','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'visible' => array(
                             array( 'bk_post_layout_standard', 'in', array('single-3', 'single-6', 'single-8', 'single-10', 'single-13', 'single-16')),
                             array( 'bk-same-cat-sw', '!=', 0 )
                        ),
            'fields' => array(
                array(
                    'id'         => 'bk_same_cat_id_wide',
                    'class'      => 'same_cat_id_wide',
                    'name'       => esc_html__( 'Category: ','keylin'),
                    'type'       => 'select',
                    'options'    => $catArray,
                    'multiple'   => false,
                    'std'        => 'disable',
                ),
                array(
                    'id' => 'bk_same_cat_heading_style_wide',
                    'class' => 'same_cat_heading_style',
                    'name' => esc_html__( 'Heading Style','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'global_settings'    => esc_html__( 'From Theme Options','keylin'),
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
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_post_layout_wide',
                    'class' => 'same_cat_post_layout_wide',
                    'name' => esc_html__( 'Layout','keylin'),
                    'type' => 'image_select',
                    'options'  => array(
                                    'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                                    'mosaic_a'          => get_template_directory_uri().'/images/admin_panel/archive/mosaic_a.png',
                                    'mosaic_b'          => get_template_directory_uri().'/images/admin_panel/archive/mosaic_b.png',
                                    'mosaic_c'          => get_template_directory_uri().'/images/admin_panel/archive/mosaic_c.png',
                                    'featured_block_e'  => get_template_directory_uri().'/images/admin_panel/archive/featured_block_e.png',
                                    'featured_block_f'  => get_template_directory_uri().'/images/admin_panel/archive/featured_block_f.png',
                                    'posts_block_b'     => get_template_directory_uri().'/images/admin_panel/archive/posts_block_b.png',
                                    'posts_block_e'     => get_template_directory_uri().'/images/admin_panel/archive/posts_block_e.png',
                                    'posts_block_i'     => get_template_directory_uri().'/images/admin_panel/archive/posts_block_i.png',
    
                                    'listing_grid_1'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_1_no_sidebar.png',
                                    'listing_grid_2'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_2_no_sidebar.png',
                                    'listing_grid_3'    => get_template_directory_uri().'/images/admin_panel/archive/listing_grid_3_no_sidebar.png',
                                    'listing_list_1'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_1_no_sidebar.png',
                                    'listing_list_2'    => get_template_directory_uri().'/images/admin_panel/archive/listing_list_2_no_sidebar.png',
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_post_icon_wide',
                    'class' => 'same_cat_post_icon_wide',
                    'name' => esc_html__( 'Post Icon','keylin'),
                    'type' => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    'disable'           => esc_html__( 'Disable','keylin'),
                                    'enable'            => esc_html__( 'Enable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_same_cat_number_posts_wide',
                    'class' => 'same_cat_post_options',
                    'name' => esc_html__( 'Number of Posts', 'keylin' ),
                    'type' => 'select', 
                    'options'  => array(
                        'global_settings'   => esc_html__( 'From Theme Options', 'keylin' ),
                        '1'                 => esc_html__( '1', 'keylin' ),
                        '2'                 => esc_html__( '2', 'keylin' ),
                        '3'                 => esc_html__( '3', 'keylin' ),
                        '4'                 => esc_html__( '4', 'keylin' ),
                        '5'                 => esc_html__( '5', 'keylin' ),
                        '6'                 => esc_html__( '6', 'keylin' ),
                        '7'                 => esc_html__( '7', 'keylin' ),
                        '8'                 => esc_html__( '8', 'keylin' ),
                        '9'                 => esc_html__( '9', 'keylin' ),
                        '10'                => esc_html__( '10', 'keylin' ),
                        '11'                => esc_html__( '11', 'keylin' ),
                        '12'                => esc_html__( '12', 'keylin' ),
                    ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                    'hidden' => array('bk_same_cat_post_layout_wide', 'in', array('mosaic_a', 'mosaic_b', 'mosaic_c', 'featured_block_e', 'featured_block_f', 'posts_block_b', 'posts_block_e', 'posts_block_i'))
                ),
                array(
                    'name' => 'Container Width',
                    'id'   => 'bk_same_cat_container_width',
                    'type' => 'button_group',
                    'options'   => array(
                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                        'normal'   => esc_html__( 'Normal','keylin'),
                        'wide'          => esc_html__( 'Wide','keylin'),
                    ),
                    'std'       => 'normal',
                    'visible' => array( 'bk_same_cat_post_layout_wide', 'in', array('mosaic_a','mosaic_b','featured_block_e','featured_block_f','posts_block_e')),
                ),
                array(
                    'id' => 'bk_same_cat_more_link_wide',
                    'class' => 'same_cat_more_link_wide',
                    'name' => esc_html__( 'More Link','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Enable','keylin'),
                                    0                   => esc_html__( 'Disable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            )
        );
        $meta_boxes[] = array(
            'id' => 'bk_single_post_sidebar',
            'title' => esc_html__( 'Sidebar Option','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'low',
            'hidden' => array('bk_post_layout_standard', 'in', array('single-3', 'single-6', 'single-8', 'single-10', 'single-13', 'single-16')),
            'fields' => array(
                // Sidebar Select
                array(
                    'name' => esc_html__( 'Choose a sidebar for this post','keylin'),
                    'id' => 'bk_post_sb_select',
                    'type' => 'select',
                    'options'  => $bk_sidebar,
                    'desc' => esc_html__( 'Sidebar Select','keylin'),
                    'std'  => 'global_settings',
                ),
                array(
                    'id' => 'bk_post_sb_position',
                    'class' => 'post_sb_position',
                    'name' => esc_html__( 'Sidebar Position','keylin'),
                    'type' => 'image_select',
                    'options'  => array(
                                    'global_settings'   => get_template_directory_uri().'/images/admin_panel/default.png',
                                    'right'             => get_template_directory_uri().'/images/admin_panel/single_page/sb-right.png',
                                    'left'              => get_template_directory_uri().'/images/admin_panel/single_page/sb-left.png',
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
                array(
                    'id' => 'bk_post_sb_sticky',
                    'class' => 'post_sb_sticky',
                    'name' => esc_html__( 'Sidebar Sticky','keylin'),
                    'type'     => 'button_group',
                    'options'  => array(
                                    'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                    1                   => esc_html__( 'Enable','keylin'),
                                    0                   => esc_html__( 'Disable','keylin'),
                                ),
                    'multiple'    => false,
                    'std'         => 'global_settings',
                ),
            )
        );
    
        $meta_boxes[] = array(
            'id' => 'bk_video_post_format',
            'title' => esc_html__( 'BK Video Post Format','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'high',
            'visible' => array( 'post_format', 'in', array('video')),
            'fields' => array(
                //Video
                array(
                    'name' => esc_html__( 'Format Options: Video','keylin'),
                    'desc' => esc_html__('Support Youtube, Vimeo Link', 'keylin'),
                    'id' => 'bk_video_media_link',
                    'type'  => 'oembed',
                    'placeholder' => esc_html__('Link ...', 'keylin'),
                    'std' => ''
                ),
            )
        );
        $meta_boxes[] = array(
            'id' => 'bk_gallery_post_format',
            'title' => esc_html__( 'BK Gallery Post Format','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'high',
            'visible' => array( 'post_format', 'in', array('gallery')),
            'fields' => array(
                //Gallery
                array(
                    'name' => esc_html__( 'Format Options: Gallery','keylin'),
                    'desc' => esc_html__('Gallery Images', 'keylin'),
                    'id' => 'bk_gallery_content',
                    'type' => 'image_advanced',
                    'std' => ''
                ),
                array(
                    'id' => 'bk_gallery_type',
                    'name' => esc_html__( 'Gallery Type','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'gallery-1' => esc_html__( 'Gallery 1','keylin'),
                                    'gallery-2' => esc_html__( 'Gallery 2 ','keylin'),
                                    'gallery-3' => esc_html__( 'Gallery 3','keylin'),
                                ),
                    // Select multiple values, optional. Default is false.
                    'multiple'    => false,
                    'std'         => 'left',
                ),
            )
        );
        // Post Review Options
        $meta_boxes[] = array(
            'id' => 'bk_review',
            'title' => esc_html__( 'BK Review System','keylin'),
            'pages' => array( 'post' ),
            'context' => 'normal',
            'priority' => 'high',
    
            'fields' => array(
                array(
                    'type' => 'heading',
                    'name' => esc_html__('Author Review', 'keylin'),
                    'desc' => esc_html__('This section allow you to give your review, pros, cons', 'keylin'),
                ),
    
                // Enable Review
                array(
                    'name' => esc_html__( 'Review Box','keylin'),
                    'id' => 'bk_review_checkbox',
                    'type' => 'checkbox',
                    'desc' => esc_html__( 'Enable Review On This Post','keylin'),
                    'std'  => 0,
                ),
                array(
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                    'type' => 'divider',
                ),
                array(
                    'id' => 'bk_review_box_position',
                    'name' => esc_html__( 'Review Box Position','keylin'),
                    'type' => 'select',
                    'options'  => array(
                                    'default'      => esc_html__( 'Default -- Under the post content','keylin'),
                                    'top'          => esc_html__( 'On top of the post content ','keylin'),
                                ),
                    // Select multiple values, optional. Default is false.
                    'multiple'    => false,
                    'std'         => 'default',
                    'visible'     => array( 'bk_review_checkbox', '=', 1),
                ),
                array(
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                    'type' => 'divider',
                ),
                array(
                    'name' => 'Product Image',
                    'id'   => 'bk_review_product_img',
                    'type' => 'single_image',
                    'visible'     => array( 'bk_review_checkbox', '=', 1),
                ),
                array(
                    'name' => esc_html__( 'Product name','keylin'),
                    'id'   => 'bk_review_box_title',
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 2,
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                ),
                array(
                    'name' => esc_html__( 'Description','keylin'),
                    'id'   => 'bk_review_box_sub_title',
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 2,
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                ),
                array(
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                    'type' => 'divider',
                ),
                //Review Score
                array(
                    'name' => esc_html__( 'Review Score','keylin'),
                    'id' => 'bk_review_score',
                    'class' => 'atbs-',
                    'type' => 'slider',
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                    'js_options' => array(
                        'min'   => 0,
                        'max'   => 10.05,
                        'step'  => .1,
                    ),
                ),
                array(
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                    'type' => 'divider',
                ),
                // Summary
                array(
                    'name' => esc_html__( 'Summary','keylin'),
                    'id'   => 'bk_review_summary',
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 4,
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                ),
    
                array(
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                    'type' => 'divider',
                ),
    
                //Pros & Cons
                array(
                    'name' => esc_html__( 'Pros and Cons','keylin'),
                    'id' => 'bk_pros_cons',
                    'type' => 'checkbox',
                    'desc' => esc_html__( 'Enable Pros and Cons On This Post','keylin'),
                    'std'  => 0,
                    'visible' => array( 'bk_review_checkbox', '=', 1),
                ),
                array(
                    'visible' => array( 'bk_pros_cons', '=', 1),
                    'type' => 'divider',
                ),
                array(
                    'name' => esc_html__( 'Pros Title','keylin'),
                    'id'   => 'bk_review_pros_title',
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 2,
                    'visible' => array( 'bk_pros_cons', '=', 1),
                ),
                array(
                    'name' => esc_html__( 'Pros (Advantages)','keylin'),
                    'id'   => 'bk_review_pros',
                    'type' => 'textarea',
                    'cols' => 20,
                    'clone' => true,
                    'rows' => 2,
                    'visible' => array( 'bk_pros_cons', '=', 1),
                ),
                array(
                    'visible' => array( 'bk_pros_cons', '=', 1),
                    'type' => 'divider',
                ),
                array(
                    'name' => esc_html__( 'Cons Title','keylin'),
                    'id'   => 'bk_review_cons_title',
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 2,
                    'visible' => array( 'bk_pros_cons', '=', 1),
                ),
                array(
                    'name' => esc_html__( 'Cons (Disadvantages)','keylin'),
                    'id'   => 'bk_review_cons',
                    'type' => 'textarea',
                    'cols' => 20,
                    'clone' => true,
                    'rows' => 2,
                    'visible' => array( 'bk_pros_cons', '=', 1),
                ),
            )
        );
        if ( function_exists( 'mb_term_meta_load' ) ) {
            $meta_boxes[] = array(
                'title'      => 'Advance Category Options',
                'taxonomies' => array('category'), // List of taxonomies. Array or string
    
                'fields' => array(
                    array(
                        'id' => 'bk_category_feature_area',
                        'class' => 'bk_archive_feature_area',
                        'name' => esc_html__( 'Feature Area','keylin'),
                        'type' => 'image_select',
                        'options'  => array(
                                        'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
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
                        'multiple'    => false,
                        'std'         => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Archive','keylin'),
                    ),
                    array(
                        'name' => 'Container Width',
                        'id'   => 'bk_container_width',
                        'type' => 'select',
                        'options'   => array(
                            'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                            'normal'   => esc_html__( 'Normal','keylin'),
                            'wide'          => esc_html__( 'Wide','keylin'),
                        ),
                        'std'       => 'normal',
                        'visible' => array( 'bk_category_feature_area', 'in', array('mosaic_a','mosaic_b','featured_block_e','featured_block_f','posts_block_e')),
                    ),
                    array(
                        'name' => 'Feature Area Post Option',
                        'id'   => 'bk_category_feature_area__post_option',
                        'type' => 'select',
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        'featured'          => esc_html__( 'Show Featured Posts','keylin'),
                                        'latest'            => esc_html__( 'Show Latest Posts','keylin'),
                                    ),
                        'std'       => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                    ),
                    array(
                        'name' => 'Show Feature Area only on 1st page',
                        'id'   => 'bk_feature_area__show_hide',
                        'type' => 'button_group',
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        1                   => esc_html__( 'Yes','keylin'),
                                        0                   => esc_html__( 'No','keylin'),
                                    ),
                        'std'       => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                    ),
                    // array(
                    //     'name' => 'Page Heading',
                    //     'id'   => 'bk_category_header_style',
                    //     'type' => 'select',
                    //     'visible' => array( 'bk_category_feature_area', 'in', array('mosaic_a', 'mosaic_b', 'mosaic_c','featured_block_e', 'featured_block_f', 'posts_block_b', 'posts_block_c', 'posts_block_e', 'posts_block_i')),
                    //     'options'   => array(
                    //                     'global_settings'    => esc_html__( 'From Theme Options','keylin'),
                    //                     'heading-style-1'         => esc_html__( 'Heading Style 1','keylin'),
                    //                     'heading-style-2'         => esc_html__( 'Heading Style 2','keylin'),
                    //                     'heading-style-2-center'  => esc_html__( 'Heading Style 2 Center','keylin'),
                    //                     'heading-style-3'         => esc_html__( 'Heading Style 3','keylin'),
                    //                     'heading-style-3-center'  => esc_html__( 'Heading Style 3 Center','keylin'),
                    //                     'heading-style-4'         => esc_html__( 'Heading Style 4','keylin'),
                    //                     'heading-style-5-center'  => esc_html__( 'Heading Style 5 Center','keylin'),
                    //                     'heading-style-6'         => esc_html__( 'Heading Style 6','keylin'),
                    //                     'heading-style-7'         => esc_html__( 'Heading Style 7','keylin'),
                    //                     'heading-style-8'         => esc_html__( 'Heading Style 8','keylin'),
                    //                     'heading-style-9'         => esc_html__( 'Heading Style 9','keylin'),
                    //                     'heading-style-10'        => esc_html__( 'Heading Style 10','keylin'),
                    //                     'heading-style-11'        => esc_html__( 'Heading Style 11','keylin'),
                    //                     'heading-style-12'        => esc_html__( 'Heading Style 12','keylin'),
                    //                     'heading-style-13'        => esc_html__( 'Heading Style 13','keylin'),
                    //                     'heading-style-14'        => esc_html__( 'Heading Style 14','keylin'),
                    //                     'heading-style-15'        => esc_html__( 'Heading Style 15','keylin'),
                    //                     'heading-style-16'        => esc_html__( 'Heading Style 16','keylin'),
                    //                     'heading-style-17'        => esc_html__( 'Heading Style 17','keylin'),
                    //                 ),
                    //     'std'       => 'global_settings',
                    //     'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                    // ),
                    array(
                        'name'    => esc_html__('Content Layouts','keylin'),
                        'id'      => 'bk_category_content_layout',
                        'type' => 'image_select',
                        'options'  => array(
                            // module ltp
                                        'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
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
                        'std' => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                    ),
                    array(
                        'name' => 'Pagination',
                        'id'   => 'bk_category_pagination',
                        'type' => 'select',
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        'default'           => esc_html__( 'Default Pagination','keylin'),
                                        'ajax-pagination'   => esc_html__( 'Ajax Pagination','keylin'),
                                        'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                                        'infinity' => esc_html__( 'Ajax Infinity Scrolling','keylin'),
                                    ),
                        'std'       => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                    ),
                    array(
                        'name' => '[Content Section] Exclude Posts',
                        'id'   => 'bk_category_exclude_posts',
                        'type'     => 'button_group',
                        'hidden'    => array( 'bk_category_feature_area', 'in', array('disable')),
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        1                   => esc_html__( 'Enable','keylin'),
                                        0                   => esc_html__( 'Disable','keylin'),
                                    ),
                        'std'       => 'global_settings',
                        'desc' => esc_html__('Content Section: Exclude Featured Posts that are shown on the Feature Area','keylin')
                    ),
                    array(
                        'name' => esc_html__( 'Choose a sidebar for this page','keylin'),
                        'id' => 'bk_category_sidebar_select',
                        'type' => 'select',
                        'options'  => $bk_sidebar,
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                        'std'  => 'global_settings',
                        'visible' => array( 'bk_category_content_layout', 'in', array('listing_list', 'listing_list_alt_a',
                                                                                     'listing_list_alt_b', 'listing_list_alt_b',
                                                                                     'listing_list_alt_c', 'listing_grid',
                                                                                     'listing_grid_alt_a', 'listing_grid_alt_b',
                                                                                     'listing_grid_small', 'global_settings')),
                    ),
                    array(
                        'name' => esc_html__( 'Sidebar Position -- Left/Right','keylin'),
                        'id' => 'bk_category_sidebar_position',
                        'type' => 'image_select',
                        'options'   => array(
                                'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                                'right' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                'left'  => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                        ),
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                        'std'  => 'global_settings',
                        'visible' => array( 'bk_category_content_layout', 'in', array('listing_list', 'listing_list_alt_a',
                                                                                     'listing_list_alt_b', 'listing_list_alt_b',
                                                                                     'listing_list_alt_c', 'listing_grid',
                                                                                     'listing_grid_alt_a', 'listing_grid_alt_b',
                                                                                     'listing_grid_small', 'global_settings')),
                    ),
                    array(
                        'name'      => esc_html__( 'Sticky Sidebar','keylin'),
                        'id'        => 'bk_category_sidebar_sticky',
                        'type'      => 'button_group',
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        1                   => esc_html__( 'Enable','keylin'),
                                        0                   => esc_html__( 'Disable','keylin'),
                                    ),
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                        'std'       => 'global_settings',
                        'visible' => array( 'bk_category_content_layout', 'in', array('listing_list', 'listing_list_alt_a',
                                                                                     'listing_list_alt_b', 'listing_list_alt_b',
                                                                                     'listing_list_alt_c', 'listing_grid',
                                                                                     'listing_grid_alt_a', 'listing_grid_alt_b',
                                                                                     'listing_grid_small', 'global_settings')),
                    ),
                    // array(
                    //     'name' => 'Category Color',
                    //     'id'   => 'bk_category__color',
                    //     'type' => 'color',
                    // ),
                    array(
                        'name' => 'Featured Image',
                        'id'   => 'bk_category_feat_img',
                        'type' => 'single_image',
                    ),
                ),
            );
            $meta_boxes[] = array(
                'title'      => ' ',
                'taxonomies' => array('post_tag'), // List of taxonomies. Array or string
    
                'fields' => array(
                    array(
                        'name' => 'Page Heading',
                        'id'   => 'bk_archive_header_style',
                        'type' => 'select',
                        'options'  => array(
                                    'global_settings'         => esc_html__( 'From Theme Options','keylin'),
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
                        'std'       => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Archive','keylin'),
                    ),
                    array(
                        'name'    => esc_html__('Content Layouts','keylin'),
                        'id'      => 'bk_archive_content_layout',
                        'type' => 'image_select',
                        'options'  => array(
                                        'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
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
                        'std' => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Archive','keylin'),
                    ),
                    array(
                        'name' => 'Pagination',
                        'id'   => 'bk_archive_pagination',
                        'type' => 'select',
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        'default'           => esc_html__( 'Default Pagination','keylin'),
                                        'ajax-pagination'   => esc_html__( 'Ajax Pagination','keylin'),
                                        'ajax-loadmore'     => esc_html__( 'Ajax Load More','keylin'),
                                    ),
                        'std'       => 'global_settings',
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Category','keylin'),
                    ),
                    array(
                        'name' => esc_html__( 'Choose a sidebar for this page','keylin'),
                        'id' => 'bk_archive_sidebar_select',
                        'type' => 'select',
                        'options'  => $bk_sidebar,
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Archive','keylin'),
                        'std'  => 'global_settings',
                        'visible' => array( 'bk_archive_content_layout', 'in', array('listing_list', 'listing_list_alt_a',
                                                                                     'listing_list_alt_b', 'listing_list_alt_b',
                                                                                     'listing_list_alt_c', 'listing_grid',
                                                                                     'listing_grid_alt_a', 'listing_grid_alt_b',
                                                                                     'listing_grid_small', 'global_settings')),
                    ),
                    array(
                        'name' => esc_html__( 'Sidebar Position -- Left/Right','keylin'),
                        'id' => 'bk_archive_sidebar_position',
                        'type' => 'image_select',
                        'options'   => array(
                                'global_settings'    => get_template_directory_uri().'/images/admin_panel/default.png',
                                'right' => get_template_directory_uri().'/images/admin_panel/archive/sb-right.png',
                                'left'  => get_template_directory_uri().'/images/admin_panel/archive/sb-left.png',
                        ),
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Archive','keylin'),
                        'std'  => 'global_settings',
                        'visible' => array( 'bk_archive_content_layout', 'in', array('listing_list', 'listing_list_alt_a',
                                                                                     'listing_list_alt_b', 'listing_list_alt_b',
                                                                                     'listing_list_alt_c', 'listing_grid',
                                                                                     'listing_grid_alt_a', 'listing_grid_alt_b',
                                                                                     'listing_grid_small', 'global_settings')),
                    ),
                    array(
                        'name'      => esc_html__( 'Sticky Sidebar','keylin'),
                        'id'        => 'bk_archive_sidebar_sticky',
                        'type'      => 'button_group',
                        'options'   => array(
                                        'global_settings'   => esc_html__( 'From Theme Options','keylin'),
                                        1                   => esc_html__( 'Enable','keylin'),
                                        0                   => esc_html__( 'Disable','keylin'),
                                    ),
                        'desc' => esc_html__('From Theme Options setting option is set in Theme Option -> Archive','keylin'),
                        'std'       => 'global_settings',
                        'visible' => array( 'bk_archive_content_layout', 'in', array('listing_list', 'listing_list_alt_a',
                                                                                     'listing_list_alt_b', 'listing_list_alt_b',
                                                                                     'listing_list_alt_c', 'listing_grid',
                                                                                     'listing_grid_alt_a', 'listing_grid_alt_b',
                                                                                     'listing_grid_small', 'global_settings')),
                    ),
                    array(
                        'name' => 'Featured Image',
                        'id'   => 'bk_archive_feat_img',
                        'type' => 'single_image',
                    ),
                ),
            );
        }
        return $meta_boxes;
    }
}