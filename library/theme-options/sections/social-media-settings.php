<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    Redux::setSection( $opt_name, array(
        'id'    => 'social-media-settings-section',
        'icon'  => 'el-icon-share',
		'title' => esc_html__('Social Media Settings', 'keylin'),
        'customizer_width' => '500px',
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Media Links','keylin'),
        'id'               => 'social-media-link-subsection',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
				'id'=>'bk-social-media-links',
				'type' => 'text',
				'title' => esc_html__('Social media', 'keylin'),
				'subtitle' => esc_html__('Set up social links for the website', 'keylin'),
				'options' => array('fb'=>'Facebook Url', 'twitter'=>'Twitter Url', 'linkedin'=>'Linkedin Url',
                                   'pinterest'=>'Pinterest Url', 'instagram'=>'Instagram Url', 'dribbble'=>'Dribbble Url',
                                   'youtube'=>'Youtube Url', 'vimeo'=>'Vimeo Url', 'vk'=>'VK Url', 'vine'=>'Vine URL',
                                   'snapchat'=>'SnapChat Url', 'telegram'=>'Telegram Url', 'rss'=>'RSS Url'),
				'default' => array('fb'=>'', 'twitter'=>'', 'linkedin'=>'', 'pinterest'=>'', 'instagram'=>'', 'dribbble'=>'',
                                    'youtube'=>'', 'vimeo'=>'', 'vk'=>'', 'vine'=>'', 'snapchat'=>'', 'telegram'=>'', 'rss'=>'')
			),
        )
    ) );