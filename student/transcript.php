<?php


global $db;
$student = $_SESSION['student_id'];
$get_semesters = "SELECT DISTINCT year, period FROM semesters WHERE studentId=$student AND year BETWEEN '2019-2020' AND '2022-2023' AND period IN ('Fall', 'Spring') ORDER BY year, period ASC";
$run_semesters = mysqli_query($db, $get_semesters);

if (mysqli_num_rows($run_semesters) > 0) {
    $cumulativeCredits = 0;
    $cumulativeGradePoints = 0;

    while ($row_semester = mysqli_fetch_array($run_semesters)) {
        $year = $row_semester['year'];
        $period = $row_semester['period'];

        echo "
    <table class='table table-hover bg-light table-borderless mt-3'>
    <thead>
      <tr class='table-success'>
        <th class='text-center table-header' colspan='9'>$period $year</th>
      </tr>
    </thead>
    <tbody class='table-group-divider'>
      <tr class='table-secondary'>
        <th scope='col'>R</th>
        <th scope='col'>Cat</th>
        <th scope='col'>Code</th>
        <th scope='col'>Name(EN)</th>
        <th scope='col'>Name(TR)</th>
        <th scope='col'>Credits</th>
        <th scope='col'>ECTS</th>
        <th scope='col'>Lecturer</th>
        <th scope='col'>Grade</th>
      </tr>
    ";

        $get_courses = "SELECT semesters.*, courses.* FROM semesters INNER JOIN courses ON semesters.course_code = courses.course_code WHERE semesters.studentId = $student AND semesters.year = '$year' AND semesters.period = '$period'";
        $run_courses = mysqli_query($db, $get_courses);

        $totalCredits = 0;
        $totalGradePoints = 0;

        while ($row_course = mysqli_fetch_array($run_courses)) {



            $category = $row_course['category'];
            $code = $row_course['course_code'];
            $name_en = $row_course['courseName_en'];
            $name_tr = $row_course['courseName_tr'];
            $credits = $row_course['credits'];
            $ects = $row_course['ects'];
            $lecturer = $row_course['lecturer'];
            $grade = $row_course['grade'];


            $get_count = "SELECT COUNT(*) AS count FROM semesters WHERE studentId = $student and course_code='$code'";
            $run_count = mysqli_query($db, $get_count);
            $row_count = mysqli_fetch_array($run_count);
            $count = $row_count['count'];

            $gradePoints = calculateGradePoints($grade, $credits);
            $totalCredits += $credits;
            $totalGradePoints += $gradePoints;

            $semesterGPA = $totalGradePoints / $totalCredits;
            $formattedGPA = number_format($semesterGPA, 2);

            $cumulativeCredits += $credits;
            $cumulativeGradePoints += $gradePoints;

            $cgpa = $cumulativeGradePoints / $cumulativeCredits;
            $formattedCGPA = number_format($cgpa, 2);

            echo "
      <tr>
        <td scope='row'>$count</td>
        <td scope='row'>$category</td>
        <td scope='row'>$code</td>
        <td scope='row'>$name_en</td>
        <td scope='row'>$name_tr</td>
        <td scope='row'>$credits</td>
        <td scope='row'>$ects</td>
        <td scope='row'>$lecturer</td>
        <td scope='row'>$grade</td>
      </tr>
      
      
      ";
        }
        echo " 
            </tbody>
            <tfoot>
            <tr>
              <th class='text-end' colspan='7'> GPA: </th>
              <th > $formattedGPA </th>
            </tr>
            <tr>
              <th class='text-end' colspan='7'> CGPA: </th>
              <th > $formattedCGPA </th>
            </tr>
              
            </tfoot>
          </table>";
    }
} else {
    echo "<div class='card mt-4'>
  <div class='card-body p-4'>
    <h5 class='text-center'> No semesters found </h5>
  </div>
</div>";
}
