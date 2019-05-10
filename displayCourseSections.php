<?php
    include("config.php");
    include("ResultsProvider.php");
    if (isset($_GET["courseNum"])) {
        $courseNum = $_GET["courseNum"];
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
                        <h3>List of courses for <?php echo $courseNum ?></h3>
                    </div>
                    <div class="divider"></div>

                        <?php
                            $resultsProvider = new ResultsProvider($con);
                            echo $resultsProvider->getCourseSectionsHtml($courseNum);
                        ?>
                    
                </div>
            </div>

        </div>
    </body>
</html>