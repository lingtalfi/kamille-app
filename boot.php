<?php


/**
 * This is the boot file.
 * It setups the application environment.
 * https://s19.postimg.org/f722z5hlv/kaminos_modular_architecture.jpg
 *
 *
 */

use BumbleBee\Autoload\ButineurAutoloader;
use Kamille\Architecture\ApplicationParameters\Web\WebApplicationParameters;


//------------------------------------------------------------------------------/
// AUTOLOADER
//------------------------------------------------------------------------------/
/**
 * In this section, we create the necessary autoloaders for our application.
 * By default, I'm using the universe autoloader (bigbang).
 *
 */
require_once __DIR__ . '/planets/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/planets/BumbleBee/Autoload/ButineurAutoloader.php';
ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/class")
    ->addLocation(__DIR__ . "/class-core", "Core")
    ->addLocation(__DIR__ . "/class-controllers", "Controller")
    ->addLocation(__DIR__ . "/class-modules", "Module")
    ->addLocation(__DIR__ . "/class-themes", "Theme")
//    ->addLocation(__DIR__ . "/class-widgets", "Widget")
    ->addLocation(__DIR__ . "/planets");
ButineurAutoloader::getInst()->start();

//require_once __DIR__ . '/vendor/autoload.php';


//--------------------------------------------
// FUNCTIONS
//--------------------------------------------
require_once __DIR__ . "/functions/invisible-constants.php";
require_once __DIR__ . "/functions/main-functions.php";
//require_once __DIR__ . "/functions/mail-functions.php";


//--------------------------------------------
// PHP CONF
//--------------------------------------------
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7); // 7 days



//--------------------------------------------
// BOOTING APPLICATION PARAMETERS
//--------------------------------------------
WebApplicationParameters::boot(__DIR__);




