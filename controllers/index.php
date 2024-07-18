<?php

$config = require('config.php');
$db = new Database($config['database']);

$userID = $_GET['userID'];
$query = "select * from notes where userID = :userID";



$notes = $db->query($query, [':userID' => $userID])->fetchAll();


echo json_encode($notes);

