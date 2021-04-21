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
                $tasksPerList = getAllTasksForList($list['id']);
                echo '<div class="list col-3 bg-primary">',
                        '<div class="title text-center border-bottom border-3 border-white">',
                            '<h2>'.$list['title'].'</h2>',
                            '<div id="DDContainer" class="btn-group dropleft">',
                                '<button class="btn btn-secondary dropdown-toggle" type="button" id="cardDD" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
                                    '<i class="fas fa-ellipsis-v"></i>',
                                '</button>',
                                '<div class="dropdown-menu" aria-labelledby="cardDD">',
                                    '<a class="dropdown-item" href="'.ROOT_URL.'pages/updateList.php?LID='.$list['id'].'&UID='.$listOwner['id'].'">Edit list</a>',
                                    '<a class="dropdown-item" href="'.ROOT_URL.'pages/deleteList.php?id='.$list['id'].'">Delete list</a>',
                                    '<div class="dropdown-divider"></div>',
                                    '<a class="dropdown-item" href="#">More information</a>',
                                '</div>',
                            '</div>',
                        '</div>',
                '<div class="task-container">',
                    '<ul class="task-list">';
                foreach ($tasksPerList as $task) {
                    echo '<div>',
                            '<li class="task">'.$task['task'].'</li>',
                                '<a class="text-white" href="'.ROOT_URL.'pages/deleteTask.php?id='.$task['id'].'"><i class="fas fa-trash-alt"></i></a>',
                        '</div>';
                }
                    echo '<li>',
                            '<a href="'.ROOT_URL.'pages/createTask.php?id='.$list['id'].'"><i class="fas fa-plus"></i> Add task</a>',
                        '</li>',
                    '</ul>',
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