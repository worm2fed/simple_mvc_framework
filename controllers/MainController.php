<?php

namespace controllers;


use core\Controller;
use core\View;

class MainController extends Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    : void {
        View::render('index.html');
    }
}