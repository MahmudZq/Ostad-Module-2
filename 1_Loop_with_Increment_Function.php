<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatiable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop with Increament Function</title>
    <style>
    * {
        font-size: 1.0em;
    }

    h2.IncreamentFunction-top {
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


    p.IncreamentFunction-error {
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

    p.IncreamentFunction-result {
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

    h2.IncreamentFunction-bottom {
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
    function forLoop($start,$end,$step){
        for($i=$start;$i<=$end;$i+=$step){
            echo "<p class='IncreamentFunction-result'>{$i}\t</p>";
        }
        
    }
    function whileLoop($start, $end, $step)
    {
        $i = $start;
        while ($i <= $end) {
            echo "<p class='IncreamentFunction-result'>{$i}\t</p>";
            $i += $step;
        }
    }
    function doWhileLoop($start, $end, $step){
        $i=$start;
        do{
            echo "<p class='IncreamentFunction-result'>{$i}\t</p>";
            $i += $step;         
        }
        while($i<=$end);
    }
    ?>
    <center>

        <a href="http://localhost/Ostad-Module-2-main/Ostad-Module-2-main/1_Loop_with_Increment_Function.php"
            style="text-decoration:none;cursor: pointer;">
            <h2 class=" IncreamentFunction-top">Loop
                with Increament Function</h2>
        </a><br>
    </center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table border="0" align="center">
            <tr>
                <td>Start Value</td>
                <td> <input type="number" name="start" placeholder="Insert Start Value"
                        label="Input box for Start Value" required></td>
            </tr>
            <tr>
                <td>End Value</td>
                <td> <input type="number" name="end" placeholder="Insert End Value" label="Input box for End Value"
                        required></td>
            </tr>

            <tr>
                <td>Step</td>
                <td><input type="number" name="step" placeholder="Insert Step Value" label="Input box for Step Value"
                        required></td>
            </tr>
            <tr>
                <td>Select Loop</td>
                <td><select name="loop">
                        <option value="for">For Loop</option>
                        <option value="while">While Loop</option>
                        <option value="doWhile">Do While Loop</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th colspan="2"> <button
                        style="  background-color: burlywood;border-color:burlywood; border-radius:5%;box-shadow: 0 2px 4px darkslategray;cursor: pointer; "
                        title="Click to generate loop values">Generate Loop Values</button></th>
            </tr>
        </table>
    </form>

    <table border="0" align="center">
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th colspan="2"><a
                    href="http://localhost/Ostad-Module-2-main/Ostad-Module-2-main/1_Loop_with_Increment_Function.php"
                    style="text-decoration:none;cursor: pointer;">
                    <input type="button" value="Reset All" ; style=" border-color:#000000; border-radius:4%;box-shadow: 0 2px 4px darkslategray;cursor:
                        pointer;color:greenyellow;background-color:#222222" title="Click to Reset all Values"></button>
                </a> </th>
        </tr>
    </table>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Grab data from inputs
        $start = filter_input(INPUT_POST, "start", FILTER_SANITIZE_NUMBER_FLOAT);
        $end = filter_input(INPUT_POST, "end", FILTER_SANITIZE_NUMBER_FLOAT);
        $step = filter_input(INPUT_POST, "step", FILTER_SANITIZE_NUMBER_FLOAT);
        $loop = htmlspecialchars($_POST["loop"]);


        //Error handler
        $errors = false;


        // Checking if the input value data type is number
        if (!is_numeric($start) || !is_numeric($end) || !is_numeric($step)) {
            echo "<p class='IncreamentFunction-error'>Only insert numbers!</p>";
            $errors = true;
        }

        // Checking if the input is not left empty
        if (empty($start) || empty($end) || empty($step)) {
            echo "<p class='IncreamentFunction-error'>Invalid Input!</p>";
            $errors = true;
        }
        // Checking if the Start value is not larger than End Value
        if ($start > $end) {
        echo "<p class='IncreamentFunction-error'>Invalid Input!<br>START Value can not be larger than END value.</p>";
        $errors = true;
        }



        // Increament Function runs the provided data if there is no errors

        
        switch ($loop) {
            case "for":
                forLoop($start, $end, $step);
                break;
            case "while":
                whileLoop($start, $end, $step);
                break;
            case "doWhile":
                doWhileLoop($start, $end, $step);
                break;
            default:
                echo "<p class='IncreamentFunction-result'>Something Went Wrong!</p>";
        }
    }

    ?>
    <center>
        <br>
        <h2 class="IncreamentFunction-bottom">Coded by <a href="https://mahmudrayhan.com"
                style="text-decoration:none; color:lightgreen;">Mahmud Rayhan</a> for <a href="https://ostad.app/"
                style="text-decoration:none; color:lightgreen;"> Ostad</a> Module-2 {Task - 1}</h2><br>
    </center>
</body>

</html>
