<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$id = $_GET['id'];
?>
    <title>Details of 'List Title'</title>
    </head>
    <body>
<?php
require ROOT_DIR."/includes/nav_bar.php";
?>
    <div id="main-container" class="more-height container border border-top-0 border-white">
        <div class="title text-white text-center border-bottom border-3 border-white">
            <h2>List Title</h2>
        </div>

        <table id="table">
            <tr>
                <th>Task name</th>
                <th>Task Duration</th>
                <th class="action">Actions</th>
            </tr>

            <tr>
                <td>Lijsten toevoegen</td>
                <td>17h 20m 50s</td>
                <td class="text-center"><a class="text-white" href="updateTask.php?id=1"><i id="action-pen" class="fas fa-pen"></i></a>   <a class="text-white" href="deleteTask.php?id=1"><i id="action-can" class="fas fa-trash-alt"></i></a></td>
            </tr>

            <tr>
                <td>Lijsten verwijderen</td>
                <td>5h 36m 22s</td>
                <td class="text-center"><a class="text-white" href="updateTask.php?id=1"><i id="action-pen" class="fas fa-pen"></i></a>   <a class="text-white" href="deleteTask.php?id=1"><i id="action-can" class="fas fa-trash-alt"></i></a></td>
            </tr>

            <tr>
                <td>Lijsten bewerken</td>
                <td>1h 30m 49s</td>
                <td class="text-center"><a class="text-white" href="updateTask.php?id=1"><i id="action-pen" class="fas fa-pen"></i></a>   <a class="text-white" href="deleteTask.php?id=1"><i id="action-can" class="fas fa-trash-alt"></i></a></td>
            </tr>

            <tr>
                <td>Lijsten stylen</td>
                <td>9h 45m 15s</td>
                <td class="text-center"><a class="text-white" href="updateTask.php?id=1"><i id="action-pen" class="fas fa-pen"></i></a>   <a class="text-white" href="deleteTask.php?id=1"><i id="action-can" class="fas fa-trash-alt"></i></a></td>
            </tr>

            <tr>
                <td>Lijsten verplaatsen</td>
                <td>10h 30m 10s</td>
                <td class="text-center"><a class="text-white" href="updateTask.php?id=1"><i id="action-pen" class="fas fa-pen"></i></a>   <a class="text-white" href="deleteTask.php?id=1"><i id="action-can" class="fas fa-trash-alt"></i></a></td>
            </tr>
        </table>
    </div>
<?php
require ROOT_DIR."/includes/footer.php";
?>