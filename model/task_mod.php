<?php
include '../config/db.php';

class Task
{
    private $obj;

    function __construct()
    {
        $this->obj = new Database;
    }

    function select()
    {
        $result = $this->obj->select('SELECT * FROM tasks ORDER BY id DESC');
        return $result;
    }

    function selectSingle($id)
    {
        $singleView = $this->obj->selectOne('SELECT * FROM tasks WHERE id =' . $id);
        return $singleView;
    }
}
?>