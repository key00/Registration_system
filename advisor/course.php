<?php
require("../advisor/includes/db.php");

global $con;
if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $_SESSION['student'] = $stdNumber;
}

$studentId = $_SESSION['student'];
$get_dep = "select * from students where studentId=$studentId";
$run_dep = mysqli_query($con, $get_dep);
$row_dep = mysqli_fetch_array($run_dep);
$dep = $row_dep['dId'];

$get_courses = "SELECT * FROM courses WHERE NOT EXISTS ( SELECT 1 FROM semesters WHERE semesters.course_code = courses.course_code AND semesters.studentId = $studentId );";
// $get_courses = "SELECT * from courses left join semesters on semesters.course_code=courses.course_code where semesters.course_code is null and courses.dId=$dep";
$run_courses = mysqli_query($con, $get_courses);

if (mysqli_num_rows($run_courses) > 0) {
?>
    <form action="" method="post">

        <table class="table bg-light" style="width: 50%;">
            <?php get_credits()
            ?>
        </table>

        <table class='table table-hover bg-light table-borderless mt-3'>
            <thead>
                <tr class='table-success'>
                    <th class='text-center table-header' colspan='8'> Courses left </th>
                </tr>

            </thead>
            <tbody class='table-group-divider'>
                <tr class='table-secondary'>
                    <th scope="col"></th>
                    <th scope='col'>Cat</th>
                    <th scope='col'>Code</th>
                    <th scope='col'>Name(EN)</th>
                    <th scope='col'>Name(TR)</th>
                    <th scope='col'>Credits</th>
                    <th scope='col'>ECTS</th>
                    <th scope='col'>Pre-requisite</th>

                </tr>
                <?php
                while ($row_courses = mysqli_fetch_array($run_courses)) {
                    $category = $row_courses['category'];
                    $code = $row_courses['course_code'];
                    $name_en = $row_courses['courseName_en'];
                    $name_tr = $row_courses['courseName_tr'];
                    $ects = $row_courses['ects'];
                    $credits = $row_courses['credits'];
                    $pre_req = $row_courses['pre-requisite'];

                ?>
                    <tr>
                        <td scope='row'> <input type="checkbox" name="add[]" value="<?php echo $code
                                                                                    ?>"></td>
                        <td scope='row'><?php echo $category; ?></td>
                        <td scope='row'><?php echo $code; ?></td>
                        <td scope='row'><?php echo $name_en; ?></td>
                        <td scope='row'><?php echo $name_tr; ?></td>
                        <td scope='row'><?php echo $credits; ?></td>
                        <td scope='row'><?php echo $ects; ?></td>
                        <td scope='row'><?php echo $pre_req; ?></td>

                    </tr>


                <?php
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <button type="submit" name="update" class="btn btn-success"><span class="me-2"><i class="fa-solid fa-plus"></i></span>Add course(s)</button>
                    </td>
                </tr>
            </tfoot>
    </form>
<?php
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

<!-- displaying transfer courses -->


<table class='table table-hover bg-light table-borderless mt-3'>

    <thead class='table-success'>
        <tr>
            <th class='text-center table-header ' colspan='8'>Transfer Courses</th>
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
            <th scope="col"></th>
        </tr>
        <?php
        $get_transfer = "select * from transfer where studentId=$studentId";
        $run_transfer = mysqli_query($con, $get_transfer);
        if (mysqli_num_rows($run_transfer) > 0) {

            while ($row_transfer = mysqli_fetch_array($run_transfer)) {
                $code = $row_transfer['CourseCode'];
                $name_en = $row_transfer['name_en'];
                $name_tr = $row_transfer['name_tr'];
                $credits = $row_transfer['credits'];
                $ects = $row_transfer['ects'];
                $category = $row_transfer['category'];
                $grade = $row_transfer['grade'];
        ?>
                <tr>
                    <td scope='row'> <?php echo $category; ?> </td>
                    <td scope='row'> <?php echo $code; ?> </td>
                    <td scope='row'> <?php echo $name_en; ?> </td>
                    <td scope='row'> <?php echo $name_tr; ?> </td>
                    <td scope='row'> <?php echo $credits; ?> </td>
                    <td scope='row'> <?php echo $ects; ?> </td>
                    <td scope='row'> <?php echo $grade; ?> </td>
                    <td scope='row'><a href="edit_transfer.php?course=<?= $code ?>&id=<?= $studentId ?>"><i class=" fa-solid fa-pen-to-square"></i></a></td>
                </tr>


            <?php
            }

            ?>

        <?php
        } else {
        ?>
    </tbody>
</table>

<?php
            echo "
          <div class='card mt-4'>
            <div class='card-body p-4'>
              <h5 class='text-center'>No transfer courses available</h5>
            </div>
          </div>
          
          ";
        }
?>

<a href="add_transfer.php?id=<?= $studentId ?>" class="btn btn-success p-2"><i class="fa-solid fa-plus"></i> Add transferred course</a>
<!-- function to add a course for a student -->
<?php

global $con;

if (isset($_POST['update'])) {

    $student = $_SESSION['student'];
    foreach ($_POST['add'] as $add_course) {

        $add = "INSERT into semesters (id, year, period,studentId, course_code, lecturer, grade) VALUES ('','2022-2023','Spring','$student', '$add_course','','') ";
        $run_add = mysqli_query($con, $add);
        if ($run_add) {
            echo "<script> alert('Course(s) added')</script>";
            echo "<script>window.open('index.php?student=$student','_self')</script>";
        } else echo "<script> alert('A problem occured while adding course(s)')</script>";
    }
}

?>