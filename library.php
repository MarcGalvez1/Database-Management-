<!DOCTYPE html>
<html lang="en">
<?php
session_start()
?>

<head>
    <!--
        Marc Galvez
        Assignment 9 functions/library
        October 29, 2023

        This library is for all functions I have made so far and will later use.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    function Greeting($name = 'User')
    {
        // Creates a greeting
        print "<h1 class='text-light text-center'>Hello, " . $name . "!</h1>";
    }

    function Salutation($name = "Please return")
    {
        // Says Goodbye
        print "<h1 class='text-light text-center'>Goodbye, " . $name . "!</h1>";
    }

    function Put2InputForm($formName = 'Default', $label1 = 'num1', $id1 = 'num1', $placeholder1 = 'Type a number EX:10', $label2 = 'num2', $id2 = 'num2', $placeholder2 = 'Type a number EX:10', $btn1 = 'Reset', $btn2 = 'Calculate')
    {
        // Create a 2 input form
        print <<<HERE
            <div class="card mx-auto mt-5" style="width:25%">
                <h5 class="card-header text-center bg-info">$formName</h5>
                <form method='post' class='mx-2' action='{$_SERVER['PHP_SELF']}'>
                    <label for="$id1" class="form-label">$label1</label>
                    <input type="text" class="form-control" id="$id1" name="$id1" placeholder="$placeholder1" required>
                    <label for="$id2" class="form-label">$label2</label>
                    <input type="text" class="form-control" id="$id2" name="$id2" placeholder="$placeholder2" required>
                    <div class="grid row mx-auto">
                        <button type="Reset" class="btn btn-primary my-2 col me-2">$btn1</button>
                        <button type="submit" class="btn btn-primary my-2 ms-2 col">$btn2</button>
                    </div>
                </form>
            </div>
        HERE;
    }

    function DisplayResult($num1, $num2)
    {
        // Display the results
        $total = Add2Nums($num1, $num2);
        $totalFormatted = number_format($total, 1, '.', '');
        print '<div class="card mx-auto mt-5" style="width:25%">';
        print '<h5 class="card-header text-center bg-info">Results</h5>';
        print '<div class="card-body">';
        print '<p class="text-start">The url above is clean</p>';
        print '<p class="text-start">num1: ' . $num1 . '</p>';
        print '<p class="text-start">num2: ' . $num2 . '</p>';
        print '<h6 class="text-center">The total is: ' . $totalFormatted . ' </h6>';
        Reload();
        print '</div>';
        print '</div>';
    }

    function Add2Nums($num1, $num2)
    {
        // Adds 2 numbers
        return ($num1 + $num2);
    }

    function ValidateNumeric($num1, $num2)
    {
        // Validates that inputs are numeric only
        if ((is_numeric($num1) and is_numeric($num2))) {
            $isNumeric = true;
        } else {
            $isNumeric = false;
            WinAlert("Please enter numeric characters only.");
            print "<h1 class='text-light text-center'>Return to form. <h1>";
            Reload();
        }
        return ($isNumeric);
    }

    function Sanitization($data)
    {
        // Cleans the form from malicious code.
        // strip unnescarry spaces
        // strip slashes
        // strip html characters like <>
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    };


    function Reload()
    {
        // re-load the form
        print '<a href= "" class="grid row mx-auto"><button type="Reset" class="btn btn-primary my-2">Reset</button> </a>';
    }

    function WinAlert($msg)
    {
        // display an error message
        print "<script> window.alert('" . $msg . "'); </script>";
    }

    function PutButton($btnName, $desc = "")
    {
        // display buttons


        print('<a title=" ' . $desc . '" class="row col-auto mt-2" href="' . $btnName . '.php"> <button class="btn btn-primary "> Page ' . ucfirst($btnName) . '</button> </a>');
    }

    function PutMsg($fileName, $message = "The File has been successfully created")
    {
        // Display message in cards
        print <<<HERE
            <h5 class="card-header text-center bg-info">$fileName</h5>
            <div class="card-body">
                <p>$message</p>
                <a class="row col-auto mt-2" href="start.php"> <button class="btn btn-primary ">Start</button> </a>
            </div>
        HERE;
    }

    function redirect($where, $delay = 0)
    {
        // Redirect to a different page
        header("Refresh: $delay; URL = $where");
    }


    function ReturnToStart()
    {
        print <<< HERE
            <div class=" card mx-auto mt-5" style="width:25%">
                <h5 class="card-header text-center bg-info">No file is selected or exists, please return to start.</h5>
                <div class="card-body">
                    <a class="row col-auto mt-2" href="start.php"> <button class="btn btn-primary ">Start</button> </a>
                </div>
            </div>
        HERE;
    }

    function FileExist($path)
    {
        if (!file_exists($path)) {
            WinAlert("File does not exist. re-directing to start");
            redirect("start.php");
            return false;
        } else {
            return true;
        }
    }
    ?>


</html>