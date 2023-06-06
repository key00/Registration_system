<?php
require('../advisor/includes/header.php');
require('../advisor/includes/db.php');
?>
<?php
if (isset($_GET['id'])) {
    $student = $_GET['id'];
    $course = $_GET['course'];

    $query = "select * from transfer where studentId=$student and courseCode='$course'";
    $run_query = mysqli_query($con, $query);
    if (mysqli_num_rows($run_query) > 0) {

        $row = mysqli_fetch_array($run_query);
        $name_en = $row['name_en'];
        $name_tr = $row['name_tr'];
        $category = $row['category'];
        $credits = $row['credits'];
        $ects = $row['ects'];
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
                    <select class="form-control" name="category">
                        <option value="<?= $category ?>" selected><?= $category ?></option>
                        <option value="CC">CC</option>
                        <option value="TE">TE</option>
                        <option value="NTE">NTE</option>
                    </select>
                    <label>Course Code</label>
                    <input class="form-control" type="text" name="code" value="<?= $course ?>">

                    <label>Name (EN)</label>
                    <input class="form-control" type="text" name="name_en" value="<?= $name_en ?>">
                    <label>Name (TR)</label>
                    <input class="form-control" type="text" name="name_tr" value="<?= $name_tr ?>">
                </div>
                <div class='col-5 col-md-5'>
                    <label>Credits</label>
                    <input class="form-control" type="number" name="credits" value="<?= $credits ?>">
                    <label>ECTS</label>
                    <input class="form-control" type="number" name="ects" value="<?= $ects ?>">
                    <label>Grade</label>
                    <input class="form-control" name="grade" type="text" value="<?= $grade ?>">
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
    $code = $_POST['code'];
    $name_en = $_POST['name_en'];
    $name_tr = $_POST['name_tr'];
    $category = $_POST['category'];
    $credits = $_POST['credits'];
    $ects = $_POST['ects'];
    $grade = $_POST['grade'];

    $change = "UPDATE transfer set courseCode='$code', name_en='$name_en' , name_tr='$name_tr',credits='$credits' ,ects='$ects',category='$category', grade='$grade' where studentId=$student and courseCode='$course'";
    $run_change = mysqli_query($con, $change);

    if ($run_change) {
        echo "<script>alert('Transfer Updated')</script>";
        echo "<script>window.open('index.php?student=$student','_self')</script>";
    }
}
?>
<?php
require('../advisor/includes/footer.php');

?>