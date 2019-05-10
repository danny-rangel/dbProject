<?php

class ResultsProvider {
    
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }


    public function getProfessorCoursesHtml($ssn) {
        $query = $this->con->prepare("SELECT title, classroom, meeting_days, start_time, end_time 
                                        FROM course_sections
                                        NATURAL JOIN taught_by
                                        NATURAL JOIN courses
                                        WHERE social_security_number=:ssn");

        $query->bindParam(":ssn", $ssn);
        $query->execute();

        if($query->rowCount() > 0) {

            $resultsHtml = "<table class='dataTable'>
                            <tr>
                                <td class='dataMainLabel'>Title</td>
                                <td class='dataMainLabel'>Room</td>
                                <td class='dataMainLabel'>Meeting Days</td>
                                <td class='dataMainLabel'>Start Time</td>
                                <td class='dataMainLabel'>End Time</td>
                            </tr>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $title = $row["title"];
            $classroom = $row["classroom"];
            $meeting_days = $row["meeting_days"];
            $start_time = $row["start_time"];
            $end_time = $row["end_time"];

            $resultsHtml .= "<tr>
                                <td class='dataLabel'>$title</td>
                                <td class='dataLabel'>$classroom</td>
                                <td class='dataLabel'>$meeting_days</td>
                                <td class='dataLabel'>$start_time</td>
                                <td class='dataLabel'>$end_time</td>
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
            $query = $this->con->prepare("SELECT grade, count(distinct grade) 
                                            FROM enrollment_records
                                            WHERE course_number=:courseNum
                                            AND section_number=:sectionNum
                                            GROUP by grade");
    
            $query->bindParam(":courseNum", $courseNum);
            $query->bindParam(":sectionNum", $sectionNum);
            $query->execute();
    

            if($query->rowCount() > 0) {

                $resultsHtml = "<table class='dataTable'>
                                <tr>
                                    <td class='dataMainLabel'>Grade</td>
                                    <td class='dataMainLabel'>Count</td>
                                </tr>";

                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                    $grade = $row["grade"];
                    $count = $row["count(distinct grade)"];
        
                    $resultsHtml .= "<tr>
                                        <td class='dataLabel'>$grade</td>
                                        <td class='dataLabel'>$count</td>
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
            $query = $this->con->prepare("SELECT section_number, classroom, meeting_days, start_time, end_time, count(distinct cwid) 
                                            FROM course_sections
                                            NATURAL JOIN enrollment_records
                                            WHERE course_number=:courseNum
                                            GROUP BY section_number");
    
            $query->bindParam(":courseNum", $courseNum);
            $query->execute();
    
            if($query->rowCount() > 0) {
    
                $resultsHtml = "<table class='dataTable'>
                                <tr>
                                    <td class='dataMainLabel'>Section No.</td>
                                    <td class='dataMainLabel'>Room</td>
                                    <td class='dataMainLabel'>Meeting Days</td>
                                    <td class='dataMainLabel'>Start Time</td>
                                    <td class='dataMainLabel'>End Time</td>
                                    <td class='dataMainLabel'># of Enrolled Students</td>
                                </tr>";
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                $section_number = $row["section_number"];
                $classroom = $row["classroom"];
                $meeting_days = $row["meeting_days"];
                $start_time = $row["start_time"];
                $end_time = $row["end_time"];
                $count = $row["count(distinct cwid)"];
    
                $resultsHtml .= "<tr>
                                    <td class='dataLabel'>$section_number</td>
                                    <td class='dataLabel'>$classroom</td>
                                    <td class='dataLabel'>$meeting_days</td>
                                    <td class='dataLabel'>$start_time</td>
                                    <td class='dataLabel'>$end_time</td>
                                    <td class='dataLabel'>$count</td>
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
            $query = $this->con->prepare("SELECT section_number, course_number, title, grade 
                                            FROM enrollment_records
                                            NATURAL JOIN courses
                                            WHERE cwid=:cwid");
    
            $query->bindParam(":cwid", $cwid);
            $query->execute();
    
            if($query->rowCount() > 0) {
    
                $resultsHtml = "<table class='dataTable'>
                                <tr>
                                    <td class='dataMainLabel'>Section No.</td>
                                    <td class='dataMainLabel'>Course No.</td>
                                    <td class='dataMainLabel'>Title</td>
                                    <td class='dataMainLabel'>Grade</td>
                                </tr>";
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                $section_number = $row["section_number"];
                $course_number = $row["course_number"];
                $title = $row["title"];
                $grade = $row["grade"];
    
                $resultsHtml .= "<tr>
                                    <td class='dataLabel'>$section_number</td>
                                    <td class='dataLabel'>$course_number</td>
                                    <td class='dataLabel'>$title</td>
                                    <td class='dataLabel'>$grade</td>
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