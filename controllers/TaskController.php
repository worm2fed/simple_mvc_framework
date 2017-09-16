<?php

namespace controllers;


use core\Controller;
use core\View;

class TaskController extends Controller
{
    /**
     * Show the index page - page with all tasks
     *
     * @return void
     */
    public function indexAction()
    : void {
        View::renderView('task/index.php', [], 'main.php');
    }

    /**
     * Create a task
     *
     * @return void
     */
    public function createAction()
    : void {

    }
}