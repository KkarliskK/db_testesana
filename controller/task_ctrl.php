<?php 

include '../model/task_mod.php';

function index()
{
    $obj = new Task;
    $post = $obj->select();

    $posts = [
        "posts"=> $post,
    ];

    return $posts;
}

?>