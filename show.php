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
    <?php if (isset($_SESSION["tbName"])) { ?>
        <div class="card mx-auto mt-5" style="width:25%">
            <h5 class="card-header text-center bg-info">Showing the data in <?php echo $_SESSION["tbName"]; ?> table.</h5>
            <?php
            $showQuery = "SELECT username, pword, creation FROM " . $_SESSION['tbName'];
            $result = $conn->query($showQuery);
            if ($result->num_rows > 0) {
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
                                <td><?php $row["username"]; ?></td>
                                <td><?php $row["pword"]; ?></td>
                                <td><?php $row["creation"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            <?php
            } else {
                echo "0 results";
            }
            ?>

        </div>
    <?php }
    //. " WHERE pword = '" . md5('noword') . "'"
    ?>
</body>

</html>