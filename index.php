<?php 

require_once 'Database.php';

$database = new Database();
$conn = $database->getConnection();


if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Failed to connect to the database.";
}

die;






$config = require_once('config.php');

echo $config['database']['host'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $pe) {

    die("Could not connect to the database $dbname: " . $pe->getMessage());
}


$results = $conn->query("Select * from notes")->fetchAll();

$notes = json_encode($results);

echo $notes;


