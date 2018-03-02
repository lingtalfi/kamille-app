<?php


namespace Core\Services;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Services\AbstractX;
use Kamille\Utils\Morphic\FormConfigurationProvider\FormConfigurationProvider;
use Kamille\Utils\Morphic\ListConfigurationProvider\ListConfigurationProvider;
use Kamille\Utils\Morphic\ListConfigurationProvider\ShortcutListConfigurationProvider;
use Module\Ekom\Morphic\FormConfigurationProvider\EkomFormConfigurationProvider;
use Module\Ekom\Morphic\ListConfigurationProvider\EkomShortcutListConfigurationProvider;
use Module\Ekom\Utils\DataChange\EkomDataChangeDispatcher;
use Module\ThisApp\Ekom\Utils\InvoiceNumberProvider\ThisAppInvoiceNumberProvider;
use Module\ThisApp\Ekom\Utils\OrderReferenceProvider\ThisAppOrderReferenceProvider;


/**
 *
 * Service container of the application.
 * It contains the services of the application.
 *
 * Services here should be added by automates.
 * So, I recommend you create an XX class in your application code and call XX exclusively.
 * XX would extend X, and be the place where you can manually add/override services.
 *
 *
 *
 * @todo-ling: the object that hot-injects/removes the services
 * should also handle the use statements, so that we can benefit the more readable
 * syntax (not specifying the whole path for every class).
 *
 *
 * @todo-ling: notes below are deprecated? Implement XX.
 * Rules of thumb: you can add new methods, but NEVER REMOVE A METHOD
 * (because you might break a dependency that someone made to this method)
 *
 *
 * Note1: remember that this class belongs to the application,
 * so don't hesitate to use it how you like (use php constants if you want).
 * You would just throw it away and restart for a new application, no big deal.
 *
 *
 * Note2: please avoid use statements at the top of this file.
 * I have no particular arguments why, but it makes my head cleaner to
 * see a clean top of the file, thank you by advance, ling.
 *
 *
 */
class X extends AbstractX
{
    //--------------------------------------------
    // CORE
    //--------------------------------------------
    protected static function Core_DerbyCache()
    {

    }

    protected static function Core_webApplicationHandler()
    {
        return new \Module\Core\ApplicationHandler\WebApplicationHandler();
    }

    protected static function Core_lawsUtil()
    {
        $layoutProxy = \Kamille\Mvc\LayoutProxy\LawsLayoutProxy::create();
        \Core\Services\Hooks::call("Core_addLawsUtilProxyDecorators", $layoutProxy);
        $util = \Kamille\Utils\Laws\LawsUtil::create()
            ->setLawsLayoutProxy($layoutProxy);
        \Core\Services\Hooks::call("Core_configureLawsUtil", $util);
        return $util;
    }

    protected static function Core_lazyJsInit()
    {
        $collector = \Module\Core\JsLazyCodeCollector\JsLazyCodeCollector::create();
        \Core\Services\Hooks::call("Core_lazyJsInit_addCodeWrapper", $collector);
        return $collector;
    }

    protected static function Core_QuickPdoInitializer()
    {
        $initializer = new \Module\Core\Pdo\QuickPdoInitializer();
        return $initializer;
    }


    protected static function Core_OnTheFlyFormProvider()
    {
//        $provider = \OnTheFlyForm\Provider\OnTheFlyFormProvider::create();
//        \Core\Services\Hooks::call("Core_feedOnTheFlyFormProvider", $provider);
//        return $provider;
    }

    protected static function Core_PersistentRowCollectionFinder()
    {
        $initializer = new \Core\Framework\PersistentRowCollection\Finder\PersistentRowCollectionFinder();
        return $initializer;
    }


    protected static function Core_LawsViewRenderer()
    {
        $r = new \Module\Core\Utils\Laws\LawsViewRenderer();
        return $r;
    }


    protected static function Core_LinkGenerator()
    {
        /**
         * @var $routsyRouter \Kamille\Utils\Routsy\RoutsyRouter
         */
        $routsyRouter = \Core\Services\X::get("Core_RoutsyRouter");
        $routes = $routsyRouter->getRoutes();
        return \Kamille\Utils\Routsy\LinkGenerator\LinkGenerator::create()->setRoutes($routes);
    }


    protected static function Core_Localyser()
    {
//        $o = \Localys\Localyser\Localyser::create();
//        return $o;
    }

    protected static function Core_RoutsyRouter()
    {
        $routsyRouter = \Kamille\Utils\Routsy\RoutsyRouter::create();
        $routsyRouter
            ->addCollection(\Kamille\Utils\Routsy\RouteCollection\RoutsyRouteCollection::create()
                ->setFileName("routes")
                ->setOnRouteMatch(function ($routeId) {
                    \Kamille\Architecture\Registry\ApplicationRegistry::set("core.routsyRouteId", $routeId);
                })
            )
            ->addCollection(\Kamille\Utils\Routsy\RouteCollection\PrefixedRoutsyRouteCollection::create()
                ->setFileName("back")
                ->setOnRouteMatch(function ($routeId) {
                    \Kamille\Architecture\ApplicationParameters\ApplicationParameters::set("theme", \Kamille\Services\XConfig::get("Core.themeBack"));
                    \Kamille\Architecture\Registry\ApplicationRegistry::set("core.routsyRouteId", $routeId);
                })
                ->setUrlPrefix(\Kamille\Services\XConfig::get("Core.uriPrefixBackoffice"))
            );
        \Core\Services\Hooks::call("Core_configureRoutsyRouter", $routsyRouter);
        return $routsyRouter;
    }



//    protected static function Core_TabathaCache()
//    {
//        if (true === \Kamille\Architecture\ApplicationParameters\ApplicationParameters::get("debug")) {
//            $r = new \Module\Core\Planets\TabathaCache\DebugTabathaCache();
//        } else {
//            $r = new \TabathaCache\Cache\TabathaCache();
//        }
//
//        $r->setDefaultForceGenerate((false === \Kamille\Services\XConfig::get("Core.enableTabathaCache")));
//
//        $r->setDir(\Kamille\Architecture\ApplicationParameters\ApplicationParameters::get("app_dir") . "/cache/tabatha");
//        return $r;
//    }

    protected static function Core_umail()
    {
        return \Kamille\Utils\Umail\KamilleUmail::create();
    }

    protected static function Core_ListModifierCircle()
    {
//        $c = new \ListModifier\Circle\ListModifierCircle();
//        Hooks::call("Core_feedListModifierCircle", $c);
//        return $c;
    }


    protected static function Core_MorphicListConfigurationProvider()
    {

    }


    protected static function Core_MorphicFormConfigurationProvider()
    {

    }


}