<?php

require "config.php";

function databaseConnection() {

    try {
        $conn = new PDO("mysql:host=".SERVER_NAME.";dbname=".DB_NAME, USERNAME, PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully to <b>".DB_NAME."</b>";
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

}

function getAllLists() {
    $conn = databaseConnection();
    $sql = "SELECT * FROM lists";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $conn = null;
    return $result;
}

function getListOwner($id) {
    $conn = databaseConnection();
    $sql = "SELECT * FROM users WHERE id = (SELECT belongsToUser FROM lists WHERE belongsToUser=:id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();
//    $conn = null;
    return $result;
}

function getAllTasksForUser($id) {
    $conn = databaseConnection();
    $sql = "SELECT * FROM task_table WHERE belongsToUser = (SELECT id FROM users WHERE id = :id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $conn = null;
    return $result;
}

function getAllUsers() {
    $conn = databaseConnection();
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $conn = null;
    return $result;
}