<?php


/**
 * This is the init file.
 * It configures the application preferences (just before the application is launched).
 *
 */


use Kamille\Architecture\Environment\Web\Environment;


$environment = Environment::getEnvironment();


//--------------------------------------------
// PHP CONF
//--------------------------------------------
date_default_timezone_set('Europe/Paris');

if ('dev' === $environment) {
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
} else {
    ini_set("display_errors", "0");
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
}


ini_set('error_log', __DIR__ . "/logs/php.log.txt");
mb_internal_encoding('UTF-8');


