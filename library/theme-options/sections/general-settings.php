<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'icon' => 'el el-home',
		'title' => esc_html__('General Setting', 'keylin'),
		'fields' => array(
            array(
				'id'=>'bk-primary-color',
				'type' => 'color',
				'title' => esc_html__('Primary color', 'keylin'),
				'subtitle' => esc_html__('Pick a primary color for the theme.', 'keylin'),
                'transparent' => false,
				'validate' => 'color',
				'default' => '#6c92a2',
			),
            array(
                'id'          => 'html-font-size',
                'type'        => 'typography',
                'title'       => esc_html__( 'HTML Font Size','keylin'),
                'desc'        => esc_html__( 'This will change the font size of overal element in the theme','keylin'),
                'google'      => true,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                'font-family'   => false,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-weight'    => false,
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => true,
                'line-height'   => false,
                'text-align'    => false,
                //'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> false,  // Defaults to false
                'color'         => false,
                'preview'       => false, // Disable the previewer
                'all_styles'  => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => 'html',
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Default is 14px.','keylin'),
                'default'     => array(
                    'font-size'     => '14px',
                ),
            ),
            array(
                'id'        => 'bk_enable_darkmode',  
                'type'      => 'button_set',
                'multi'     => false,
                'title'     => esc_html__('Light/Dark Mode Options', 'keylin'),
                'options'   => array(
                    1    => esc_html__( 'Enable', 'keylin' ),
                    0   => esc_html__( 'Disable', 'keylin' ),
                ),
                'default' => 0,
            ),
            array(
                'id'        => 'bk_darkmode_sw',  
                'type'      => 'button_set',
                'required'  => array( 'bk_enable_darkmode', 'equals', 1),
                'multi'     => false,
                'title'     => esc_html__('Light/Dark Mode Switch', 'keylin'),
                'subtitle'  => esc_html__('Enable Light/Dark Mode Switch on your Site', 'keylin'),
                'options'   => array(
                    1    => esc_html__( 'Enable', 'keylin' ),
                    0   => esc_html__( 'Disable', 'keylin' ),
                ),
                'default' => 1,
            ),
            array(
                'id'        => 'bk_default_darkmode',  
                'type'      => 'button_set',
                'required'  => array( 'bk_enable_darkmode', 'equals', 1),
                'multi'     => false,
                'title'     => esc_html__('Set Dark Mode By Default', 'keylin'),
                'subtitle'  => esc_html__('Enable Dark Mode by default on your Site', 'keylin'),
                'options'   => array(
                    1    => esc_html__( 'Dark Mode', 'keylin' ),
                    0   => esc_html__( 'Light Mode', 'keylin' ),
                ),
                'default' => 0,
            ),
		)
    ) );