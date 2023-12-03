<!DOCTYPE html>
<html lang="en">

<head>
    <!--
        Marc Galvez
        December 1, 2023
        Assignment 12 DBMS
        show.php
        Show data from the user table.
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
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
    <?php if (isset($_SESSION["tbName"])) { //If table exists show data
    ?>
        <div class="card mx-auto mt-5" style="width:25%">
            <h5 class="card-header text-center bg-info">Showing the data in <?php echo $_SESSION["tbName"]; ?> table.</h5>
            <div class="card-body">
                <?php
                $showQuery = "SELECT * FROM " . $_SESSION['tbName'];
                $result = $conn->query($showQuery);
                if ($result->num_rows > 0) { // Display table if query is valid
                ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // output data of each row

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["pword"]; ?></td>
                                    <td><?php echo $row["creation"]; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php

                } else { // Display error if query is invalid.
                ?>
                    <p>There is no data to display, please create a table or go to the Insert page.</p>
                <?php
                }

                PutButton("create", "Create new table");
                PutButton("insert", "Insert data inside the table");
                PutButton("clear", "Clear the table");
                PutButton("drop", "Drop the table");
                ?>
            </div>
        </div>
    <?php

    } else { // Redirect to create if table does not exist.
        WinAlert("The table has not been created, Re-Directing to the Create page.");
        redirect("create.php");
    }

    ?>
</body>

</html>