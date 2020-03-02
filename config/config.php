<?
// Database const
const DB_DRIVER = 'mysql';
const DB_HOST = 'localhost';
const DB_NAME = 'tea_shop';
const DB_USER = 'root';
const DB_PASS = '';

const SALT = 'bfeifheidsl7';

$config['site_title'] = '5 O\'Clock Tea Shop'; 

// Paths
$config['path_root'] = dirname(__DIR__, 1);
$config['path_public'] = $config['path_root'].'/public';
$config['path_admin'] = $config['path_root'].'/admin';
$config['path_templates'] = $config['path_root'].'/templates';
$config['path_models'] = $config['path_root'].'/models';
$config['path_controllers'] = $config['path_root'].'/controllers';
$config['path_lib'] = $config['path_root'].'/lib';
$config['path_posts'] = $config['path_root'].'/files';
$config['path_logs'] = $config['path_root'].'/logs';





date_default_timezone_set('Europe/Moscow');