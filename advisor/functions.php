<?php
require("../includes/db.php");


function get_info()
{
}

function get_semester()
{
}


function calculateGradePoints($grade, $credits)
{
  if ($grade == "AA") {
    $gradePoints = 4 * $credits;
  } elseif ($grade == "BA") {
    $gradePoints = 3.5 * $credits;
  } elseif ($grade == "BB") {
    $gradePoints = 3 * $credits;
  } elseif ($grade == "CB") {
    $gradePoints = 2.5 * $credits;
  } elseif ($grade == "CC") {
    $gradePoints = 2 * $credits;
  } elseif ($grade == "DC") {
    $gradePoints = 1.5 * $credits;
  } elseif ($grade == "DD") {
    $gradePoints = 1 * $credits;
  } else {
    $gradePoints = 0 * $credits;
  }
  return $gradePoints;
}

function get_all_semesters()
{
  global $con;
  if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);

    $get_semesters = "SELECT DISTINCT year, period FROM semesters WHERE studentId=$stdNumber AND year BETWEEN '2019-2020' AND '2022-2023' AND period IN ('Fall', 'Spring') ORDER BY year, period ASC";
    $run_semesters = mysqli_query($con, $get_semesters);

    if (mysqli_num_rows($run_semesters) > 0) {
      $cumulativeCredits = 0;
      $cumulativeGradePoints = 0;

      while ($row_semesters = mysqli_fetch_array($run_semesters)) {
        $year = $row_semesters['year'];
        $period = $row_semesters['period'];

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
        $run_courses = mysqli_query($con, $get_courses);

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
          $run_count = mysqli_query($con, $get_count);
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
  }
}

function get_credits()
{
  global $con;
  if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $credits = 0;
    $get_dep = "select * from students where studentId=$stdNumber";
    $run_dep = mysqli_query($con, $get_dep);
    $row_dep = mysqli_fetch_array($run_dep);
    $dep = $row_dep['dId'];

    $get_total = "select total_cred from departments where dId=$dep ";
    $run_total = mysqli_query($con, $get_total);
    $row_total = mysqli_fetch_array($run_total);
    $total = $row_total['total_cred'];

    // $get_credits = "select sum(credits) as total from (select courses.credits from courses right join semesters on semesters.course_code=courses.course_code where semesters.studentId=$student and semesters.grade !='') as disctint_course";
    $get_credits = "select sum(credits) as sum_credits from semesters where semesters.studentId=$student and semesters.grade !='' and semesters.grade!='NA' and semesters.grade!='FF';";
    $run_credits = mysqli_query($con, $get_credits);
    $row_credits = mysqli_fetch_array($run_credits);
    $credits += $row_credits['sum_credits'];
    $diff = $total - $credits;

    echo "
    <tr>
      <th scope='row'>Total Credits</th>
      <td>$total</td>
    </tr>
    <tr>
      <th scope='row'>Credits completed</th>
      <td>$credits</td>
    </tr>
    <tr>
      <th scope='row'>Credits left</th>
      <td>$diff</td>
    </tr>  
  ";
  }
}

function get_courses_left()
{
  global $con;
  if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $get_dep = "select * from students where studentId=$stdNumber";
    $run_dep = mysqli_query($con, $get_dep);
    $row_dep = mysqli_fetch_array($run_dep);
    $dep = $row_dep['dId'];

    $get_courses = "select * from courses left join semesters on semesters.course_code=courses.course_code where semesters.course_code is null and courses.dId=$dep";
    $run_courses = mysqli_query($con, $get_courses);

    if (mysqli_num_rows($run_courses) > 0) {
      echo "
                <table class='table table-hover bg-light table-borderless mt-3'>
                <thead>
                        <tr class='table-success'>
                        <th class='text-center table-header' colspan='7'> Courses left </th>
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
                        <th scope='col'>Pre-requisite</th>
                        </tr>
                ";
      while ($row_courses = mysqli_fetch_array($run_courses)) {
        $category = $row_courses['category'];
        $code = $row_courses['course_code'];
        $name_en = $row_courses['courseName_en'];
        $name_tr = $row_courses['courseName_tr'];
        $ects = $row_courses['ects'];
        $credits = $row_courses['credits'];
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
    } else {
      echo "
                    <div class='card mt-4'>
                    <div class='card-body p-4'>
                    <h5 class='text-center'> No courses left </h5>
                    </div>
                </div>
                    ";
    }
  }
}

function get_transfer()
{
  global $con;
  if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $get_transfer = "select * from transfer where studentId=$stdNumber";
    $run_transfer = mysqli_query($con, $get_transfer);

    if (mysqli_num_rows($run_transfer) > 0) {
      echo "<table class='table table-hover bg-light table-borderless mt-3'>

            <thead class='table-success'>
              <tr>
                <th class='text-center table-header ' colspan='7'>Transfer Courses</th>
              </tr>

            </thead>
            <tbody class='table-group-divider'>
              <tr class='table-secondary'>
                <th scope='col'>Cat</th>
                <th scope='col'>Code</th>
                <th scope='col'>course Name(EN)</th>
                <th scope='col'>course Name(TR)</th>
                <th scope='col'>Credits</th>
                <th scope='col'>ECTS</th>
                <th scope='col'>Grade</th>
              </tr>
            ";

      while ($row_transfer = mysqli_fetch_array($run_transfer)) {
        $code = $row_transfer['CourseCode'];
        $name_en = $row_transfer['name_en'];
        $name_tr = $row_transfer['name_tr'];
        $credits = $row_transfer['credits'];
        $ects = $row_transfer['ects'];
        $category = $row_transfer['category'];
        $grade = $row_transfer['grade'];

        echo "
            
              
              <tr>
                <td scope='row'> $category </td>
                <td scope='row'> $code </td>
                <td scope='row'> $name_en </td>
                <td scope='row'> $name_tr </td>
                <td scope='row'> $credits </td>
                <td scope='row'> $ects </td>
                <td scope='row'> $grade </td>
              </tr>

            
            ";
      }

      echo "</tbody>
            </table>";
    } else {
      echo "
          <div class='card mt-4'>
            <div class='card-body p-4'>
              <h5 class='text-center'>No transfer courses available</h5>
            </div>
          </div>
          
          ";
    }
  }
}
