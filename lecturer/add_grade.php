<?php
require("../lecturer/includes/header.php");
require("../lecturer/includes/db.php");

if (isset($_GET['course']) and isset($_GET['id'])) {
    $course_code = $_GET['course'];
    $student = $_GET['id'];

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
        <form method="POST">
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
                                <td scope='row'><input class="form-control" type="text" name="grade" value="<?= $grade ?>"></td>
                                <td><button class="btn btn-success" type="submit" name="save">SAVE</button></td>
                            </tr>
                </tbody>
        <?php }
                    } else echo "<tr colspan='3' class='text-center'><td>NO Students in this course</td></tr>  "; ?>
            </table>
        </form>
    </div>

    <?php
    if (isset($_POST['save'])) {
        $grade = $_POST['grade'];

        $add_grade = "update semesters set grade='$grade' where studentId='$student' and course_code='$course_code' and period='spring' and year='2022-2023'";
        $run_grade = mysqli_query($con, $add_grade);

        if ($run_grade) {
            echo "<script>alert('Grade Added')</script>";
            echo "<script>window.open('course_detail.php?code=$course_code','_self')</script>";
        }
    }
    ?>
<?php }
require('../lecturer/includes/footer.php');
?>