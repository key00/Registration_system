<?php

$db = mysqli_connect("localhost", "root", "", "registration_system");


function getCourses()
{

    global $db;
    $get_courses = "select * from courses";
    $run_courses = mysqli_query($db, $get_courses);

    while ($row_courses = mysqli_fetch_array($run_courses)) {
        $category = $row_courses['category'];
        $code = $row_courses['course_code'];
        $name_en = $row_courses['courseName_en'];
        $name_tr = $row_courses['courseName_tr'];
        $credits = $row_courses['credits'];
        $ects = $row_courses['ects'];
        $pre_req = $row_courses['pre-requisite'];

        echo "

            <tr>
              <td scope='row'>$category</td>
              <td scope='row'>$code</td>
              <td scope='row'>$name_en</td>
              <td scope='row'>$name_tr</td>
              <td scope='row'>$credits</td>
              <td scope='row'>$ects</td>
              <td scope='row'>$pre_req</td>
            </tr>
        
        ";
    }
}

function getSemester()
{

    global $db;
    $get_courses = "select * from courses";
    $run_courses = mysqli_query($db, $get_courses);

    while ($row_courses = mysqli_fetch_array($run_courses)) {
        $category = $row_courses['category'];
        $code = $row_courses['course_code'];
        $name_en = $row_courses['courseName_en'];
        $name_tr = $row_courses['courseName_tr'];
        $credits = $row_courses['credits'];
        $ects = $row_courses['ects'];
        $lecturer = $row_courses['lecturer'];


        echo "

            <tr>
              <td scope='row'>$category</td>
              <td scope='row'>$code</td>
              <td scope='row'>$name_en</td>
              <td scope='row'>$name_tr</td>
              <td scope='row'>$credits</td>
              <td scope='row'>$ects</td>
              <td scope='row'>$lecturer</td>
              <td scope='row'></td>
            </tr>
        
        ";
    }
}


function getGrades()
{
    global $db;
    $studentId = $_SESSION['username'];
    $get_grades = "select * from grades where studentId=$studentId";
    $run_grades = mysqli_query($db, $get_grades);
    while ($row_grades = mysqli_fetch_array($run_grades)) {
        $course = $row_grades['course_code'];
        $year = $row_grades['year'];
        $semester = $row_grades['semester'];
        $grade = $row_grades['grade'];
        $get_course = "select * from courses where course_code='$course'";
        $run_course = mysqli_query($db, $get_course);
        $row_course = mysqli_fetch_array($run_course);
        $en_name = $row_course['courseName_en'];
        $tr_name = $row_course['courseName_tr'];
        $credit = $row_course['credits'];

        echo "
        <tr>
        <td scope='row'>YEAR $year</td>
        <td scope='row'>$semester</td>
        <td scope='row'>$course</td>
        <td scope='row'>$en_name</td>
        <td scope='row'>$tr_name</td>
        <td scope='row'>$credit</td>
        <td scope='row'>$grade</td>
        
      </tr>

        ";
    }
}
