<!-- <link rel="stylesheet" href="style.css"> -->
<?php

require("../includes/db.php");
global $con;
if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $_SESSION['student'] = $stdNumber;
}

if (isset($_SESSION['student'])) {
    $studentId = $_SESSION['student'];
    $get_semester = "select * from semesters where studentId=$studentId and year='2022-2023' and period='Spring'";
    $run_semester = mysqli_query($con, $get_semester);

?>

    <?php
    if (mysqli_num_rows($run_semester) > 0) {
        $totalCredits = 0;
        $totalGradePoints = 0;
    ?>
        <form method="post" action="">

            <table class='table table-hover bg-light table-borderless mt-3'>

                <thead>
                    <tr class='table-success'>
                        <th class='text-center table-header' colspan='9'> Spring 2022-2023</th>
                    </tr>

                </thead>

                <tbody class='table-group-divider'>
                    <tr class='table-secondary'>
                        <th></th>
                        <th scope='col'>Cat</th>
                        <th scope='col'>Code</th>
                        <th scope='col'>Name(EN)</th>
                        <th scope='col'>Name(TR)</th>
                        <th scope='col'>Credits</th>
                        <th scope='col'>ECTS</th>
                        <th scope='col'>Lecturer</th>
                        <th scope='col'>Grade</th>
                    </tr>
                    <?php
                    while ($row_semester = mysqli_fetch_array($run_semester)) {

                        $code = $row_semester['course_code'];
                        $lecturer = $row_semester['lecturer'];
                        $grade = $row_semester['grade'];
                        $get_courses = "select * from courses where course_code='$code'";
                        $run_courses = mysqli_query($con, $get_courses);
                        $row_courses = mysqli_fetch_array($run_courses);
                        $category = $row_courses['category'];
                        $name_en = $row_courses['courseName_en'];
                        $name_tr = $row_courses['courseName_tr'];
                        $credits = $row_courses['credits'];
                        $ects = $row_courses['ects'];
                    ?>



                        <tr>
                            <td> <input type="checkbox" name="remove[]" value="<?php echo $code
                                                                                ?>"> </td>
                            <td scope='row'><?php echo $category; ?></td>
                            <td scope='row'><?php echo $code; ?></td>
                            <td scope='row'><?php echo $name_en; ?></td>
                            <td scope='row'><?php echo $name_tr; ?></td>
                            <td scope='row'><?php echo $credits; ?></td>
                            <td scope='row'><?php echo $ects; ?></td>
                            <td scope='row'><?php echo $lecturer; ?></td>
                            <td scope='row'><?php echo $grade; ?></td>
                        </tr>

                    <?php

                    } ?>

                <tfoot>

                    <tr>
                        <td><button type="submit" name="update" class="btn btn-success"><span class="me-2"><i class="fa-solid fa-arrows-rotate"></i></span>Update</button></td>
                    </tr>

                </tfoot>
                </tbody>

            </table>

        </form>

<?php
    } else {
        echo "<div class='card mt-4'>
    <div class='card-body p-4'>
      <h5 class='text-center'> Not available </h5>
    </div>
  </div>";
    }
}
?>

<!-- to add a new course start -->
<!-- <div class="search-box">
        <select name="" id="search_select">
            <option value="" selected disabled>--Add a course--</option>
        </select>
        <button class="btn" type="submit" id="search_button"><i class="fa-solid fa-plus"></i></button>
    </div> -->


<!-- to add a new course end -->

<!-- to delete a course -->
<?php

global $con;
if (isset($_POST['update'])) {
    $student = $_SESSION['student'];
    foreach ($_POST['remove'] as $remove_course) {

        $delete_course = "DELETE from semesters where course_code='$remove_course' and studentId=$student ";
        $run_delete = mysqli_query($con, $delete_course);
        if ($run_delete) {
            echo "<script> alert('Course(s) deleted')</script>";
            echo "<script> window.open('index.php?student=$studentId','_self')</script>";
        } else echo "<script> alert('A problem occured while deleting courses(s)')</script>";
    }
}

?>