<?php
require "includes/datalayer.php";

$lists = getAllLists();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>