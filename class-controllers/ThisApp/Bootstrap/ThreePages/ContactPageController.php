<?php


namespace Controller\ThisApp\Bootstrap\ThreePages;


use Controller\ThisApp\Bootstrap\ThreePagesController;
use Kamille\Utils\Claws\ClawsWidget;
use Module\ThisApp\Model\Form\ContactForm;

class ContactPageController extends ThreePagesController
{

    public function render()
    {


        $this->getClaws()
            ->setWidget("maincontent.body", ClawsWidget::create()
                ->setTemplate('ThisApp/MainContent/ContactPage/default')
                ->setConf([
                    "form" => ContactForm::getModel(),
                ])
            );


        return $this->renderClaws();
    }
}