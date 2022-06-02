<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'id'    => 'dedicated-header-section',
        'icon'  => 'el-icon-photo',
		'title' => esc_html__('Dedicated Header For Pages', 'keylin'),
        'customizer_width' => '500px',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Header','keylin'),
        'id'               => 'single-page-header-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'=>'bk-single-header-switch',
				'type' => 'button_set',
				'title' => esc_html__('Single Page Header Switch', 'keylin'),
				'default'   => 0,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
	                0   => esc_html__( 'Disable','keylin'),
                ),
			),
            array(
				'id'=>'bk-single-header-type',
				'title' => esc_html__('Single Header Type', 'keylin'),
				'subtitle' => esc_html__('Choose a Header Type', 'keylin'),
                'required' => array(
                    array ('bk-single-header-switch', 'equals' , array( 1 )),
                ),
                'type' => 'image_select',
                'options'  => array(
                    'site-header-1' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_1.png',
                    'site-header-2' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_2.png',
                    'site-header-3' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_3.png',
                    'site-header-4' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_4.png',
                    'site-header-5' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_6.png',
                    'site-header-6' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_7.png',
                    'site-header-7' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_8.png',
                    'site-header-8' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_9.png',
                    'site-header-9' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_10.png',
                    'site-header-10' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_11.png',
                ),
                'default' => 'site-header-1',
			),
            array(
                'id'             =>'bk-single-header-spacing',
                'type'           => 'spacing',
                'output'         => array(
                    '.single.header-1 .header-main',
                    '.single.header-2 .header-main',
                    '.single.header-3 .header-main',
                    '.single.header-6 .header-main',
                    '.single.header-7 .header-main',
                    '.single.header-8 .header-main'),
                'required' => array(
                    array ('bk-single-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8')),
                ),
                'mode'           => 'padding',
                'left'           => 'false',
                'right'          => 'false',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Header Padding', 'keylin'),
                'default'            => array(
                    'padding-top'     => '40px',
                    'padding-bottom'  => '40px',
                    'units'          => 'px',
                )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Category Page Header','keylin'),
        'id'               => 'category-page-header-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'=>'bk-category-header-switch',
				'type' => 'button_set',
				'title' => esc_html__('Category Page Header Switch', 'keylin'),
				'default'   => 0,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
	                0   => esc_html__( 'Disable','keylin'),
                ),
			),
            array(
				'id'=>'bk-category-header-type',
				'title' => esc_html__('Category Header Type', 'keylin'),
				'subtitle' => esc_html__('Choose a Header Type', 'keylin'),
                'required' => array(
                    array ('bk-category-header-switch', 'equals' , array( 1 )),
                ),
                'type' => 'image_select',
                'options'  => array(
                    'site-header-1' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_1.png',
                    'site-header-2' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_2.png',
                    'site-header-3' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_3.png',
                    'site-header-4' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_4.png',
                    'site-header-5' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_6.png',
                    'site-header-6' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_7.png',
                    'site-header-7' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_8.png',
                    'site-header-8' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_9.png',
                ),
                'default' => 'site-header-1',
			),

            array(
                'id'             =>'bk-category-header-spacing',
                'type'           => 'spacing',
                'output'         => array(
                    '.archive.category.header-1 .header-main',
                    '.archive.category.header-2 .header-main',
                    '.archive.category.header-3 .header-main',
                    '.archive.category.header-6 .header-main',
                    '.archive.category.header-7 .header-main',
                    '.archive.category.header-8 .header-main'),
                'required' => array(
                    array ('bk-category-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8')),
                ),
                'mode'           => 'padding',
                'left'           => 'false',
                'right'          => 'false',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Header Padding', 'keylin'),
                'default'            => array(
                    'padding-top'     => '40px',
                    'padding-bottom'  => '40px',
                    'units'          => 'px',
                )
            ),

        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Archive Page Header','keylin'),
        'id'               => 'archive-page-header-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'=>'bk-archive-header-switch',
				'type' => 'button_set',
				'title' => esc_html__('Archive Page Header Switch', 'keylin'),
				'default'   => 0,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
	                0   => esc_html__( 'Disable','keylin'),
                ),
			),
            array(
				'id'=>'bk-archive-header-type',
				'title' => esc_html__('Archive Header Type', 'keylin'),
				'subtitle' => esc_html__('Choose a Header Type', 'keylin'),
                'required' => array(
                    array ('bk-archive-header-switch', 'equals' , array( 1 )),
                ),
                'type' => 'image_select',
                'options'  => array(
                    'site-header-1' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_1.png',
                    'site-header-2' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_2.png',
                    'site-header-3' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_3.png',
                    'site-header-4' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_4.png',
                    'site-header-5' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_6.png',
                    'site-header-6' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_7.png',
                    'site-header-7' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_8.png',
                    'site-header-8' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_9.png',
                    'site-header-9' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_10.png',
                    'site-header-10' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_11.png',
                ),
                'default' => 'site-header-1',
			),
            array(
                'id'             =>'bk-archive-header-spacing',
                'type'           => 'spacing',
                'output'         => array(
                    '.archive.header-1 .header-main',
                    '.archive.header-2 .header-main',
                    '.archive.header-3 .header-main',
                    '.archive.header-6 .header-main',
                    '.archive.header-7 .header-main',
                    '.archive.header-8 .header-main'),
                'required' => array(
                    array ('bk-archive-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8')),
                ),
                'mode'           => 'padding',
                'left'           => 'false',
                'right'          => 'false',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Header Padding', 'keylin'),
                'default'            => array(
                    'padding-top'     => '40px',
                    'padding-bottom'  => '40px',
                    'units'          => 'px',
                )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Author Page Header','keylin'),
        'id'               => 'author-page-header-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'=>'bk-author-header-switch',
				'type' => 'button_set',
				'title' => esc_html__('Author Page Header Switch', 'keylin'),
				'default'   => 0,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
	                0   => esc_html__( 'Disable','keylin'),
                ),
			),
            array(
				'id'=>'bk-author-header-type',
				'title' => esc_html__('Author Header Type', 'keylin'),
				'subtitle' => esc_html__('Choose a Header Type', 'keylin'),
                'required' => array(
                    array ('bk-author-header-switch', 'equals' , array( 1 )),
                ),
                'type' => 'image_select',
                'options'  => array(
                    'site-header-1' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_1.png',
                    'site-header-2' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_2.png',
                    'site-header-3' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_3.png',
                    'site-header-4' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_4.png',
                    'site-header-5' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_6.png',
                    'site-header-6' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_7.png',
                    'site-header-7' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_8.png',
                    'site-header-8' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_9.png',
                    'site-header-9' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_10.png',
                    'site-header-10' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_11.png',
                ),
                'default' => 'site-header-1',
			),
            array(
                'id'             =>'bk-author-header-spacing',
                'type'           => 'spacing',
                'output'         => array(
                    '.archive.author.header-1 .header-main',
                    '.archive.author.header-2 .header-main',
                    '.archive.author.header-3 .header-main',
                    '.archive.author.header-6 .header-main',
                    '.archive.author.header-7 .header-main',
                    '.archive.author.header-8 .header-main'),
                'required' => array(
                    array ('bk-author-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8')),
                ),
                'mode'           => 'padding',
                'left'           => 'false',
                'right'          => 'false',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Header Padding', 'keylin'),
                'default'            => array(
                    'padding-top'     => '40px',
                    'padding-bottom'  => '40px',
                    'units'          => 'px',
                )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search Page Header','keylin'),
        'id'               => 'search-page-header-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'=>'bk-search-header-switch',
				'type' => 'button_set',
				'title' => esc_html__('Search Page Header Switch', 'keylin'),
				'default'   => 0,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
	                0   => esc_html__( 'Disable','keylin'),
                ),
			),
            array(
				'id'=>'bk-search-header-type',
				'title' => esc_html__('Search Header Type', 'keylin'),
				'subtitle' => esc_html__('Choose a Header Type', 'keylin'),
                'required' => array(
                    array ('bk-search-header-switch', 'equals' , array( 1 )),
                ),
                'type' => 'image_select',
                'options'  => array(
                    'site-header-1' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_1.png',
                    'site-header-2' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_2.png',
                    'site-header-3' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_3.png',
                    'site-header-4' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_4.png',
                    'site-header-5' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_6.png',
                    'site-header-6' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_7.png',
                    'site-header-7' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_8.png',
                    'site-header-8' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_9.png',
                    'site-header-9' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_10.png',
                    'site-header-10' => get_template_directory_uri().'/images/admin_panel/header/h_keylin_11.png',
                ),
                'default' => 'site-header-1',
			),
            array(
                'id'             =>'bk-search-header-spacing',
                'type'           => 'spacing',
                'output'         => array(
                    '.search.header-1 .header-main',
                    '.search.header-2 .header-main',
                    '.search.header-3 .header-main',
                    '.search.header-6 .header-main',
                    '.search.header-7 .header-main',
                    '.search.header-8 .header-main'),
                'required' => array(
                    array ('bk-search-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8')),
                ),
                'mode'           => 'padding',
                'left'           => 'false',
                'right'          => 'false',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Header Padding', 'keylin'),
                'default'            => array(
                    'padding-top'     => '40px',
                    'padding-bottom'  => '40px',
                    'units'          => 'px',
                )
            ),
        )
    ) );