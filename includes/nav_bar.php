<header class="w-100 position-fixed fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="<?=ROOT_URL?>index.php">To-Do List</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="mr-auto navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=ROOT_URL?>pages/createList.php">Lijst toevoegen</a>
<!--                    <a class="nav-link" href="../pages/createList.php">Lijst toevoegen</a>-->
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>