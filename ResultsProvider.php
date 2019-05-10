<?php

class ResultsProvider {
    
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }


    public function getProfessorCoursesHtml($ssn) {
        $query = $this->con->prepare("SELECT Title, Classroom, Meeting_Days, Start_Time, End_Time 
                                        FROM Course_Section
                                        NATURAL JOIN Taught_By
                                        NATURAL JOIN Course
                                        WHERE Social_Security_Number=:ssn");

        $query->bindParam(":ssn", $ssn);
        $query->execute();

        if($query->rowCount() > 0) {

            $resultsHtml = "<table class='dataTable'>
                            <tr>
                                <td class='dataLabel'>Title</td>
                                <td class='dataLabel'>Room</td>
                                <td class='dataLabel'>Meeting Days</td>
                                <td class='dataLabel'>Start Time</td>
                                <td class='dataLabel'>End Time</td>
                            </tr>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $Title = $row["Title"];
            $Classroom = $row["Classroom"];
            $Meeting_Days = $row["Meeting_Days"];
            $Start_Time = $row["Start_Time"];
            $End_Time = $row["End_Time"];

            $resultsHtml .= "<tr>
                                <td>$Title</td>
                                <td>$Classroom</td>
                                <td>$Meeting_Days</td>
                                <td>$Start_Time</td>
                                <td>$End_Time</td>
                            </tr>";
        }

        $resultsHtml .= "</table>";

        return $resultsHtml;

        } else {

        $resultsHtml = "<h3>No results found</h3>";

        return $resultsHtml;
        }
    }



        public function getProfessorStudentGradesHtml($courseNum, $sectionNum) {
            $query = $this->con->prepare("SELECT Grade, count(distinct Grade) 
                                            FROM Enrollment_Record
                                            WHERE Course_No=:courseNum
                                            AND Section_No=:sectionNum
                                            GROUP by Grade");
    
            $query->bindParam(":courseNum", $courseNum);
            $query->bindParam(":sectionNum", $sectionNum);
            $query->execute();
    

            if($query->rowCount() > 0) {

                $resultsHtml = "<table class='dataTable'>
                                <tr>
                                    <td class='dataLabel'>Grade</td>
                                    <td class='dataLabel'>Count</td>
                                </tr>";

                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                    $Grade = $row["Grade"];
                    $count = $row["count(distinct Grade)"];
        
                    $resultsHtml .= "<tr>
                                        <td>$Grade</td>
                                        <td>$count</td>
                                    </tr>";
                }

                $resultsHtml .= "</table>";
        
                return $resultsHtml;
            } else {
                $resultsHtml = "<h3>No results found</h3>";

                return $resultsHtml;
            }
            
        }




        public function getCourseSectionsHtml($courseNum) {
            $query = $this->con->prepare("SELECT Section_No, Classroom, Meeting_Days, Start_Time, End_Time, count(distinct CWID) 
                                            FROM Course_Section
                                            NATURAL JOIN Enrollment_Record
                                            WHERE Course_No=:courseNum
                                            GROUP BY Section_No");
    
            $query->bindParam(":courseNum", $courseNum);
            $query->execute();
    
            if($query->rowCount() > 0) {
    
                $resultsHtml = "<table class='dataTable'>
                                <tr>
                                    <td class='dataLabel'>Section No.</td>
                                    <td class='dataLabel'>Room</td>
                                    <td class='dataLabel'>Meeting Days</td>
                                    <td class='dataLabel'>Start Time</td>
                                    <td class='dataLabel'>End Time</td>
                                    <td class='dataLabel'># of Enrolled Students</td>
                                </tr>";
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                $Section_No = $row["Section_No"];
                $Classroom = $row["Classroom"];
                $Meeting_Days = $row["Meeting_Days"];
                $Start_Time = $row["Start_Time"];
                $End_Time = $row["End_Time"];
                $count = $row["count(distinct CWID)"];
    
                $resultsHtml .= "<tr>
                                    <td>$Section_No</td>
                                    <td>$Classroom</td>
                                    <td>$Meeting_Days</td>
                                    <td>$Start_Time</td>
                                    <td>$End_Time</td>
                                    <td>$count</td>
                                </tr>";
            }
    
                $resultsHtml .= "</table>";
        
                return $resultsHtml;
    
            } else {
    
                $resultsHtml = "<h3>No results found</h3>";
        
                return $resultsHtml;
            }
        }









        public function getCourseHistoryHtml($cwid) {
            $query = $this->con->prepare("SELECT Section_No, Course_No, Title, Grade 
                                            FROM Enrollment_Record
                                            NATURAL JOIN Course
                                            WHERE CWID=:cwid");
    
            $query->bindParam(":cwid", $cwid);
            $query->execute();
    
            if($query->rowCount() > 0) {
    
                $resultsHtml = "<table class='dataTable'>
                                <tr>
                                    <td class='dataLabel'>Section No.</td>
                                    <td class='dataLabel'>Course No.</td>
                                    <td class='dataLabel'>Title</td>
                                    <td class='dataLabel'>Grade</td>
                                </tr>";
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                $Section_No = $row["Section_No"];
                $Course_No = $row["Course_No"];
                $Title = $row["Title"];
                $Grade = $row["Grade"];
    
                $resultsHtml .= "<tr>
                                    <td>$Section_No</td>
                                    <td>$Course_No</td>
                                    <td>$Title</td>
                                    <td>$Grade</td>
                                </tr>";
            }
    
                $resultsHtml .= "</table>";
        
                return $resultsHtml;
    
            } else {
    
                $resultsHtml = "<h3>No results found</h3>";
        
                return $resultsHtml;
            }
        }









}

?>