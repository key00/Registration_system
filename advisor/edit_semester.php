<?php
require('../advisor/includes/header.php');
require('../advisor/includes/db.php');
?>


<?php
if (isset($_GET['id']) and isset($_GET['course'])) {
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

        $query = "SELECT * from semesters where studentId=$student and course_code='$course'";
        $run_query = mysqli_query($con, $query);
        if (mysqli_num_rows($run_query) > 0) {
                $row = mysqli_fetch_array($run_query);
                $lecturerid = $row['lecturer'];
                if (!is_null($lecturerid) and $lecturerid != 0) {
                        $get_lecturer = "select * from academic where id='$lecturerid' and islecturer=1";
                        $run_lecturer = mysqli_query($con, $get_lecturer);
                        $row_lecturer = mysqli_fetch_array($run_lecturer);
                        $lecturer = $row_lecturer['firstName'] . " " . $row_lecturer['lastName'];
                }
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
                                        <label class="form-label">Category</label>
                                        <input class="form-control" value="<?= $category ?>" disabled>
                                        <label class="form-label">Course code</label>
                                        <input class="form-control" value="<?= $course ?>" disabled>
                                        <input class="form-control" type="hidden" name="course" value="<?= $course ?>">
                                        <label class="form-label">Name (EN)</label>
                                        <input class="form-control" value="<?= $name_en ?>" disabled>
                                        <label class="form-label">Name (TR)</label>
                                        <input class="form-control" value="<?= $name_tr ?>" disabled>
                                </div>
                                <div class='col-5 col-md-5'>
                                        <label class="form-label">Credits</label>
                                        <input class="form-control" value="<?= $credits ?>" disabled>
                                        <label class="form-label">ECTS</label>
                                        <input class="form-control" value="<?= $ects ?>" disabled>
                                        <label class="form-label">Lecturer</label>
                                        <select class="form-select" name="lecturer" id="lecturerSelect">
                                                <option value="<?php if (!is_null($lecturerid) and $lecturerid != 0) echo $lecturerid ?>"><?php if (!is_null($lecturerid) and $lecturerid != 0) echo $lecturer ?></option>
                                        </select>
                                        <label class="form-label">Grade</label>
                                        <input class="form-control" name="grade" value="<?= $grade ?>">
                                </div>
                        </div>
                        <center>
                                <button type="submit" name="save" class="btn btn-success mt-4"> SAVE</button>
                        </center>
                </div>
        </div>

</form>

<?php
if (isset($_POST['save'])) {
        $student = $_POST['student'];
        $course = $_POST['course'];
        $lecturer = $_POST['lecturer'];
        $grade = $_POST['grade'];

        $change = "UPDATE semesters set lecturer='$lecturer' , grade='$grade' where studentId=$student and course_code='$course'";
        $run_change = mysqli_query($con, $change);

        if ($run_change) {
                echo "<script>alert('Semester Updated')</script>";
                echo "<script>window.open('index.php?student=$student','_self')</script>";
        }
}
?>
<?php
require('../advisor/includes/footer.php');

?>