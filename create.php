<!DOCTYPE html>
<html lang="en">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "cpt238_assgn12dbms";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
?>

<head>
    <!--
        Marc Galvez
        December 1, 2023
        Assignment 12 DBMS
        create.php
        create a user table
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php require("library.php") ?>
</head>

<body class="bg-dark">
    <div class="card mx-auto mt-5" style="width:25%" id="create-container">
        <?php
        if (isset($_SESSION["tbName"])) {
        ?>
            <h5 class="card-header text-center bg-info"><?php echo $_SESSION["tbName"] ?> table has been created</h5>
            <div class="card-body">
                <?php
                PutButton("insert", "Insert default data into the table");
                PutButton("show", "Show data inside the table");
                PutButton("clear", "Clear the table");
                PutButton("drop", "Drop the table");
                ?>
            </div>
            <?php
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Sanitize table name 
                $tbName = Sanitization($_POST["usr-name"]);
                $_SESSION["tbName"] = $tbName;
                // sql to create table
                $createTable = "create table if not exists " . $tbName . "(
                username char(9) NOT NULL,
                pword VARCHAR(30) NOT NULL,
                creation DATE DEFAULT CURRENT_DATE NOT NULL,
                primary key (username)
            )";
                if ($conn->query($createTable) === TRUE) {
            ?>
                    <h5 class="card-header text-center bg-info"><?php echo $tbName ?> table has been created</h5>
                    <div class="card-body">
                        <?php
                        PutButton("insert", "Insert default data into the table");
                        PutButton("show", "Show data inside the table");
                        PutButton("clear", "Clear the table");
                        PutButton("drop", "Drop the table");
                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <h5 class="card-header text-center bg-info"><?php echo $tbName ?> ERROR creating table: <?php $conn->error; ?></h5>
                    <p class="card-body">The website is currently, down please come again later.</p>
                <?php
                }
                $conn->close();
            } else {
                ?>
                <h5 class="card-header text-center bg-info">Create Table</h5>
                <form method='post' class='mx-2'>
                    <label for="usr-name" class="form-label">What are your initials?</label>
                    <input type="text" class="form-control" id="usr-name" name="usr-name" placeholder="MG" required>
                    <div class="grid row mx-auto">
                        <button type="submit" class="btn btn-primary my-2 col">Submit</button>
                    </div>
                </form>
        <?php
            }
        }
        ?>


    </div>
</body>

</html>