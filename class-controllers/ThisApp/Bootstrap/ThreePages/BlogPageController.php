<?php


namespace Controller\ThisApp\Bootstrap\ThreePages;


use Controller\ThisApp\Bootstrap\ThreePagesController;
use Core\Services\A;
use Kamille\Ling\Z;
use Kamille\Utils\Claws\ClawsWidget;
use Module\ThisApp\Model\Blog\BlogItemModel;

class BlogPageController extends ThreePagesController
{

    public function render()
    {
        $this->getClaws()
            ->setWidget("maincontent.body", ClawsWidget::create()
                ->setTemplate('ThisApp/MainContent/BlogPage/default')
                ->setConf([
                    "items" => BlogItemModel::getBlogItems()
                ])
            );
        return $this->renderClaws();
    }


    public function renderItem()
    {
        $id = Z::getUrlParam("id");
        $this->getClaws()
            ->setWidget("maincontent.body", ClawsWidget::create()
                ->setTemplate('ThisApp/MainContent/BlogItem/default')
                ->setConf([
                    "i:item" => BlogItemModel::getBlogItemById($id),
                ])
            );
        return $this->renderClaws();
    }
}