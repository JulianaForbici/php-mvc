<?php

class TaskController
{
    public static function index() {
        include 'Model/TaskModel.php';
        $model = new TaskModel();
        $tasks = $model->getAll();
        include './View/Modules/Task/ListTask.php';
    }

    public static function form()
    {
        include 'Model/TaskModel.php';
        $model = new TaskModel();
        if (isset($_GET['id'])) {
            $model = $model->getById((int)$_GET['id']);
        }
        include './View/Modules/Task/FormTask.php';
    }

    public static function save()
{
    include './Model/TaskModel.php';

    $model = new TaskModel();

    $model->id          = $_POST['id'] ?? null;
    $model->title       = $_POST['title'] ?? '';
    $model->description = $_POST['description'] ?? '';
    $model->status      = $_POST['status'] ?? 'todo';
    $model->due_date    = $_POST['due_date'] ?? null;

    $errors = $model->validate();

    if (!empty($errors)) {
        include './View/Modules/Task/FormTask.php';
        return;  
    }
    $model->save();

    header('Location: /task');
}
    public static function delete()
    {
       include 'Model/TaskModel.php';
       $model = new TaskModel();

        $model->delete($_GET['id']);
        header('Location: /task');
    }
}