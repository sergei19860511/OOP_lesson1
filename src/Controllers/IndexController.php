<?php

namespace MyApp\Controllers;
use MyApp\App;
use MyApp\Models\Users;
use MyApp\Router;

class IndexController extends AbstractController
{
   
    public function actionIndex()
    {
        $this->render('/index.twig');
    }

    public function actionError()
    {
        $this->render('error.twig');
    }
}
