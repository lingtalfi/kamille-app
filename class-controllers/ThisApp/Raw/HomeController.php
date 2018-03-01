<?php


namespace Controller\ThisApp\Raw;


use Core\Controller\ApplicationController;
use Kamille\Architecture\Response\Web\HttpResponse;

class HomeController extends ApplicationController
{

    public function render()
    {
        return HttpResponse::create("Hey, this is your new app.");
    }

}