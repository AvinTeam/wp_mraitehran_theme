<?php
date_default_timezone_set('Asia/Tehran');

(defined('ABSPATH')) || exit;
define('MRTAI_VERSION', '1.0.9');

define('MRTAI_PATH', get_template_directory() . "/");
define('MRTAI_INCLUDES', MRTAI_PATH . 'includes/');
define('MRTAI_CLASS', MRTAI_PATH . 'classes/');
define('MRTAI_CORE', MRTAI_PATH . 'core/');
define('MRTAI_FUNCTION', MRTAI_PATH . 'functions/');
define('MRTAI_VIEWS', MRTAI_PATH . 'views/');

define('MRTAI_URL', get_template_directory_uri() . "/");
define('MRTAI_ASSETS', MRTAI_URL . 'assets/');
define('MRTAI_CSS', MRTAI_ASSETS . 'css/');
define('MRTAI_JS', MRTAI_ASSETS . 'js/');
define('MRTAI_IMAGE', MRTAI_ASSETS . 'image/');
define('MRTAI_VENDOR', MRTAI_ASSETS . 'vendor/');

require_once MRTAI_INCLUDES . '/theme_filter.php';
require_once MRTAI_CORE . '/accesses.php';
require_once MRTAI_INCLUDES . '/init.php';
require_once MRTAI_INCLUDES . '/theme-function.php';
require_once MRTAI_INCLUDES . '/styles.php';
require_once MRTAI_INCLUDES . '/ajax.php';

$mrtai_option = mrtai_start_working();

if (is_admin()) {
    require_once MRTAI_INCLUDES . '/menu.php';


}

