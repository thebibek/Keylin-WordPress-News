<?php
define('ATBS_NAME','keylin');

define('ATBS_TEMPLATE_URL', get_template_directory_uri());
define('ATBS_LIBS', get_template_directory().'/library/');
define('ATBS_LIBS_ADMIN', ATBS_LIBS.'admin_panel/');

define('ATBS_FRAMEWORK', get_template_directory().'/framework/');

define('ATBS_INC', get_template_directory().'/inc/');
define('ATBS_INC_LIBS', ATBS_INC.'libs/');
define('ATBS_BLOCKS', ATBS_INC.'blocks/');
define('ATBS_MODULES', ATBS_INC.'/modules/');

define ('ATBS_TEMPLATES', ATBS_LIBS.'templates/');
define ('ATBS_AJAX', ATBS_LIBS.'/ajax/');
define ('ATBS_HEADER_TEMPLATES', ATBS_TEMPLATES.'header/');
define ('ATBS_FOOTER_TEMPLATES', ATBS_TEMPLATES.'footer/');
define ('ATBS_SINGLE_TEMPLATES', ATBS_TEMPLATES.'single/');

define ('ATBS_THEMEOPTONS', ATBS_LIBS.'theme-options/');
define ('ATBS_THEMEOPTONS_SECTIONS', ATBS_LIBS.'theme-options/sections/');

/**
 * Enqueue Style and Script Files Init Theme
 */
require_once (ATBS_INC.'bk_enqueue_scripts.php');
require_once (ATBS_INC.'bk_theme_settings.php');
require_once (ATBS_LIBS.'mega_menu.php');

/**
 * Add php library file.
 */
require_once (ATBS_LIBS.'core.php');
require_once (ATBS_LIBS.'mega_menu.php');
require_once (ATBS_LIBS.'custom_css.php');
require_once (ATBS_LIBS.'translation.php');
require_once (ATBS_INC.'bk_inc_files.php');