<?php

namespace MyApp\Controllers;
use MyApp\Models\Users;

class IndexController extends AbstractController
{
   
    public function actionIndex()
    {
        $this->render('index.twig');
    }

    public function actionError()
    {
        $this->render('error.twig');
    }
}
