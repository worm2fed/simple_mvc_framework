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
        View::renderView('task/index.php', ['page_class' => 'items-list-page'], 'main.php');
    }

    /**
     * Create a task
     *
     * @return void
     */
    public function createAction()
    : void {
        View::renderView('task/create.php', ['page_class' => 'items-editor-page'], 'main.php');
    }

    /**
     * Update the task
     *
     * @return void
     */
    public function updateAction()
    : void {
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
}