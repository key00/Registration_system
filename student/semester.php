<?php


global $db;
$student = $_SESSION['student_id'];
$get_semester = "select * from semesters where studentId=$student and year='2022-2023' and period='Spring'";
$run_semester = mysqli_query($db, $get_semester);


if (mysqli_num_rows($run_semester) > 0) {

  echo "
    <table class='table table-hover bg-light table-borderless mt-3'>
    <thead>
            <tr class='table-success'>
              <th class='text-center table-header' colspan='8'> Spring 2022-2023</th>
            </tr>

          </thead>
          <tbody class='table-group-divider'>
            <tr class='table-secondary'>
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

  $totalCredits = 0;
  $totalGradePoints = 0;

  while ($row_semester = mysqli_fetch_array($run_semester)) {

    $code = $row_semester['course_code'];
    $lecturerid = $row_semester['lecturer'];

    if (!is_null($lecturerid) and $lecturerid != 0) {
      $get_lecturer = "select * from academic where id='$lecturerid' and islecturer=1";
      $run_lecturer = mysqli_query($con, $get_lecturer);
      $row_lecturer = mysqli_fetch_array($run_lecturer);
      $lecturer = $row_lecturer['firstName'] . " " . $row_lecturer['lastName'];
    }

    $grade = $row_semester['grade'];
    $get_courses = "select * from courses where course_code='$code'";
    $run_courses = mysqli_query($db, $get_courses);
    $row_courses = mysqli_fetch_array($run_courses);
    $category = $row_courses['category'];
    $name_en = $row_courses['courseName_en'];
    $name_tr = $row_courses['courseName_tr'];
    $credits = $row_courses['credits'];
    $ects = $row_courses['ects'];

?>

    <tr>
      <td scope='row'><?= $category ?> </td>
      <td scope='row'><?= $code ?> </td>
      <td scope='row'><?= $name_en ?> </td>
      <td scope='row'><?= $name_tr ?> </td>
      <td scope='row'><?= $credits ?> </td>
      <td scope='row'><?= $ects ?> </td>
      <td scope='row'><?php if (!is_null($lecturerid) and $lecturerid != 0) echo $lecturer ?> </td>
      <td scope='row'><?= $grade ?> </td>
    </tr>


<?php
    $gradePoints = calculateGradePoints($grade, $credits);
    $totalCredits += $credits;
    $totalGradePoints += $gradePoints;

    $semesterGPA = $totalGradePoints / $totalCredits;
    $formattedGPA = number_format($semesterGPA, 2);
  }
  echo "
      <tfoot>
      <tr>
        <th class='text-end' colspan='7'> GPA: </th>
        <th > $formattedGPA </th>
      </tr>
      
        
      </tfoot>
      </tbody>
      </table>
      ";
} else {
  echo "<div class='card mt-4'>
    <div class='card-body p-4'>
      <h5 class='text-center'> Not available </h5>
    </div>
  </div>";
}
