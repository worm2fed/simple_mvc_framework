<?php

namespace controllers;


use core\Controller;
use core\exceptions\ImageException;
use core\ImageHandler;
use core\SessionHandler;
use core\SystemTools;
use core\View;
use models\TaskModel;
use models\UserModel;

class TaskController extends Controller
{
    /**
     * Show the index page - page with all tasks
     */
    public function indexAction()
    : void {
        View::renderView('task/index.php', ['page_class' => 'items-list-page'], 'main.php');
    }

    /**
     * Create a task
     */
    public function createAction()
    : void {
        View::renderView('task/create.php', ['page_class' => 'items-editor-page'], 'main.php');
    }

    /**
     * Post a task
     */
    public function postAction()
    : void {
        $task = new TaskModel();
        unset($_REQUEST['post']);
        $task->load($_REQUEST);
        $task->create();
        SystemTools::redirect('/');
    }

    /**
     * Upload image action
     */
    public function imageAction()
    : void {
        try {
            $uploader = new ImageHandler($_FILES['image']['tmp_name']);
            $image_name = time().'.'.$uploader->getExtension();
            $uploader->save($image_name);
            echo json_encode(['success' => true, 'image_name' => $image_name]);
        } catch (ImageException $e) {
            echo json_encode(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Update the task
     */
    public function updateAction()
    : void {
    }

    /**
     * Login
     */
    public function loginAction()
    : void {
        UserModel::login($_REQUEST['username'], $_REQUEST['password']);
        SystemTools::redirect('/');
    }

    /**
     * Logout
     */
    public function logoutAction()
    : void {
        UserModel::logout();
        SystemTools::redirect('/');
    }
}