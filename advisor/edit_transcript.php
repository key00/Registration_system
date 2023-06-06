<?php
require('../advisor/includes/header.php');
require('../advisor/includes/db.php');
?>
<?php

if (isset($_GET['id']) and isset($_GET['course']) and isset($_GET['period']) and isset($_GET['year'])) {
    $student = $_GET['id'];
    $course = $_GET['course'];
    $get_course = "SELECT * from courses where course_code='$course'";
    $run_course = mysqli_query($con, $get_course);
    $row_course = mysqli_fetch_array($run_course);
    $category = $row_course['category'];
    $name_en = $row_course['courseName_en'];
    $name_tr = $row_course['courseName_tr'];
    $credits = $row_course['credits'];
    $ects = $row_course['ects'];

    $period = $_GET['period'];
    $year = $_GET['year'];

    $query = "SELECT * from semesters where studentId=$student and course_code='$course' and period='$period' and year='$year'";
    $run_query = mysqli_query($con, $query);
    if (mysqli_num_rows($run_query) > 0) {
        $row = mysqli_fetch_array($run_query);
        $lecturer = $row['lecturer'];
        $grade = $row['grade'];
    }
}


?>

<form action="" method="post">
    <div class='card m-3'>
        <div class='card-body p-4'>
            <div class='row info'>
                <div class='col-5 col-md-5'>
                    <input type="hidden" name="student" value="<?= $student ?>">
                    <label>Category</label>
                    <input class="form-control" name="category" value="<?= $category ?>" disabled>
                    <label>Course Code</label>
                    <input class="form-control" value="<?= $course ?>" disabled>
                    <input class="form-control" type="hidden" name="course" value="<?= $course ?>">
                    <label>Name (EN)</label>
                    <input class="form-control" name="name_en" value="<?= $name_en ?>" disabled>
                    <label>Name (TR)</label>
                    <input class="form-control" name="name_tr" value="<?= $name_tr ?>" disabled>
                </div>
                <div class='col-5 col-md-5'>
                    <label>Credits</label>
                    <input class="form-control" name="credits" value="<?= $credits ?>" disabled>
                    <label>ECTS</label>
                    <input class="form-control" name="ects" value="<?= $ects ?>" disabled>
                    <label>Lecturer</label>
                    <input class="form-control" name="lecturer" value="<?= $lecturer ?>">
                    <label>Grade</label>
                    <input class="form-control" name="grade" value="<?= $grade ?>">
                </div>
            </div>
            <center>
                <button type="submit" name="update" class="btn btn-success mt-4"> UPDATE</button>
            </center>
        </div>
    </div>
</form>

<?php
if (isset($_POST['update'])) {
    $student = $_POST['student'];
    $course = $_POST['course'];
    $lecturer = $_POST['lecturer'];
    $grade = $_POST['grade'];

    $transcript = "UPDATE semesters set lecturer='$lecturer' , grade='$grade' where studentId=$student and course_code='$course' and period='$period' and year='$year' ";
    $run_transcript = mysqli_query($con, $transcript);

    if ($run_transcript) {
        echo "<script>alert('Transcript Updated')</script>";
        echo "<script>window.open('index.php?student=$student','_self')</script>";
    }
}
?>
<?php
require('../advisor/includes/footer.php');

?>