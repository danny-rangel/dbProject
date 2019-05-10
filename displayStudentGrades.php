<?php
    include("config.php");
    include("ResultsProvider.php");
    if (isset($_GET["courseNum"]) && isset($_GET["sectionNum"])) {
        $courseNum = $_GET["courseNum"];
        $sectionNum = $_GET["sectionNum"];
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
                        <h3>List of student grades for course number: <?php echo $courseNum . " and section number: " . $sectionNum ?> </h3>
                    </div>
                    <div class="divider"></div>

                        <?php
                            $resultsProvider = new ResultsProvider($con);
                            echo $resultsProvider->getProfessorStudentGradesHtml($courseNum, $sectionNum);
                        ?>

                </div>
            </div>

        </div>
    </body>
</html>