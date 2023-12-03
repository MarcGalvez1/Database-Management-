<!DOCTYPE html>
<html lang="en">

<head>
    <!--
        Marc Galvez
        December 1, 2023
        Assignment 12 DBMS
        insert.php
        Insert data into user table
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require("library.php") ?>
    <?php require("dbconnect.php") ?>
</head>

<body class="bg-dark">
    <div class="card mx-auto mt-5" style="width:25%">
        <?php
        $newUsername = "Mr. Smith";
        $newPassword = "noword";
        // insert Mr. Smith's data into the user table
        $checkQuery = "SELECT * FROM " . $_SESSION["tbName"] . " WHERE username = '$newUsername'";
        $checkResult = $conn->query($checkQuery);
        $insertQuery = "INSERT INTO " . $_SESSION["tbName"] . " (username, pword)
            VALUES ('Mr. Smith', 'noword')";
        if ($checkResult->num_rows == 0) {
            $insertQuery = "INSERT INTO " . $_SESSION["tbName"] . " (username, pword)
        VALUES ('$newUsername', '$newPassword')";
            if ($conn->query($insertQuery) === TRUE) {
        ?>
                <h5 class="card-header text-center bg-info">The default data has been inserted, Please go to these pages for any other actions.</h5>
                <div class="card-body">
                    <?php
                    PutButton("create", "Create new table");
                    PutButton("show", "Show data inside the table");
                    PutButton("clear", "Clear the table");
                    PutButton("drop", "Drop the table");
                    ?>
                </div>
            <?php
            } else {
            ?>
                <h5 class="card-header text-center bg-info">Unable to insert the data into <?php $_SESSION["tbName"] ?> </h5>
                <p class="card-body">Unable to connect to the data base please come back later.</p>
            <?php
            }
        } else {
            ?>
            <h5 class="card-header text-center bg-info">The default data has been inserted, Please go to these pages for any other actions.</h5>
            <div class="card-body">
                <?php
                PutButton("create", "Create new table");
                PutButton("show", "Show data inside the table");
                PutButton("clear", "Clear the table");
                PutButton("drop", "Drop the table");
                ?>
            </div>
        <?php
        }

        ?>
    </div>
</body>

</html>