<?php


namespace Controller\ThisApp\Bootstrap;


use Core\Controller\ApplicationController;
use Core\Services\A;
use Kamille\Utils\Claws\ClawsWidget;

class ThreePagesController extends ApplicationController
{
    public function renderClaws()
    {

        $routeId = A::route();
        $accueil_est_actif = ($routeId === "MyApp_bootstrap_home");
        $blog_est_actif = (in_array($routeId, ["MyApp_bootstrap_blog", "MyApp_bootstrap_blog_item"]));
        $contact_est_actif = ($routeId === "MyApp_bootstrap_contact");


        $this->getClaws()
            ->setWidget("top.menu", ClawsWidget::create()
                ->setTemplate('ThisApp/Top/Menu/default')
                ->setConf([
                    "items" => [
                        [
                            "label" => "Accueil",
                            "link" => A::link("MyApp_bootstrap_home"),
                            "active" => $accueil_est_actif,
                        ],
                        [
                            "label" => "Blog",
                            "link" => A::link("MyApp_bootstrap_blog"),
                            "active" => $blog_est_actif,
                        ],
                        [
                            "label" => "Contact",
                            "link" => A::link("MyApp_bootstrap_contact"),
                            "active" => $contact_est_actif,
                        ],
                    ],
                ])
            )
            ->setLayout("sandwich_1c/default");


        return parent::renderClaws();
    }
}