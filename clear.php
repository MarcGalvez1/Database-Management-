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