<?php
    // Database Credentials
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'buzlysis';

    // Set dsn
    $dsn = "mysql: host={$host}; dbname={$db_name}";
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
    );

    // create PDO instance
    try{
        $db = new PDO($dsn, $user, $password, $options);
    } catch(PDOException $e) {
        $error = $e->getMessage();
        echo $error;
    }