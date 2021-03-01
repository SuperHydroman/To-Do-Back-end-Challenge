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
    $conn = null;
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


// All create functions will be listed below

function createList($data) {
    $conn = createDatabaseConnection();
    $sql = "INSERT INTO lists (`title`, `belongsToUser`, `taskAmount`, `dateCreated`) VALUES (:title, :belongsToUser, :taskAmount, :dateCreated)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':title' => $data['title'],
        ':belongsToUser' => $data['belongsToUser'],
        ':taskAmount' => $data['taskAmount'],
        ':dateCreated' => $data['dateCreated']
    ));
    $conn = null;
}


//SELECT users.id, users.name, COUNT(task_table.id) FROM users LEFT JOIN task_table ON task_table.belongsToUser = users.id GROUP BY users.id, users.name