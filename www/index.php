<?php


use Bat\SessionTool;
use Core\Services\X;
use Kamille\Architecture\Application\Web\WebApplication;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\Registry\ApplicationRegistry;
use Module\Core\ApplicationHandler\WebApplicationHandler;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


$app = WebApplication::inst();

//SessionTool::destroyAll();
//SessionTool::start();
//az($_SESSION);

/**
 * @var $webApp WebApplicationHandler
 */
$webApp = X::get("Core_webApplicationHandler");
$webApp->handle($app);



