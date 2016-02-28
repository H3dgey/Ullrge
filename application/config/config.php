<?php
/**
 * Configuration for: ERROR REPORTING
 * Change this to 'production' to turn off error reporting, recommened to do when going live.
 */
define('ENVIRONMENT', 'development'); 

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * Configuration for: URL
 * Here we auto-detect your applications URL and the potential sub-folder. Works perfectly on most servers and in local
 * development environments (like WAMP, MAMP, etc.). Don't touch this unless you know what you do.
 *
 * URL_PUBLIC_FOLDER:
 * The folder that is visible to public, users will only have access to that folder so nobody can have a look into
 * "/application" or other folder inside your application or call any other .php file than index.php inside "/public".
 *
 * URL_PROTOCOL:
 * The protocol. Don't change unless you know exactly what you do.
 *
 * URL_DOMAIN:
 * The domain. Don't change unless you know exactly what you do.
 *
 * URL_SUB_FOLDER:
 * The sub-folder. Leave it like it is, even if you don't use a sub-folder (then this will be just "/").
 *
 * URL:
 * The final, auto-detected URL (build via the segments above). If you don't want to use auto-detection,
 * then replace this line with full URL (and sub-folder) and a trailing slash.
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Configuration for: DATABASE
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ullrge');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');

/**
 * Configuration for: SITE WIDE
 */
define('SITE_NAME', 'Site Name');

/**
 * Configuration for: FRONTPAGE ONLY
 */
define('SITE_TAGLINE', 'Welcome');

/**
 * Configuration for: EMAIL
 * Email Main is your Gmail Address, the one you use to login with. Make sure to include the @gmail.com part too. 
 * Password is your password used to log into that email account.
 * IMPORTANT: You need to configure Gmail to allow less secure apps. @see https://support.google.com/accounts/answer/6010255
 * You may want to set up a new Gmail account just for this.
 */
define('SITE_EMAIL_MAIN', 'xxx@gmail.com');
define('SITE_EMAIL_PASSWORD', 'xxx');