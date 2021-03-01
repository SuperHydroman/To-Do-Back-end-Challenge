<?php
require "includes/datalayer.php";

$lists = getAllLists();

require ROOT_DIR."/includes/header.php";
?>
    <title>To-Do List</title>
</head>
<body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
<div id="main-container" class="container">
    <div class="row justify-content-center">
        <?php

        foreach ($lists as $list) {
            $listOwner = getListOwner($list['belongsToUser']);
            $tasksPerOwner = getAllTasksForUser($list['belongsToUser']);
            echo '<div class="list col-3 bg-primary">',
                    '<div class="title text-center border-bottom border-3 border-white">',
                        '<h2>'.$list['title'].'</h2>',
                    '</div>',
                    '<div class="task-container">',
                        '<ul class="task-list">';
                        foreach ($tasksPerOwner as $task) {
                            echo '<li class="task">'.$task['task'].'</li>';
                        }
                    echo '</ul>',
                    '</div>',
                '<div class="list-footer text-center border-top border-2 border-white">',
                    '<small class="author">Created by '.$listOwner['name'].'</small>',
                    '<small class="date">At '.$list['dateCreated'].'</small>',
                '</div>',
            '</div>';
        }
        ?>

    </div>
</div>

<?php
    require ROOT_DIR."/includes/footer.php";
?>