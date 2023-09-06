<?php

// DEV
$host = '127.0.0.1';
$db = 'attendance_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host; dbname=$db;charset#$charset";

// Tries something in the try block, IF that fails, the use catch block
try {
    $pdo = new PDO($dsn, $user, $pass);
    // initial echo just for testing
    // echo 'Hello Database';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "<h3 class='text-danger'>error: no DB found!</h3>";
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';
$crud = new crud($pdo);
$user = new user($pdo);

$user->insertUser("something", "somethingelse");
?>