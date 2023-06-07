<div class="row row-tables">
    <div class="col-lg-6">
        <table class="table bg-light mt-3 pe-4">
            <?php
            global $db;
            $student = $_SESSION['student_id'];
            $credits = 0;
            $get_dep = "select * from students where studentId=$student";
            $run_dep = mysqli_query($db, $get_dep);
            $row_dep = mysqli_fetch_array($run_dep);
            $dep = $row_dep['dId'];


            $get_total = "select total_cred from departments where dId=$dep ";
            $run_total = mysqli_query($db, $get_total);
            $row_total = mysqli_fetch_array($run_total);
            $total = $row_total['total_cred'];

            $get_credits = "select sum(credits) as sum_credits from courses right join semesters on semesters.course_code=courses.course_code where semesters.studentId=$student and semesters.grade !='' and  semesters.grade !='NA' and  semesters.grade !='FF'";
            // $get_credits = "select sum(credits) as sum_credits from semesters where semesters.studentId=$student and semesters.grade !='' and semesters.grade!='NA' and semesters.grade!='FF';";
            $run_credits = mysqli_query($db, $get_credits);
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
            ?>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table bg-light mt-3">
            <tr>
                <th>CC</th>
                <td>Compulsory Course</td>
            </tr>
            <tr>
                <th>TE</th>
                <td>Technical Elective</td>
            </tr>
            <tr>
                <th>NTE</th>
                <td>Non-Technial Elective</td>
            </tr>
        </table>
    </div>

</div>

<?php
global $db;
$student = $_SESSION['student_id'];
$get_dep = "select * from students where studentId=$student";
$run_dep = mysqli_query($db, $get_dep);
$row_dep = mysqli_fetch_array($run_dep);
$dep = $row_dep['dId'];

$get_courses = "SELECT * FROM courses WHERE NOT EXISTS ( SELECT 1 FROM semesters WHERE semesters.course_code = courses.course_code AND semesters.studentId = $student );";

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
?>

<table class="table table-hover bg-light table-borderless mt-3">

    <thead>
        <tr class="table-success">
            <th class="text-center table-header" colspan="7">All <?php echo $dep_name; ?> courses</th>
        </tr>

    </thead>
    <tbody class="table-group-divider">
        <tr class="table-secondary">
            <th scope="col">Cat</th>
            <th scope="col">Code</th>
            <th scope="col">Name(EN)</th>
            <th scope="col">Name(TR)</th>
            <th scope="col">Credits</th>
            <th scope="col">ECTS</th>
            <th scope="col">Pre-requisite</th>
        </tr>
        <?php

        global $db;
        $student = $_SESSION['student_id'];
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
        } ?>

    </tbody>
</table>