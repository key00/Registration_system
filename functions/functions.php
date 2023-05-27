<?php

$db = mysqli_connect("localhost", "root", "", "registration_system");


function getCourses()
{

  global $db;
  $student = $_SESSION['username'];
  $get_dep = "select * from students where studentId=$student";
  $run_dep = mysqli_query($db, $get_dep);
  $row_dep = mysqli_fetch_array($run_dep);
  $dep = $row_dep['dId'];

  $get_courses = "select * from courses where dId=$dep ";
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
  $student = $_SESSION['username'];
  $get_semester = "select * from semesters where studentId=$student and year='2022-2023' and period='Spring'";
  $run_semester = mysqli_query($db, $get_semester);
  $row_semester = mysqli_fetch_array($run_semester);
  if ($row_semester > 0) {
    $year = $row_semester['year'];
    $period = $row_semester['period'];
    $code = $row_semester['course_code'];
    $lecturer = $row_semester['lecturer'];
    $grade = $row_semester['grade'];

    echo "
    <table class='table table-hover bg-light table-borderless mt-3'>
    <thead>
            <tr class='table-success'>
              <th class='text-center table-header' colspan='8'> $period $year</th>
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


    while ($row_semester = mysqli_fetch_array($run_semester)) {

      $code = $row_semester['course_code'];
      $lecturer = $row_semester['lecturer'];
      $grade = $row_semester['grade'];
      $get_courses = "select * from courses where course_code='$code'";
      $run_courses = mysqli_query($db, $get_courses);
      $row_courses = mysqli_fetch_array($run_courses);
      $category = $row_courses['category'];
      $name_en = $row_courses['courseName_en'];
      $name_tr = $row_courses['courseName_tr'];
      $credits = $row_courses['credits'];
      $ects = $row_courses['ects'];


      echo "

            <tr>
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
  } else {
    echo "<div class='card mt-4'>
    <div class='card-body p-4'>
      <h5 class='text-center'> Not available </h5>
    </div>
  </div>";
  }
}


function getTransc()
{
  global $db;
  $studentId = $_SESSION['username'];
  $get_transc = "select * from semesters where studentId=$studentId";
  $run_transc = mysqli_query($db, $get_transc);

  while ($row_transc = mysqli_fetch_array($run_transc)) {
    $course = $row_transc['course_code'];
    $year = $row_transc['year'];
    $period = $row_transc['period'];
    $grade = $row_transc['grade'];
    $get_course = "select * from courses where course_code='$course'";
    $run_course = mysqli_query($db, $get_course);
    $row_course = mysqli_fetch_array($run_course);
    $en_name = $row_course['courseName_en'];
    $tr_name = $row_course['courseName_tr'];
    $credit = $row_course['credits'];

    echo "
        <tr>
        <td scope='row'>$year</td>
        <td scope='row'>$period</td>
        <td scope='row'>$course</td>
        <td scope='row'>$en_name</td>
        <td scope='row'>$tr_name</td>
        <td scope='row'>$credit</td>
        <td scope='row'>$grade</td>
        
      </tr>

        ";
  }
}


function get_all_semesters()
{
  global $db;
  $student = $_SESSION['username'];
  $get_semesters = "SELECT DISTINCT year, period FROM semesters WHERE studentId=$student AND year BETWEEN '2019-2020' AND '2022-2023' AND period IN ('Fall', 'Spring') ORDER BY year, period ASC";
  $run_semesters = mysqli_query($db, $get_semesters);

  if (mysqli_num_rows($run_semesters) > 0) {
    while ($row_semester = mysqli_fetch_array($run_semesters)) {
      $year = $row_semester['year'];
      $period = $row_semester['period'];

      echo "
      <table class='table table-hover bg-light table-borderless mt-3'>
      <thead>
        <tr class='table-success'>
          <th class='text-center table-header' colspan='8'>$period $year</th>
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

      $get_courses = "SELECT semesters.*, courses.* FROM semesters INNER JOIN courses ON semesters.course_code = courses.course_code WHERE semesters.studentId = $student AND semesters.year = '$year' AND semesters.period = '$period'";
      $run_courses = mysqli_query($db, $get_courses);

      while ($row_course = mysqli_fetch_array($run_courses)) {
        $category = $row_course['category'];
        $code = $row_course['course_code'];
        $name_en = $row_course['courseName_en'];
        $name_tr = $row_course['courseName_tr'];
        $credits = $row_course['credits'];
        $ects = $row_course['ects'];
        $lecturer = $row_course['lecturer'];
        $grade = $row_course['grade'];

        echo "
        <tr>
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
      echo "</tbody></table>";
    }
  } else {
    echo "<div class='card mt-4'>
    <div class='card-body p-4'>
      <h5 class='text-center'> No semesters found </h5>
    </div>
  </div>";
  }
}

function get_courses_left()
{
  global $db;
  $student = $_SESSION['username'];
  $get_dep = "select * from students where studentId=$student";
  $run_dep = mysqli_query($db, $get_dep);
  $row_dep = mysqli_fetch_array($run_dep);
  $dep = $row_dep['dId'];

  $get_courses = "select * from courses left join semesters on semesters.course_code=courses.course_code where semesters.course_code is null and courses.dId=$dep";
  $run_courses = mysqli_query($db, $get_courses);
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

function get_credits()
{
  global $db;
  $student = $_SESSION['username'];

  $get_dep = "select * from students where studentId=$student";
  $run_dep = mysqli_query($db, $get_dep);
  $row_dep = mysqli_fetch_array($run_dep);
  $dep = $row_dep['dId'];

  $get_total = "select total_cred from departments where dId=$dep ";
  $run_total = mysqli_query($db, $get_total);
  $row_total = mysqli_fetch_array($run_total);
  $total = $row_total['total_cred'];

  // $get_credits = "select sum(credits) as total from (select courses.credits from courses right join semesters on semesters.course_code=courses.course_code where semesters.studentId=$student and semesters.grade !='') as disctint_course";
  $get_credits = "select sum(credits) as sum_credits from semesters where semesters.studentId=$student and semesters.grade !=''";
  $run_credits = mysqli_query($db, $get_credits);
  $row_credits = mysqli_fetch_array($run_credits);
  $credits = $row_credits['sum_credits'];
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
