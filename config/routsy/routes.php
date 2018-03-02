<?php

//--------------------------------------------
// USER - BEFORE
//--------------------------------------------



//--------------------------------------------
// STATIC
//--------------------------------------------
$routes["MyApp_home"] = ["/", null, null, 'Controller\ThisApp\Raw\HomeController:render'];
$routes["MyApp_bootstrap_home"] = ["/bootstrap", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\HomePageController:renderHomePage'];
$routes["MyApp_bootstrap_blog"] = ["/bootstrap-blog", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\BlogPageController:render'];
$routes["MyApp_bootstrap_blog_item"] = ["/bootstrap-blog-item/{id}", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\BlogPageController:renderItem'];
$routes["MyApp_bootstrap_contact"] = ["/bootstrap-contact", null, null, 'Controller\ThisApp\Bootstrap\ThreePages\ContactPageController:render'];



//--------------------------------------------
// DYNAMIC
//--------------------------------------------


//--------------------------------------------
// USER - AFTER
//--------------------------------------------



