<?php
/**
 * Load the TGM Plugin Activator class to notify the user
 * to install the Envato WordPress Toolkit Plugin
 */
require_once( get_template_directory() . '/inc/class-tgm-plugin-activation.php' );
function atbs_tgmpa_register_toolkit() {
    // Specify the Envato Toolkit plugin
    $plugins = array(
        array(
            'name' => esc_html__('BKNinja Composer', 'keylin'),
            'slug' => esc_html__('bkninja-composer', 'keylin'),
            'img' => get_template_directory_uri() . '/images/plugins/bkninja-composer.jpg',
            'source' => get_template_directory() . '/plugins/bkninja-composer.zip',
            'required' => true,
            'version' => '3.1',
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Meta Box', 'keylin'),
            'slug' => 'meta-box',
            'img' => get_template_directory_uri() . '/images/plugins/meta-box.jpg',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Keylin Extension', 'keylin'),
            'slug' => esc_html__('keylin-extension', 'keylin'),
            'img' => get_template_directory_uri() . '/images/plugins/keylin-extension.jpg',
            'source' => get_template_directory() . '/plugins/keylin-extension.zip',
            'required' => true,
            'version' => '1.0',
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Login With Ajax', 'keylin'),
            'slug' => 'login-with-ajax',
            'img' => get_template_directory_uri() . '/images/plugins/login-with-ajax.jpg',
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('MailChimp for WordPress', 'keylin'),
            'slug' => 'mailchimp-for-wp',
            'img' => get_template_directory_uri() . '/images/plugins/mailchimp.jpg',
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'keylin'),
            'slug' => 'contact-form-7',
            'title' => esc_html__('Contact Form 7 - Optional', 'keylin'),
            'img' => get_template_directory_uri() . '/images/plugins/contact-form-7.jpg',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
        array(
            'name' => esc_html__('Keylin Admin Panel', 'keylin'),
            'slug' => 'keylin-admin-panel',
            'title' => esc_html__('Keylin Admin Panel - Optional', 'keylin'),
            'source' => get_template_directory() . '/plugins/keylin-admin-panel.zip',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
    );

    // Configuration of TGM
    $config = array(
        'domain'           => 'keylin',
        'default_path'     => '',
        'menu'             => 'install-required-plugins',
        'has_notices'      => true,
        'is_automatic'     => true,
        'message'          => '',
        'strings'          => array(
            'page_title'                      => esc_html__( 'Install Required Plugins','keylin'),
            'menu_title'                      => esc_html__( 'Install Plugins','keylin'),
            'installing'                      => esc_html__( 'Installing Plugin: %s','keylin'),
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.','keylin'),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','keylin'),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','keylin'),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','keylin'),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','keylin'),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','keylin'),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','keylin'),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','keylin'),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','keylin'),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','keylin'),
            'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins','keylin'),
            'return'                          => esc_html__( 'Return to Required Plugins Installer','keylin'),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.','keylin'),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s','keylin'),
            'nag_type'                        => 'updated'
        )
    );
    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'atbs_tgmpa_register_toolkit' );