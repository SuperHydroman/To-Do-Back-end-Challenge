<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$id = $_GET['id'];

$list = getListOnID($id);
$tasks = getAllTasksForList($id);

?>
    <title>Details of <?=$list['title']?></title>
    </head>
    <body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
    <div id="main-container" class="more-height container border border-top-0 border-white">
        <div class="title text-white text-center border-bottom border-3 border-white">
            <h2><?=$list['title']?></h2>
        </div>

        <table id="table">
            <tr>
                <th>Task name</th>
                <th>Task Duration</th>
                <th class="action">Actions</th>
            </tr>

            <?php

                foreach ($tasks as $task) {
                    echo '<tr>',
                             '<td>'.$task['task'].'</td>',
                             '<td>'.$task['duration'].'</td>',
//                             '<td>17h 20m 50s</td>',
                             '<td class="text-center"><a class="text-white" href="updateTask.php?LID='.$task['belongsToList'].'&TID='.$task['id'].'"><i id="action-pen" class="fas fa-pen"></i></a>   <a class="text-white" href="deleteTask.php?id='.$task['id'].'"><i id="action-can" class="fas fa-trash-alt"></i></a></td>',
                         '</tr>';
                }

            ?>
        </table>
    </div>
<?php
require ROOT_DIR."/includes/footer.php";
?>