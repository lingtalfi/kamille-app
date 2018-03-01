<?php


namespace Controller\ThisApp\Bootstrap\ThreePages;


use Controller\ThisApp\Bootstrap\ThreePagesController;
use Kamille\Utils\Claws\ClawsWidget;

class HomePageController extends ThreePagesController
{

    public function renderHomePage()
    {
        $this->getClaws()
            ->setWidget("maincontent.body", ClawsWidget::create()
                ->setTemplate('ThisApp/MainContent/HomePage/default')
                ->setConf([])
            );


        return $this->renderClaws();
    }
}