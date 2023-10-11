<?php
include 'db.php';

$database = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $insert = $database->delete("DELETE FROM `tasks` WHERE `id` = $id");

}else{
    echo "NEveiksme";
}

?>