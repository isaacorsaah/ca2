<?php
    $dsn = 'mysql:host=localhost;dbname=ca2';
    $username = 'root';
    $password = '';
//    $dsn = 'mysql:host=localhost;dbname=D00234552';
//     $username = 'D00234552';
//     $password = '0be7QRcN';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>