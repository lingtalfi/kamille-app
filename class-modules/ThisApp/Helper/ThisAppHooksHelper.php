<?php


namespace Module\ThisApp\Helper;


use Kamille\Services\XConfig;
use Logger\Formatter\TagFormatter;
use Logger\Listener\FileLoggerListener;
use Logger\LoggerInterface;

class ThisAppHooksHelper
{


    public static function Core_addLoggerListener(LoggerInterface $logger)
    {


        if (true === XConfig::get("Core.useFileLoggerListener")) {
            $f = XConfig::get("Core.logFile");
            $logger->addListener(FileLoggerListener::create()
                ->setFormatter(TagFormatter::create())
                ->setIdentifiers(null)
                ->setPath($f));
        }
    }


}