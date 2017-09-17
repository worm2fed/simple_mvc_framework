<?php

namespace controllers;


use core\Controller;
use core\exceptions\AuthenticationException;
use core\exceptions\ImageException;
use core\ImageHandler;
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
        $data['tasks'] = TaskModel::find([], $_REQUEST);
        $data['page_class'] = 'items-list-page';
        $data['pages_num'] = TaskModel::getPagesNum();
        $data['active_page'] = 1;
        switch ($_REQUEST['order_by'] ?? '') {
            case 'email':
                $data['active_sort'] = 'Sort by email';
                break;
            case 'username':
                $data['active_sort'] = 'Sort by name';
                break;
            case 'status':
                $data['active_sort'] = 'Sort by status';
                break;
            default:
                $data['active_sort'] = 'Sort by...';
        }
        $data['prev_page'] = '';
        $data['next_page'] = '/&page=2';
        if (isset($_REQUEST['page'])) {
            $data['active_page'] = $_REQUEST['page'];
            $data['prev_page'] = '/&page=' . ($_REQUEST['page'] - 1);
            $data['next_page'] = '/&page=' . ($_REQUEST['page'] + 1);
        }
        View::renderView('task/index.php', $data, 'main.php');
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
        try {
            UserModel::login($_REQUEST['username'], $_REQUEST['password']);
        } catch (AuthenticationException $e) {
            exit($e);
        }
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