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
        if (isset($_SESSION["tbName"])) {
            // Checks if the user has created the table
            $newUsername = "Mr. Smith";
            $newPassword = "noword";
            // insert Mr. Smith's data into the user table
            $checkQuery = "SELECT * FROM " . $_SESSION["tbName"] . " WHERE username = '$newUsername'";
            $checkResult = $conn->query($checkQuery);

            if ($checkResult->num_rows == 0) {
                // Inserts data into the table if it doesn't already exist
                $insertQuery = "INSERT INTO " . $_SESSION["tbName"] . " (username, pword)
                VALUES ('$newUsername', '$newPassword')";
                if ($conn->query($insertQuery) === TRUE) {
                    // Inserts data into table if query is valid
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
                // If the data already exists this shows up.
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
        } else {
            // if table doesn't exist redirect to create.php
            WinAlert("Please register yourself before doing any further actions, you will now be redirected to the create page.");
            redirect("create.php");
        }
        ?>
    </div>
</body>

</html>