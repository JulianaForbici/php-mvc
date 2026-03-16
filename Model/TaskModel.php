<?php

class TaskModel
{
    public $id;
    public $title;
    public $description;
    public $status;
    public $due_date;

    public $rows;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }

    public function getDueDate()
    {
        return $this->due_date;
    }

    public function save()
    {
        include_once './DAO/TaskDAO.php';
        $dao = new TaskDAO();
        if(empty($this->id)){
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }
    public function getAll()
    {
        include_once './DAO/TaskDAO.php';
        $dao = new TaskDAO();
        return $dao->select();
    }

    public function getById(int $id)
    {
        include_once './DAO/TaskDAO.php';
        $dao = new TaskDAO();
        $obj = $dao->selectById($id);
        return ($obj) ? $obj : new TaskModel();
    }
    public function delete(int $id)
    {
        include_once './DAO/TaskDAO.php';
        $dao = new TaskDAO();
        $dao->delete($id);
    }

    public function validate()
    {
        $errors = [];
        if(!empty($this->due_date)){
            $today = date('Y-m-d');
            if ($this->due_date < $today) {
                $errors[] = "A data de vencimento não pode ser anterior a data atual!";
            }
        }

        if (empty($this->title)) {
            $errors[] = "O título é obrigatório!";
        } elseif (strlen($this->title) < 3 || strlen($this->title) > 120) {
            $errors[] = "O título deve conter entre 3 e 120 caracteres!";
        }
        return $errors;
    }
}