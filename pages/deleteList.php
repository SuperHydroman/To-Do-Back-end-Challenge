<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['choice'] === "yes") {
        $tasksForDeletedList = getAllTasksForList($id);
        $feedback = "Item successfully deleted!";
        $_POST['id'] = $id;
        $_POST['taskAmount'] = count($tasksForDeletedList);
        $_POST['taskData'] = $tasksForDeletedList;
        deleteList($_POST);
    }
    else {
        $feedback = "Item not deleted!";
    }
    header("refresh:2;url=".ROOT_URL."index.php");
}
?>
    <title>Deleting a task</title>
    </head>
    <body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
    <div id="main-container" class="more-height container border border-top-0 border-white">
        <div class="title text-white text-center border-bottom border-3 border-white">
            <h2>Deleting a List</h2>
        </div>
        <div id="form">
            <form method="POST" action="<?=$_SERVER["PHP_SELF"]?>?id=<?=$id?>">
                <div class="form-row justify-content-around text-white pt-3 pb-2">
                    <div class="form-group col-md-11">
                        <h4 class="text-center" id="question">Are you sure you want to delete this list?</h4>
                        <p class="text-center" id="feedback"><?=$feedback?></p>
                        <div id="submit" class="form-row text-white justify-content-center">
                            <button name="choice" value="no" type="submit" class="btn btn-outline-light col-md-3 mr-2">Cancel</button>
                            <button name="choice" value="yes" type="submit" class="btn btn-outline-light col-md-3 ml-2">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <img id="AreYouSure" src="../resources/img/RUSUREBOUTTHAT.webp">
            </div>
        </div>
    </div>
<?php
require ROOT_DIR."/includes/footer.php";
?>