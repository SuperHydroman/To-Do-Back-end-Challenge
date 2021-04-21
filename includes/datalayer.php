<?php

require_once "config.php";

// Database connection
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


// All getters will be listed below
function getAllLists() {
    $conn = databaseConnection();
    $sql = "SELECT * FROM lists";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $conn = null;
    return $result;
}

function getListOnID($id) {
    $conn = databaseConnection();
    $sql = "SELECT * FROM lists WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':id' => $id
    ));
    $result = $stmt->fetch();
    $conn = null;
    return $result;
}

function getUpcomingListID() {
    $conn = databaseConnection();
    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'todo_list' AND TABLE_NAME = 'lists'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $conn = null;
    return $result;
}

function getListOwner($id) {
    $conn = databaseConnection();
    $sql = "SELECT * FROM users WHERE id = (SELECT DISTINCT belongsToUser FROM lists WHERE belongsToUser=:id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();
    $conn = null;
    return $result;
}

function getAllTasksForUser($id) {
    $conn = databaseConnection();
    $sql = "SELECT * FROM tasks WHERE belongsToUser = (SELECT id FROM users WHERE id = :id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $conn = null;
    return $result;
}

function getAllTasksForList($id) {
    $conn = databaseConnection();
    $sql = "SELECT * FROM tasks WHERE belongsToList = (SELECT id FROM lists WHERE id = :list)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":list", $id);
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

function getCurrentDate() {
    date_default_timezone_set("Europe/Amsterdam");
    $date = date("Y-m-d H:i:s");

    return $date;
}

// All creators will be listed below
function createList($data) {
    $conn = databaseConnection();
    $date = getCurrentDate();
    $sql = "INSERT INTO lists (`title`, `belongsToUser`, `taskAmount`, `dateCreated`) VALUES (:title, 1, :taskAmount, :dateCreated)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':title' => $data['title'],
        ':taskAmount' => $data['taskAmount'],
        ':dateCreated' => $date
    ));
    $conn = null;

    if ($data['taskAmount'] > 0) {
        unset($data["title"]);
        createTask($data);
    }
}

function createTask($data) {
    $conn = databaseConnection();

    for ($i = 1; $i <= $data['taskAmount']; $i++) {
        $sql = "INSERT INTO `tasks`(`task`, `duration`, `belongsToUser`, `belongsToList`) VALUES (:task, :taskDuration, 1,:listID)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':task' => $data['tasks'][$i],
            ':taskDuration' => $data['taskTimes'][$i],
            ':listID' => $data['listID']
        ));
    }

    $conn = null;
}


// All updaters will be listed below
function updateList($data) {
    $conn = databaseConnection();
    $sql = "UPDATE `lists` SET `title`=:title WHERE id = :lid";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':title' => $data["newTitle"],
        ':lid' => $data["url_data"]["lid"]
    ));

    $conn = null;


    if ($data['taskAmount'] > 0) {
        unset($data['newTitle']);
        updateTasks($data);
    }
}

function updateTasks($data) {
    $conn = databaseConnection();

    for ($i = 0; $i < $data['taskAmount']; $i++) {
        $sql = "UPDATE `tasks` SET `task`=:newName,`duration`=:newDuration WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':newName' => $data['newName'][$i],
            ':newDuration' => $data['newDuration'][$i],
            ':id' => $data['taskID'][$i]
        ));
    }

    $conn = null;
}

// All deleters will be listed below
function deleteList($data) {
    $conn = databaseConnection();
    $sql = "DELETE FROM `lists` WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':id' => $data['id']
    ));
    $conn= null;

    if ($data['taskAmount'] > 0) {
        unset($data['id']);
        deleteTasksFromList($data);
    }
}

function deleteTasksFromList($data) {
    $conn = databaseConnection();

    for ($i =0; $i < $data['taskAmount']; $i++) {
        $sql = "DELETE FROM `tasks` WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $data['taskData'][$i]['id']
        ));
    }

    $conn= null;
}

function deleteTask($data) {
    $conn = databaseConnection();
    $sql = "DELETE FROM `tasks` WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':id' => $data['id']
    ));
    $conn= null;
}





























//JOIN QUERY!!      SELECT users.id, users.name, COUNT(task_table.id) FROM users LEFT JOIN task_table ON task_table.belongsToUser = users.id GROUP BY users.id, users.name