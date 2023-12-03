<!DOCTYPE html>
<html lang="en">

<head>
    <!--
        Marc Galvez
        December 1, 2023
        Assignment 12 DBMS
        drop.php
        Drop the user table.
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require("library.php") ?>
    <?php require("dbconnect.php") ?>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="create.php" title="Create the table">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="insert.php" title="Insert default data into the table">Insert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="show.php" title="Show data inside the table">Show</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clear.php" title="clear table">Clear</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="drop.php" title="Drop the table">Drop</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card mx-auto mt-5" style="width:25%" id="visit-container">
        <?php
        if (isset($_SESSION["tbName"])) { // Processes deletion of table if it exists
            $dropQuery = "DROP TABLE " . $_SESSION['tbName'];
            if ($conn->query($dropQuery) === TRUE) { // Deletes table if query is valid
        ?>
                <h5 class="card-header text-center bg-info">The <?php $_SESSION["tbName"]; ?> table has been dropped, please create a new table in the create page</h5>
            <?php
            } else { // Displays error message if query is invalid
            ?>
                <h5 class="card-header text-center bg-info">Error table could not be deleted. <?php $conn->error; ?></h5>
            <?php
            }
            // Destroy the session
            session_unset();
            session_destroy();
        } else { // Prompts user that there is no table to delete
            ?>
            <h5 class="card-header text-center bg-info">There is no table to delete, please create a new table.</h5>
        <?php
        }
        ?>
        <div class="card-body">
            <?php
            PutButton("create", "Create the table");
            PutButton("insert", "Insert default data into the table");
            PutButton("show", "Show data inside the table");
            PutButton("clear", "clear table");
            ?>
        </div>
    </div>
</body>

</html>