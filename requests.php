<?php
require_once 'db_config.php';

$page = $_GET["page"];

$result = mysqli_query($link, 'SELECT * FROM goods ORDER BY counter DESC LIMIT ' . $page);
mysqli_close($link);

$goods = array();
while($row = mysqli_fetch_assoc($result)){
    $goods[] = $row;
}

echo json_encode($goods);