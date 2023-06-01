<?php
session_start();
include("../includes/db.php");
include("semester.php");

global $con;
$student = $_SESSION['student'];
$courses = "SELECT * FROM courses WHERE NOT EXISTS ( SELECT 1 FROM semesters WHERE semesters.course_code = courses.course_code and semesters.studentId=$student );";
$run_query = mysqli_query($con, $courses);

$options = "";

if (mysqli_num_rows($run_query) > 0) {
    while ($row = mysqli_fetch_assoc($run_query)) {
        $options .= "<option value='" . $row["course_code"] . "'>" . $row["course_code"] . "-" . $row["courseName_en"] . "</option>";
    }
}
mysqli_close($con);

echo $options;
