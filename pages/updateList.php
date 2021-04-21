<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$url_data = $_GET;
$UID = $url_data['UID'];
$LID = $url_data['LID'];

//$tasks = getAllTasksForUser($UID);
$tasks = getAllTasksForList($LID);
$list = getListOnID($LID);

$taskCounter = 1;
$taskAmount = count($tasks);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = "Item successfully edited!";
    $_POST['url_data'] = ["uid" => $UID, "lid" =>$LID];
    updateList($_POST);
    header("refresh:2;url=".ROOT_URL."index.php");
}
?>
    <title>Editing a list</title>
    </head>
    <body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
    <div id="main-container" class="more-height container border border-top-0 border-white">
        <div class="title text-white text-center border-bottom border-3 border-white">
            <h2>Editing a list</h2>
        </div>
        <p class="text-center text-white pt-2" id="feedback"><?=$feedback?></p>
        <div id="form">
            <form method="POST" action="<?=$_SERVER["PHP_SELF"]?>?LID=<?=$LID?>&UID=<?=$UID?>">
                <input name="taskAmount" value="<?=$taskAmount?>" class="form-control d-none">
                <div class="form-row mt-4">
                    <div class="col-md-6 text-white px-3">
                        <h1>Old:</h1>
                    </div>
                    <div class="col-md-6 text-white px-3">
                        <h1>New:</h1>
                    </div>
                </div>
                <div class="form-row">
                    <div class="justify-content-around text-white col-md-6 pb-3">
                        <div class="form-group col-md-12">
                            <label for="title">Name</label>
                            <input disabled type="text" class="form-control" id="title" placeholder="Naam van de lijst" value="<?=$list['title']?>">
                        </div>
                    </div>
                    <div class="justify-content-around text-white col-md-6 pb-3">
                        <div class="form-group col-md-12">
                            <label for="newTitle">Name</label>
                            <input name="newTitle" type="text" class="form-control" id="newTitle" placeholder="Naam van de lijst" value="">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 justify-content-start text-white pb-2">
                        <?php
                        foreach ($tasks as $task) {
                            echo '<div class="row">',
                                    '<div class="form-group col-md-6">',
                                        '<label for="name">Task '.$taskCounter.'</label>',
                                        '<input disabled id="name" class="form-control" value="'.$task['task'].'">',
                                    '</div>',
                                    '<div class="form-group col-md-6">',
                                        '<label>How much time do you need? <i id="timeTooltip" class="far fa-question-circle" data-placement="right" data-toggle="tooltip" data-html="true" title="" aria-hidden="true" data-original-title="<b>The format is: hours/minutes/seconds</b>"></i><span class="sr-only"><b>The format is: hours/minutes/seconds</b></span></label>',
                                        '<input disabled type="time" value="'.$taskCounter['duration'].'" name="newDuration[]" id="time-task-1" class="form-control" step="1">',
                                    '</div>',
                                '</div>';
                            $taskCounter++;
                        }
                        ?>
                    </div>
                    <div class="col-md-6 justify-content-start text-white pb-2">
                        <?php
                        $taskCounter = 1;
                        foreach ($tasks as $task) {
                            echo '<div class="row">',
                                    '<input name="taskID[]" value="'.$task['id'].'" id="newName" class="form-control d-none">',
                                    '<div class="form-group col-md-6">',
                                        '<label for="newName">Task '.$taskCounter.'</label>',
                                        '<input name="newName[]" id="newName" class="form-control">',
                                    '</div>',
                                    '<div class="form-group col-md-6">',
                                        '<label>How much time do you need? <i id="timeTooltip" class="far fa-question-circle" data-placement="right" data-toggle="tooltip" data-html="true" title="" aria-hidden="true" data-original-title="<b>The format is: hours/minutes/seconds</b>"></i><span class="sr-only"><b>The format is: hours/minutes/seconds</b></span></label>',
                                        '<input type="time" value="'.$taskCounter['duration'].'" name="newDuration[]" id="time-task-1" class="form-control" step="1">',
                                    '</div>',
                                '</div>';
                            $taskCounter++;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-row text-white justify-content-center" id="submit">
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