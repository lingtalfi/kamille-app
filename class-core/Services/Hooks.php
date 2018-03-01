<?php


namespace Core\Services;

use Dispatcher\Basic\BasicDispatcherInterface;
use Ecp\Exception\EcpInvalidArgumentException;
use Kamille\Services\AbstractHooks;
use Models\AdminSidebarMenu\Lee\LeeAdminSidebarMenuModel;
use Module\Core\Helper\CoreHooksHelper;
use Module\Ekom\Back\Helper\BackHooksHelper;
use Module\Ekom\Carrier\Collection\CarrierCollectionInterface;
use Module\Ekom\PaymentMethodHandler\Collection\PaymentMethodHandlerCollectionInterface;
use Module\Ekom\Session\EkomSession;
use Module\Ekom\Utils\Checkout\CheckoutPageUtil;
use Module\Ekom\Utils\CheckoutProcess\CheckoutProcessInterface;
use Module\Ekom\Utils\Pdf\PdfHtmlInfoInterface;
use Module\EkomCartTracker\Helper\EkomCartTrackerHooksHelper;
use Module\NullosAdmin\Architecture\Router\BackOfficeAuthenticationRouter;
use Module\ThisApp\Ekom\Helper\HooksHelper;
use Module\ThisApp\Helper\ThisAppHooksHelper;
use Module\ThisApp\ThisAppConfig;


/**
 *
 * @todo-ling:
 * handle/allow the use of use statements within this class (too verbose otherwise, boring...)
 *
 * This class is used to hook modules dynamically.
 * This class is written by modules, so, be careful I guess.
 *
 * A hook is always a public static method (in this class)
 *
 *
 * Rules of thumb: you can add new methods, but NEVER REMOVE A METHOD
 * (because you might break a dependency that someone made to this method)
 */
class Hooks extends AbstractHooks
{   //--------------------------------------------
    // CORE
    //--------------------------------------------
    protected static function Core_configureRoutsyRouter(\Kamille\Utils\Routsy\RoutsyRouter $router)
    {
    }

    protected static function Core_onQuickPdoQueryReady(array $params)
    {

    }


    /**
     * @param array $params (see QuickPdoInitializer for more details)
     *      - method
     *      - query
     *      - markers
     *      - table
     *      - whereConds
     */
    protected static function Core_onQuickPdoDataAlterAfter(array $params)
    {

    }


    protected static function Core_onSiteConfigured(\Kamille\Architecture\Request\Web\HttpRequestInterface $request)
    {

    }

    protected static function Core_configureLawsUtil(\Kamille\Utils\Laws\LawsUtil $util)
    {

    }


    protected static function Core_addLoggerListener(\Logger\LoggerInterface $logger)
    {
        //mit-start:ThisApp
        ThisAppHooksHelper::Core_addLoggerListener($logger);
        //mit-end:ThisApp
    }

    protected static function Core_feedEarlyRouter(\Module\Core\Architecture\Router\EarlyRouter $router)
    {

    }


    protected static function Core_autoLawsConfig(&$data)
    {

    }

    protected static function Core_feedAjaxUri2Controllers(array &$uri2Controllers)
    {
    }

    protected static function Core_addLawsUtilProxyDecorators(\Kamille\Mvc\LayoutProxy\LawsLayoutProxyInterface $layoutProxy)
    {
        if ($layoutProxy instanceof \Kamille\Mvc\LayoutProxy\LawsLayoutProxy) {
            $layoutProxy->addDecorator(\Kamille\Mvc\WidgetDecorator\PositionWidgetDecorator::create());
        }
    }

    protected static function Core_lazyJsInit_addCodeWrapper(\Module\Core\JsLazyCodeCollector\JsLazyCodeCollectorInterface $collector)
    {
        if (true === \Kamille\Services\XConfig::get('Core.addJqueryEndWrapper')) {
            $collector->addCodeWrapper('jquery', function ($s) {
                $r = '$(document).ready(function () {' . PHP_EOL;
                $r .= $s;
                $r .= '});' . PHP_EOL;
                return $r;
            });
        }
    }


    protected static function Core_widgetInstanceDecorator(\Kamille\Mvc\Widget\WidgetInterface $widget)
    {
        $widget->setTemplate("Core/widget-error");
    }

    protected static function Core_ModalGscpResponseDefaultButtons(array &$buttons)
    {
        // mit-start:NullosAdmin
        $buttons = [
            "close" => [
                "flavour" => "default",
                "label" => "Close",
                "htmlAttr" => [
                    "data-dismiss" => "modal",
                ],
            ],
        ];
        // mit-end:NullosAdmin
    }


    protected static function Core_Controller_onControllerStringReceived(&$controllerString)
    {
    }
}

