<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$url_data = $_GET;
$TID = $url_data['TID'];
$LID = $url_data['LID'];

var_dump($url_data);
$task = getSingleTaskForList($url_data);
var_dump($task);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = "Item successfully edited!";
    $_POST['url_data'] = $url_data;
    var_dump($_POST);
    updateSingleTask($_POST);
    header("refresh:2;url=".ROOT_URL."pages/details.php?id=$LID");
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
            <form method="POST" action="<?=$_SERVER["PHP_SELF"]?>?LID=<?=$LID?>&TID=<?=$TID?>">
                <div class="form-row mt-4">
                    <div class="col-md-6 text-white px-3">
                        <h1>Old:</h1>
                    </div>
                    <div class="col-md-6 text-white px-3">
                        <h1>New:</h1>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 justify-content-start text-white pb-2">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Task 1</label>
                                <input disabled id="name" class="form-control" value="<?=$task['task']?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="oldDuration">How much time do you need? <i id="timeTooltip" class="far fa-question-circle" data-placement="right" data-toggle="tooltip" data-html="true" title="" aria-hidden="true" data-original-title="<b>The format is: hours/minutes/seconds</b>"></i><span class="sr-only"><b>The format is: hours/minutes/seconds</b></span></label>
                                <input disabled type="time" value="<?=$task['duration']?>" name="oldDuration" id="oldDuration" class="form-control" step="1">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 justify-content-start text-white pb-2">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="newName">Task 1</label>
                                <input id="newName" name="newName" class="form-control" placeholder="New name for your task?">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="newDuration">How much time do you need? <i id="timeTooltip" class="far fa-question-circle" data-placement="right" data-toggle="tooltip" data-html="true" title="" aria-hidden="true" data-original-title="<b>The format is: hours/minutes/seconds</b>"></i><span class="sr-only"><b>The format is: hours/minutes/seconds</b></span></label>
                                <input type="time" name="newDuration" id="newDuration" class="form-control" step="1">
                            </div>
                        </div>
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