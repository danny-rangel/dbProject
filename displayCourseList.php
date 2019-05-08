<?php
    include("config.php");
    if (isset($_GET["ssn"])) {
        $ssn = $_GET["ssn"];
    } else {
        exit("You must enter a search term!");
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DB Project</title>
        <link rel="stylesheet" type="text/css" href="assets/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">

            <div class="headerSection">
                <a href="index.html">
                    <h1>University Database</h1>
                </a>
            </div>

            <div class="mainDataSection">
                <div class="dataContainer">
                    <div class="label">
                        <h3>List of courses for <?php echo $ssn ?></h3>
                    </div>
                    <div class="divider"></div>
                    
                    <table class="dataTable">
                        <tr>
                            <td class="dataLabel">Class</td>
                            <td class="dataLabel">Room</td>
                            <td class="dataLabel">Meeting Days</td>
                            <td class="dataLabel">Time</td>
                        </tr>
                        <tr>
                            <td>CS 440</td>
                            <td>CPSC 101</td>
                            <td>MW</td>
                            <td>08:00-10:00</td>
                        </tr>
                        <tr>
                            <td>CS 315</td>
                            <td>CPSC 102</td>
                            <td>TH</td>
                            <td>19:00-21:00</td>
                        </tr>
                        <tr>
                            <td>CS 351</td>
                            <td>CPSC 301</td>
                            <td>MWF</td>
                            <td>12:00-14:00</td>
                        </tr>
                    </table>
                    
                </div>
            </div>

        </div>
    </body>
</html>