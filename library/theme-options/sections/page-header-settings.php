<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'id'    => 'header-settings-section',
        'icon' => 'el-icon-photo',
        'title' => esc_html__('Header Settings', 'keylin'),
        'customizer_width' => '500px',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Styles','keylin'),
        'id'               => 'header-style-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-header-type',
                'title' => esc_html__('Default Header Type', 'keylin'),
                'subtitle' => esc_html__('Choose a Header Type', 'keylin'),
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
                'id'=>'bk-header-bg-style',
                'type' => 'select',
                'title' => esc_html__('Header Background Style', 'keylin'),
                'default'   => 'default',
                'required' => array(
                    array('bk-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-4', 'site-header-5', 'site-header-6', 'site-header-7', 'site-header-8', 'site-header-9', 'site-header-10')),
                ),
                'options'   => array(
                    'default'    => esc_html__( 'Default Background','keylin'),
                    'image'      => esc_html__( 'Background Image','keylin'),
                    'gradient'   => esc_html__( 'Background Gradient','keylin'),
                    'color'      => esc_html__( 'Background Color','keylin'),
                ),
            ),
            array(
                'id'=>'bk-header-bg-image',
                'required' => array(
                    array ('bk-header-bg-style', 'equals' , array( 'image' )),
                ),
                'type' => 'background',
                'output' => array('.site-header .background-img'),
                'title' => esc_html__('Header Background Image', 'keylin'),
                'subtitle' => esc_html__('Choose background image for the site header', 'keylin'),
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'preview_media' => false,
                'transparent' => false,
                'background-color' => false,
                'default'  => array(
                    'background-color' => '#fff',
                ),
            ),
            array(
                'id'=>'bk-header-bg-gradient',
                'required' => array(
                    array ('bk-header-bg-style', 'equals' , array( 'gradient' )),
                ),
                'type' => 'color_gradient',
                'title'    => esc_html__('Header Background Gradient', 'keylin'),
                'validate' => 'color',
                'transparent' => false,
                'default'  => array(
                    'from' => '#1e73be',
                    'to'   => '#00897e',
                ),
            ),
            array(
                'id'=>'bk-header-bg-gradient-direction',
                'required' => array(
                    array ('bk-header-bg-style', 'equals' , array( 'gradient' )),
                ),
                'type' => 'text',
                'title'    => esc_html__('Gradient Direction(Degree Number)', 'keylin'),
                'validate' => 'numeric',
            ),
            array(
                'id'=>'bk-header-bg-color',
                'required' => array(
                    array ('bk-header-bg-style', 'equals' , array( 'color' )),
                ),
                'type' => 'background',
                'title' => esc_html__('Header Background Color', 'keylin'),
                'subtitle' => esc_html__('Choose background color for the site header', 'keylin'),
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'preview_media' => false,
                'background-image' => false,
                'transparent' => false,
                'default'  => array(
                    'background-color' => '#fff',
                ),
            ),
            array(
                'id'             =>'bk-header-spacing',
                'type'           => 'spacing',
                'output'         => array('.header-1 .header-main', '.header-2 .header-main', '.header-3 .header-main', '.header-6 .header-main', '.header-7 .header-main', '.header-8 .header-main'),
                'required' => array(
                    array ('bk-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8')),
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
            array(
                'id'=>'bk-main-menu-bg-color',
                'required' => array(
                    array('bk-header-type', 'equals' , array( 'site-header-1', 'site-header-2','site-header-6','site-header-7', 'site-header-8')),
                ),
                'type' => 'background',
                'output' => array('.site-header .navigation-custom-bg-color, .site-header .navigation-bar .navigation-custom-bg-color, .site-header .navigation-bar .navigation-custom-bg-color__inner'),
                'title' => esc_html__('Main Menu Background Color', 'keylin'),
                'subtitle' => esc_html__('Choose background color for the site header', 'keylin'),
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'preview_media' => false,
                'background-image' => false,
                'transparent' => false,
                'default'  => array(
                    'background-color' => '#fff',
                ),
            ),
            array(
                'id'=>'bk-header-inverse',
                'type' => 'button_set',
                'title' => esc_html__('Main Menu Bar Text', 'keylin'),
                'required'  => array(
                    'bk-header-type','equals',array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-4', 'site-header-5', 'site-header-6',  'site-header-7', 'site-header-8', 'site-header-9', 'site-header-10' )
                ),
                'default'   => 0,
                'options'   => array(
                        0   => esc_html__( 'Black','keylin'),
                        1   => esc_html__( 'White','keylin'),
                ),
            ),
            array(
                'id'=>'bk-header-element-inverse',
                'type' => 'button_set',
                'required' => array(
                    array ('bk-header-type', 'equals' , array( 'site-header-1', 'site-header-2', 'site-header-7', 'site-header-8' )),
                ),
                'title' => esc_html__('Header Text', 'keylin'),
                'default'   => 0,
                'options'   => array(
                        0   => esc_html__( 'Black','keylin'),
                        1   => esc_html__( 'White','keylin'),
                ),
            ),
            array(
                'id'=>'bk-top-bar-header',
                'type' => 'button_set',
                'title' => esc_html__('Top Bar Header', 'keylin'),
                'default'   => 1,
                'options'   => array(
                    0   => esc_html__( 'Disable','keylin'),
                    1   => esc_html__( 'Enable','keylin'),
                ),
            ),
            array(
                'id'=>'bk-top-bar-header-inverse',
                'type' => 'button_set',
                'required' => array(
                    array ('bk-top-bar-header', 'equals' , array(1)),
                ),
                'title' => esc_html__('Top Bar Text', 'keylin'),
                'default'   => 1,
                'options'   => array(
                    0   => esc_html__( 'Black','keylin'),
                    1   => esc_html__( 'White','keylin'),
                ),
            ),
            array(
                'id'=>'bk-top-bar-bg-color',
                'type' => 'background',
                'required' => array(
                    array ('bk-top-bar-header', 'equals' , array(1)),
                ),
                'output' => array('.site-header .top-bar'),
                'title' => esc_html__('Top Bar Background Color', 'keylin'),
                'subtitle' => esc_html__('Choose background color for the site header', 'keylin'),
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'preview_media' => false,
                'background-image' => false,
                'transparent' => false,
                'default'  => array(
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Site Logo','keylin'),
        'id'               => 'site-logo-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-logo',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Site Logo', 'keylin'),
                'subtitle' => esc_html__('Upload logo of your site that is displayed in header', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-logo-dark-mode',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Site Logo Dark Mode', 'keylin'),
                'subtitle' => esc_html__('Upload logo dark mode of your site that is displayed in header', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-site-logo-size-option',
                'type' => 'select',
                'required'  => array (
                    'bk-header-type','equals',array( 'site-header-1', 'site-header-2', 'site-header-3', 'site-header-6', 'site-header-7', 'site-header-8' )
                ),
                'title' => esc_html__('Site Logo Size Option ', 'keylin'),
                'subtitle' => esc_html__('Select between Original Logo Image Size or Customize the Logo Size', 'keylin'),
                'default' => 'original',
                'options'   => array(
                    'original'      => esc_html__( 'Original Logo Image Size','keylin'),
                    'customize'     => esc_html__( 'Customize the Logo Size','keylin'),
                ),
            ),
            array(
                'id' => 'site-logo-width',
                'type' => 'slider',
                'required' => array(
                    'bk-site-logo-size-option', 'equals' , array( 'customize' )
                ),
                'title' => esc_html__('Site Logo Width (px)', 'keylin'),
                'default' => 300,
                'min' => 0,
                'step' => 1,
                'max' => 1000,
                'display_value' => 'text'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mobile Header','keylin'),
        'id'               => 'mobile-header-settings-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-mobile-logo',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Mobile Logo', 'keylin'),
                'subtitle' => esc_html__('Upload logo of your site that is displayed in mobile header', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-mobile-logo-dark-mode',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Mobile Logo Dark Mode', 'keylin'),
                'subtitle' => esc_html__('Upload logo dark mode of your site that is displayed in mobile header', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-mobile-menu-bg-style',
                'type' => 'select',
                'title' => esc_html__('Mobile Menu Background Style', 'keylin'),
                'default'   => 'default',
                'options'   => array(
                    'default'    => esc_html__( 'Default Background','keylin'),
                    'gradient'   => esc_html__( 'Background Gradient','keylin'),
                    'color'      => esc_html__( 'Background Color','keylin'),
                ),
            ),
            array(
                'id'=>'bk-mobile-menu-bg-gradient',
                'required' => array(
                    array ('bk-mobile-menu-bg-style', 'equals' , array( 'gradient' )),
                ),
                'type' => 'color_gradient',
                'title'    => esc_html__('Background Gradient', 'keylin'),
                'validate' => 'color',
                'transparent' => false,
                'default'  => array(
                    'from' => '#1e73be',
                    'to'   => '#00897e',
                ),
            ),
            array(
                'id'=>'bk-mobile-menu-bg-gradient-direction',
                'required' => array(
                    array ('bk-mobile-menu-bg-style', 'equals' , array( 'gradient' )),
                ),
                'type' => 'text',
                'title'    => esc_html__('Gradient Direction(Degree Number)', 'keylin'),
                'validate' => 'numeric',
            ),
            array(
                'id'=>'bk-mobile-menu-bg-color',
                'required' => array(
                    array ('bk-mobile-menu-bg-style', 'equals' , array( 'color' )),
                ),
                'type' => 'background',
                'title' => esc_html__('Background Color', 'keylin'),
                'subtitle' => esc_html__('Choose background color for the mobile menu', 'keylin'),
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'preview_media' => false,
                'background-image' => false,
                'transparent' => false,
                'default'  => array(
                    'background-color' => '#fff',
                ),
            ),
            array(
                'id'=>'bk-mobile-menu-inverse',
                'type' => 'button_set',
                'title' => esc_html__('Mobile Menu Text', 'keylin'),
                'default'   => 0,
                'options'   => array(
                        0   => esc_html__( 'Black','keylin'),
                        1   => esc_html__( 'White','keylin'),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sticky Header','keylin'),
        'id'               => 'sticky-header-settings-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-sticky-menu-switch',
                'type' => 'button_set',
                'title' => esc_html__('Sticky Menu', 'keylin'),
                'subtitle' => esc_html__('Enable / Disable Sticky Menu Function', 'keylin'),
                'default'   => 1,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
            ),
            array(
                'id'=>'bk-sticky-header-logo',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Sticky Header Logo', 'keylin'),
                'subtitle' => esc_html__('Upload logo of your site that is displayed in sticky headeer', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-sticky-header-logo-dark-mode',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Sticky Header Logo Dark Mode', 'keylin'),
                'subtitle' => esc_html__('Upload logo dark mode of your site that is displayed in sticky headeer', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-sticky-menu-bg-style',
                'required' => array(
                    'bk-sticky-menu-switch','equals', 1
                ),
                'type' => 'select',
                'title' => esc_html__('Sticky Menu Background Style', 'keylin'),
                'default'   => 'default',
                'options'   => array(
                    'default'    => esc_html__( 'Default Background','keylin'),
                    'gradient'   => esc_html__( 'Background Gradient','keylin'),
                    'color'      => esc_html__( 'Background Color','keylin'),
                ),
            ),
            array(
                'id'=>'bk-sticky-menu-bg-gradient',
                'required' => array(
                    array ('bk-sticky-menu-switch','equals', 1),
                    array ('bk-sticky-menu-bg-style', 'equals' , array( 'gradient' )),
                ),
                'type' => 'color_gradient',
                'title'    => esc_html__('Background Gradient', 'keylin'),
                'validate' => 'color',
                'transparent' => false,
                'default'  => array(
                    'from' => '#1e73be',
                    'to'   => '#00897e',
                ),
            ),
            array(
                'id'=>'bk-sticky-menu-bg-gradient-direction',
                'required' => array(
                    array ('bk-sticky-menu-switch','equals', 1),
                    array ('bk-sticky-menu-bg-style', 'equals' , array( 'gradient' )),
                ),
                'type' => 'text',
                'title'    => esc_html__('Gradient Direction(Degree Number)', 'keylin'),
                'validate' => 'numeric',
            ),
            array(
                'id'=>'bk-sticky-menu-bg-color',
                'required' => array(
                    array ('bk-sticky-menu-switch','equals', 1),
                    array ('bk-sticky-menu-bg-style', 'equals' , array( 'color' )),
                ),
                'type' => 'background',
                'title' => esc_html__('Background Color', 'keylin'),
                'subtitle' => esc_html__('Choose background color for the sticky menu', 'keylin'),
                'background-position' => false,
                'background-repeat' => false,
                'background-size' => false,
                'background-attachment' => false,
                'preview_media' => false,
                'background-image' => false,
                'transparent' => false,
                'default'  => array(
                    'background-color' => '#fff',
                ),
            ),
            array(
                'id'=>'bk-sticky-menu-inverse',
                'type' => 'button_set',
                'title' => esc_html__('Sticky Menu Text', 'keylin'),
                'default'   => 0,
                'options'   => array(
                        0   => esc_html__( 'Black','keylin'),
                        1   => esc_html__( 'White','keylin'),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Off-Canvas Desktop Panel','keylin'),
        'id'               => 'off-canvas-desktop-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-offcanvas-desktop-switch',
                'type' => 'button_set',
                'title' => esc_html__('Off-Canvas Switch ', 'keylin'),
                'subtitle' => esc_html__('Enable/Disable the Offcanvas Menu', 'keylin'),
                'default' => 1,
                'options'   => array(
                    1   => esc_html__( 'Enable','keylin'),
                    0   => esc_html__( 'Disable','keylin'),
                ),
            ),
            array(
                'id'=>'bk-offcanvas-desktop-menu',
                'required' => array('bk-offcanvas-desktop-switch','=',1),
                'type' => 'select',
                'data' => 'menu_location',
                'title' => esc_html__('Select a Menu', 'keylin'),
                'default' => 'offcanvas-menu',
            ),
            array(
                'id'=>'bk-offcanvas-desktop-logo',
                'required' => array('bk-offcanvas-desktop-switch','=',1),
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Off-Canvas Logo', 'keylin'),
                'subtitle' => esc_html__('Upload logo of your site that is displayed in Off-Canvas Menu', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-offcanvas-desktop-logo-dark-mode',
                'required' => array('bk-offcanvas-desktop-switch','=',1),
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Off-Canvas Logo Dark Mode', 'keylin'),
                'subtitle' => esc_html__('Upload logo dark mode of your site that is displayed in Off-Canvas Menu', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'       =>'bk-offcanvas-desktop-social',
                'type'     => 'select',
                'required' => array('bk-offcanvas-desktop-switch','=',1),
                'multi'    => true,
                'title' => esc_html__('Off-Canvas Social Media', 'keylin'),
                'subtitle' => esc_html__('Set up social items for site', 'keylin'),
                'options'  => array('fb'=>'Facebook', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin',
                                   'pinterest'=>'Pinterest', 'instagram'=>'Instagram', 'dribbble'=>'Dribbble',
                                   'youtube'=>'Youtube', 'vimeo'=>'Vimeo', 'vk'=>'VK', 'vine'=>'Vine',
                                   'snapchat'=>'SnapChat', 'telegram'=>'Telegram', 'rss'=>'RSS'),
                'default' => array('fb'=>'', 'twitter'=>'', 'linkedin'=>'', 'pinterest'=>'', 'instagram'=>'', 'dribbble'=>'',
                                    'youtube'=>'', 'vimeo'=>'', 'vk'=>'', 'vine'=>'', 'snapchat'=>'', 'telegram'=>'', 'rss'=>'')
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Off-Canvas Mobile Panel','keylin'),
        'id'               => 'off-canvas-mobile-panel-section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-offcanvas-mobile-menu',
                'type' => 'select',
                'data' => 'menu_location',
                'title' => esc_html__('Select a Menu', 'keylin'),
                'default' => 'main-menu',
            ),
            array(
                'id'=>'bk-offcanvas-mobile-logo',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Off-Canvas Logo', 'keylin'),
                'subtitle' => esc_html__('Upload logo of your site that is displayed in Off-Canvas Menu', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'=>'bk-offcanvas-mobile-logo-dark-mode',
                'type' => 'media',
                'url'=> true,
                'title' => esc_html__('Off-Canvas Logo Dark Mode', 'keylin'),
                'subtitle' => esc_html__('Upload logo dark mode of your site that is displayed in Off-Canvas Menu', 'keylin'),
                'placeholder' => esc_attr__('No media selected','keylin')
            ),
            array(
                'id'       =>'bk-offcanvas-mobile-social',
                'type'     => 'select',
                'multi'    => true,
                'title' => esc_html__('Off-Canvas Social Media', 'keylin'),
                'subtitle' => esc_html__('Set up social links for site', 'keylin'),
                'options'  => array('fb'=>'Facebook', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin',
                                   'pinterest'=>'Pinterest', 'instagram'=>'Instagram', 'dribbble'=>'Dribbble',
                                   'youtube'=>'Youtube', 'vimeo'=>'Vimeo', 'vk'=>'VK', 'vine'=>'Vine',
                                   'snapchat'=>'SnapChat', 'telegram'=>'Telegram', 'rss'=>'RSS'),
                'default' => array('fb'=>'', 'twitter'=>'', 'linkedin'=>'', 'pinterest'=>'', 'instagram'=>'', 'dribbble'=>'',
                                    'youtube'=>'', 'vimeo'=>'', 'vk'=>'', 'vine'=>'', 'snapchat'=>'', 'telegram'=>'', 'rss'=>'')
            ),
            array(
                'id'=>'bk-offcanvas-mobile-subscribe-switch',
                'type' => 'switch',
                'title' => esc_html__('Off-Canvas Menu Subscribe Switch', 'keylin'),
                'subtitle'=> esc_html__('On/Off Social Media', 'keylin'),
                'default' => 0
            ),
            array(
                'id'=>'bk-offcanvas-mobile-mailchimp-shortcode',
                'required' => array(
                    array('bk-offcanvas-mobile-subscribe-switch','equals',1),
                ),
                'type' => 'text',
                'title' => esc_html__('Mailchimp Shortcode', 'keylin'),
                'subtitle' => esc_html__('Insert the Mailchimp Shortcode here', 'keylin'),
                'default' => '',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Header and Ads','keylin'),
        'id'               => 'social-header-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       =>'bk-social-header',
                'type'     => 'select',
                'multi'    => true,
                'title' => esc_html__('Social Media', 'keylin'),
                'subtitle' => esc_html__('Select social items for the website', 'keylin'),
                'options'  => array('fb'=>'Facebook', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin',
                                   'pinterest'=>'Pinterest', 'instagram'=>'Instagram', 'dribbble'=>'Dribbble',
                                   'youtube'=>'Youtube', 'vimeo'=>'Vimeo', 'vk'=>'VK', 'vine'=>'Vine',
                                   'snapchat'=>'SnapChat', 'telegram'=>'Telegram', 'rss'=>'RSS'),
                'default' => array('fb'=>'', 'twitter'=>'', 'linkedin'=>'', 'pinterest'=>'', 'instagram'=>'', 'dribbble'=>'',
                                    'youtube'=>'', 'vimeo'=>'', 'vk'=>'', 'vine'=>'', 'snapchat'=>'', 'telegram'=>'', 'rss'=>'')
            ),
            array(
                'id' => 'section-ads-header-start',
                'title' => esc_html__('Show Ads on this header instead of the Social Items', 'keylin'),
                'type' => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
                'required'  => array (
                    'bk-header-type','equals',array( 'site-header-3', 'site-header-7', 'site-header-8' )
                ),
            ),
            array(
                'id'=>'bk-header-ads',
                'type' => 'switch',
                'title' => esc_html__('Header Ads', 'keylin'),
                'default' => 0
            ),

            array(
                'id'=>'bk-ads-html',
                'required' => array('bk-header-ads','=',1),
                'type' => 'textarea',
                'title' => esc_html__('HTML Ads Code', 'keylin'),
                'subtitle' => esc_html__('Insert the HTML Ads Code here', 'keylin'),
                'default' => '',
            ),
            array(
                'id' => 'section-ads-header-end',
                'type' => 'section',
                'indent' => false // Indent all options below until the next 'section' option is set.
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Mailchimp Form','keylin'),
        'id'               => 'header-mailchimp-form-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'bk-header-subscribe-switch',
                'type' => 'switch',
                'title' => esc_html__('Header Subscribe Switch', 'keylin'),
                'subtitle'=> esc_html__('On/Off Header Subscribe', 'keylin'),
                'default' => 0
            ),
            array(
                'id'=>'bk-mailchimp-title',
                'required' => array('bk-header-subscribe-switch','=',1),
                'type' => 'text',
                'title' => esc_html__('Mailchimp Form Title', 'keylin'),
                'default' => '',
            ),
            array(
                'id'=>'bk-mailchimp-shortcode',
                'required' => array('bk-header-subscribe-switch','=',1),
                'type' => 'text',
                'title' => esc_html__('Mailchimp Shortcode', 'keylin'),
                'subtitle' => esc_html__('Insert the Mailchimp Shortcode here', 'keylin'),
                'default' => '',
            ),
        )
    ) );