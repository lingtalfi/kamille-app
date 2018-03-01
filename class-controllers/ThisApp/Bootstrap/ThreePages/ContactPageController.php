<?php


namespace Controller\ThisApp\Bootstrap\ThreePages;


use Controller\ThisApp\Bootstrap\ThreePagesController;
use Kamille\Utils\Claws\ClawsWidget;

class ContactPageController extends ThreePagesController
{

    public function render()
    {







        $this->getClaws()
            ->setWidget("maincontent.body", ClawsWidget::create()
                ->setTemplate('ThisApp/MainContent/ContactPage/default')
                ->setConf([])
            );


        return $this->renderClaws();
    }
}