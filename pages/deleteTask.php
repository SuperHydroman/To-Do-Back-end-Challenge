<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$id = $_GET['id'];
$maxTasks = 5;
$prefix = "-------------------------------------------------------------------";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['choice'] == "yes") {
        $feedback = "Item deleted!";
        $_POST['id'] = $id;
        deleteTask($_POST);
    }
    else {
        $feedback = "Item not deleted!";
    }
    header("refresh:3;url=".ROOT_URL."index.php");
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
            <h2>Deleting a Task</h2>
        </div>
        <div id="form">
            <form method="POST" action="<?=$_SERVER["PHP_SELF"]?>?id=<?=$id?>">
                <div class="form-row justify-content-around text-white pt-3 pb-2">
                    <div class="form-group col-md-11">
                        <h4 class="text-center" id="question">Are you sure you want to delete this task?</h4>
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