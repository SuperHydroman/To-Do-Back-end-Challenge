<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$id = $_GET['id'];
$maxTasks = 5;
$prefix = "-------------------------------------------------------------------";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = "Item successfully created!";
    $_POST['listID'] = $id;
    var_dump($_POST);
    createTask($_POST);
    header("refresh:2;url=".ROOT_URL."index.php");
}
?>
    <title>Adding a new task</title>
    </head>
    <body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
    <div id="main-container" class="more-height container border border-top-0 border-white">
        <div class="title text-white text-center border-bottom border-3 border-white">
            <h2>Adding a new Task</h2>
        </div>
        <p class="text-center text-white pt-2" id="feedback"><?=$feedback?></p>
        <div id="form">
            <form method="POST" action="<?=$_SERVER["PHP_SELF"]?>?id=<?=$id?>">
                <div class="form-row justify-content-around text-white pt-3 pb-2">
                    <div class="form-group col-md-11">
                        <label for="taskAmount">Amount</label>
                        <select name="taskAmount" id="taskAmount" class="form-control">
                            <option value="0" selected><?=$prefix?> Make your choice <?=$prefix?></option>
                            <?php
                            for ($i = 1; $i <= $maxTasks; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div id="task-container"></div>
                <div id="submit" class="form-row text-white justify-content-center">
                    <div class="form-group col-md-11 text-right">
                        <button type="submit" class="btn btn-outline-light col-md-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
require ROOT_DIR."/includes/footer.php";
?>