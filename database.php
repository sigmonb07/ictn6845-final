<?php
    $dbname = 'mysql:host=localhost;dbname=id3121202_ictn6845';
    $username = "id3121202_mgs_user";
    $password = "password";

    try {
        $db = new PDO($dbname, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>