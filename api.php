<?php
include 'db.php';

//theese are the lines to get json data
$database = new Database();
$data = $database->getTaskManagementData();


$dataArray = json_decode($data, true);

$resultArray = array();

foreach ($dataArray as $item) {
    $id = $item['id'];
    $resultArray[$id] = $item;
}

echo "<pre>";
print_r($resultArray);
echo "</pre>";

?>