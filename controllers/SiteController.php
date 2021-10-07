<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{

    public function home()
    {
        return $this->render('Home');
    }

    public function contact()
    {
        return $this->render('Contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        echo '<pre>';
        echo var_dump($body);
        echo '</pre>';
    }
}
