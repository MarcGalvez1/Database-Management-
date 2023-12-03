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
    <div class="card mx-auto mt-5" style="width:25%" id="visit-container">
        <?php
        if (isset($_SESSION["tbName"])) {
            $dropQuery = "DROP TABLE " . $_SESSION['tbName'];
            if ($conn->query($dropQuery) === TRUE) {
        ?>
                <h5 class="card-header text-center bg-info">The <?php $_SESSION["tbName"]; ?> table has been dropped, please create a new table in the create page</h5>
            <?php
            } else {
            ?>
                <h5 class="card-header text-center bg-info">Error table could not be deleted. <?php $conn->error; ?></h5>
            <?php
            }
            session_unset();
            session_destroy();
        } else {
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
            PutButton("drop", "Drop the table");
            ?>
        </div>
    </div>
</body>

</html>