<!DOCTYPE html>
<html lang="en">

<head>
    <!--
        Marc Galvez
        December 1, 2023
        Assignment 12 DBMS
        clear.php
        Clear the user data from the table.
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clear</title>
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
    <div class="card mx-auto mt-5" style="width:25%">

        <?php
        // sql to delete a record
        $clearQuery = "DELETE FROM " . $_SESSION["tbName"] . " WHERE username='Mr. Smith'";
        if (isset($_SESSION["tbName"])) {
            if ($conn->query($clearQuery) === TRUE) {
        ?>
                <h5 class="card-header text-center bg-info">Data deleted successfully</h5>

            <?php
            } else {
            ?>
                <h5 class="card-header text-center bg-info">Error deleting data: <?php echo $conn->error; ?></h5>
            <?php
            }
        } else {
            ?>
            <h5 class="card-header text-center bg-info">The table has not been created, please register at the Create Page</h5>
        <?php
        }
        ?>
        <div class="card-body">
            <?php
            PutButton("create", "Create the table");
            PutButton("insert", "Insert default data into the table");
            PutButton("show", "Show data inside the table");
            PutButton("drop", "Drop the table");
            ?>
        </div>
    </div>
</body>

</html>