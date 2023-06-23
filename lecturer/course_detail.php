<?php
require("../lecturer/includes/header.php");
require("../lecturer/includes/db.php");

$course_code = $_GET['code'];
$get_name = "select * from courses where course_code='$course_code'";
$run_name = mysqli_query($con, $get_name);
$row_name = mysqli_fetch_array($run_name);
$name_en = $row_name['courseName_en'];
$name_tr = $row_name['courseName_tr'];

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$get_lect_id = "select * from academic where firstName='$fname' and lastName='$lname'";
$run_query = mysqli_query($con, $get_lect_id);
$row = mysqli_fetch_array($run_query);
$lect_id = $row['id'];
?>
<div class="container">
    <div class="card mt-3">
        <div class="card-body p-4 text-center">
            <h6> Spring 2022-2023 | <?= $name_en . "|" . $name_tr ?> </h6>

            <h5 class="card-title pt-3"> Student List</h5>
        </div>
    </div>

    <table class="table table-responsive table-hover bg-light table-borderless mt-3">
        <thead class="table-secondary table-header">
            <tr>

                <th scope="col">
                    Student ID
                </th>
                <th scope="col">
                    Student Name
                </th>
                <th scope="col">
                    Grade
                </th>
                <th scope="col">

                </th>
            </tr>
        </thead>
        <tbody>
            <?php

            $get_student = "select * from semesters where lecturer='$lect_id' and course_code='$course_code' and year='2022-2023' and period='Spring'";
            $run_student = mysqli_query($con, $get_student);
            if (mysqli_num_rows($run_student) > 0) {
                while ($row_student = mysqli_fetch_array($run_student)) {
                    $student = $row_student['studentId'];
                    $grade = $row_student['grade'];
                    $get_student_details = "select * from students where studentId='$student'";
                    $run_query = mysqli_query($con, $get_student_details);
                    $row_details = mysqli_fetch_array($run_query);
                    $fname = $row_details['firstName'];
                    $lname = $row_details['lastName'];

            ?>


                    <tr>
                        <td><?= $student ?></td>
                        <td><?= $fname . " " . $lname ?></td>
                        <td><?= $grade ?></td>
                        <td scope='row'> <a href="add_grade.php?course=<?= $course_code ?>&id=<?= $student ?>"><i class=" fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
        </tbody>
<?php }
            } else echo "<tr colspan='3' class='text-center'><td>NO Students in this course</td></tr>  "; ?>
    </table>
</div>
<?php
require("../lecturer/includes/footer.php");
?>