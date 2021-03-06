<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$maxTasks = 5;
$prefix = "-----------------------";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    createList($_POST);
//    header("refresh:3;url=".ROOT_URL."index.php");
    $compactData = ['tasks' => $_POST['tasks'], 'taskTimes' => $_POST['taskTimes'], 'taskAmount' => $_POST['taskAmount']];
    var_dump($_POST);
//    $compactData = ['tasks' => $_POST['task'], 'taskTimes' => $_POST['taskTime']];
//    var_dump($compactData['tasks'][1]);
}
?>
    <title>Creating a new list</title>
</head>
<body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
    <div id="main-container" class="more-height container border border-top-0 border-white">
        <div class="title text-white text-center border-bottom border-3 border-white">
            <h2>Lijst aanmaken</h2>
        </div>
        <div id="form">
            <form method="POST" action="<?=$_SERVER["PHP_SELF"]?>">
                <div class="form-row justify-content-around text-white pt-3 pb-2">
                    <div class="form-group col-md-5">
                        <label for="name">Name</label>
                        <input name="title" type="text" class="form-control" id="name" placeholder="Naam van de lijst">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="taskAmount">State</label>
                        <select name="taskAmount" id="taskAmount" class="form-control">
                            <option value="0" selected><?=$prefix?> Make your Choice <?=$prefix?></option>
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