<?php
require "../includes/datalayer.php";
require ROOT_DIR."/includes/header.php";

$maxTasks = 5;
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
        <form onload="createStart();">
            <div class="form-row justify-content-around text-white pt-3 pb-2">
                <div class="form-group col-md-5">
                    <label for="inputEmail4">Naam</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Naam van de lijst">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option id="test" selected>------------------------ Maak uw keuze ------------------------</option>
                        <?php
                            for ($i = 1; $i <= $maxTasks; $i++) {
                                echo '<option>'.$i.'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div id="task-container" class="form-row text-white justify-content-center"></div>
            <div id="submit" class="form-row text-white justify-content-center">
                <div class="form-group col-md-11 text-right">
                    <button type="submit" class="btn btn-outline-light col-md-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../resources/js/script.js"></script>
<?php
require ROOT_DIR."/includes/footer.php";
?>