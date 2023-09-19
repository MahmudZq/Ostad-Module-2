<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatiable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Series Using Function</title>
    <style>
    * {
        font-size: 1.0em;
    }

    h2.FibonacciSeriesPrinting-top {
        width: 400px;
        text-align: center;
        border: 0.2em;
        border-color: grey;
        border-radius: 0%;
        background-color: black;
        color: white;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 900;
        font-size: xx-large;
    }


    p.FibonacciSeriesPrinting-error {
        background-color: yellow;
        color: red;
        width: 40%;
        text-align: center;
        border: 0.2em;
        border-color: bisque;
        border-radius: 0%;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 700;
        position: relative;
        left: 30%;
    }

    p.FibonacciSeriesPrinting-result {
        width: 40%;
        text-align: center;
        border: 0.2em;
        border-color: bisque;
        border-radius: 0%;
        background-color: rgb(232, 232, 199);
        color: rgb(0, 0, 0);
        font-family: 'Courier New', Courier, monospace;
        font-weight: 700;
        position: relative;
        left: 30%;
    }


    h2.FibonacciSeriesPrinting-bottom {
        width: 50%;
        text-align: center;
        border: 0.2em;
        border-color: balck;
        border-radius: 0%;
        background-color: #222222;
        color: lightgreen;
        font-family: 'Courier New', Courier, monospace;
        font-weight: 600;
    }
    </style>
</head>

<body>
    <?php
    function FibonacciSeriesPrinting($terms=15){
        $old = 0;
        $new = 1;
        $start = 1;
        for($i=$start;$i<=$terms;$i++){
            echo "<p class='FibonacciSeriesPrinting-result'>{$old}\t</p>";
            $_temp = $old + $new;
            $old = $new;
            $new = $_temp;
        }
        
    }
    ?>
    <center>

        <a href="http://localhost/Ostad-Module-2-main/Ostad-Module-2-main/4_Fibonacci_Series_printing_using_Function.php"
            style="text-decoration:none;cursor: pointer;">
            <h2 class=" FibonacciSeriesPrinting-top">Fibonacci Series Using Function</h2>
        </a><br>
    </center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table border="0" align="center">
            <tr>
                <td>Number of Fibonacci Terms</td>
                <td> <input type="number" name="terms" placeholder="Example: 15" label="Input box for total terms Value"
                        required>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th colspan="2">
                    <button
                        style="  background-color: burlywood;border-color:burlywood; border-radius:5%;box-shadow: 0 2px 4px darkslategray;cursor: pointer; "
                        title="Click to generate Fibonacci Terms">Generate Fibonacci Terms</button>

                </th>
            </tr>
        </table>
    </form>

    <table border="0" align="center">
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2"> <a
                    href="http://localhost/Ostad-Module-2-main/Ostad-Module-2-main/4_Fibonacci_Series_printing_using_Function.php"
                    style="text-decoration:none;cursor: pointer;">
                    <input type="button" value="Reset All" ;
                        style="  border-color:#000000; border-radius:4%;box-shadow: 0 2px 4px darkslategray;cursor: pointer;color:greenyellow;background-color:#222222"
                        title="Click to Reset all Values"></button>
                </a></th>
        </tr>
    </table>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Grab data from inputs
        $terms = filter_input(INPUT_POST, "terms", FILTER_SANITIZE_NUMBER_FLOAT);


        //Error handler
        $errors = false;


        // Checking if the input value data type is number
        if (!is_numeric($terms)) {
            echo "<p class='FibonacciSeriesPrinting-error'>Only insert numbers!</p>";
            $errors = true;
        }

        // Checking if the input is not left empty
        if (empty($terms)) {
            echo "<p class='FibonacciSeriesPrinting-error'>Invalid Input!</p>";
            $errors = true;
        }

        /**Fibonacci Series function runs with the provided data if there is no errors */

        FibonacciSeriesPrinting($terms);
    }
  
    ?>
    <center>
        <br>
        <h2 class="FibonacciSeriesPrinting-bottom">Coded by <a href="https://mahmudrayhan.com"
                style="text-decoration:none; color:lightgreen;">Mahmud Rayhan</a> for <a href="https://ostad.app/"
                style="text-decoration:none; color:lightgreen;"> Ostad</a> Module-2 {Task - 4}</h2><br>
    </center>
</body>

</html>