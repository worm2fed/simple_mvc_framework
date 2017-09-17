<?php

namespace controllers;


use core\Controller;
use core\SessionHandler;
use core\SystemTools;
use core\View;
use models\UserModel;

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
     * Login
     *
     * @return void
     */
    public function loginAction()
    : void {
        UserModel::login($_REQUEST['username'], $_REQUEST['password']);
        SystemTools::redirect('/');
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logoutAction()
    : void {
        UserModel::logout();
        SystemTools::redirect('/');
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