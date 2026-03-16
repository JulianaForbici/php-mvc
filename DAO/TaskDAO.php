<?php

class TaskDAO {

        private $conexao;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=mvc_php';

        $this->conexao = new PDO($dsn, 'root', 'Saidaqui731!');
    }

    public function insert(TaskModel $task)
    {
        $sql = "INSERT INTO tasks (title, description, status, due_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $task->getTitle());
        $stmt->bindValue(2, $task->getDescription());
        $stmt->bindValue(3, $task->getStatus());
        $stmt->bindValue(4, $task->getDueDate());
        $stmt->execute();
    }

    public function select(){
        $sql = "select * from tasks";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function update(TaskModel $model){
        $sql = "update tasks set title = ?, description = ?, status = ?, due_date = ? where id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->getTitle());
        $stmt->bindValue(2, $model->getDescription());
        $stmt->bindValue(3, $model->getStatus());
        $stmt->bindValue(4, $model->getDueDate());
        $stmt->bindValue(5, $model->id);
        $stmt->execute();

    }

    public function delete(int $id){
    $sql = "delete from tasks where id = ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();
    }

    public function selectById(int $id){
        include_once './Model/TaskModel.php';
        $sql = "select * from tasks where id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("TaskModel");
    }
}