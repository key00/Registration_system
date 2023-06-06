<?php
require('../advisor/includes/header.php');
require('../advisor/includes/db.php');
?>
<?php
if (isset($_GET['id'])) {
    $student = $_GET['id'];
}
?>
<form action="" method="post">
    <div class='card m-3'>
        <div class='card-body p-4'>
            <div class='row info'>
                <div class='col-5 col-md-5'>
                    <input type="hidden" name="student" value="<?= $student ?>">
                    <label>Category</label>
                    <select class="form-control" name="category" required>
                        <option value="" disabled selected>--Select--</option>
                        <option value="CC">Compulsory Course</option>
                        <option value="TE">Technical Elective</option>
                        <option value="NTE">Non-Technical Elective</option>
                    </select>
                    <label>Course Code</label>
                    <input class="form-control" type="text" name="code" required>

                    <label>Name (EN)</label>
                    <input class="form-control" type="text" name="name_en" required>
                    <label>Name (TR)</label>
                    <input class="form-control" type="text" name="name_tr" required>
                </div>
                <div class='col-5 col-md-5'>
                    <label>Credits</label>
                    <input class="form-control" type="number" name="credits" required>
                    <label>ECTS</label>
                    <input class="form-control" type="number" name="ects" required>
                    <label>Grade</label>
                    <input class="form-control" name="grade" type="text">
                </div>
            </div>
            <center>
                <button type="submit" name="add" class="btn btn-success mt-4"> ADD COURSE</button>
            </center>
        </div>
    </div>
</form>
<?php
if (isset($_POST['add'])) {
    $student = $_POST['student'];
    $code = $_POST['code'];
    $name_en = $_POST['name_en'];
    $name_tr = $_POST['name_tr'];
    $category = $_POST['category'];
    $credits = $_POST['credits'];
    $ects = $_POST['ects'];
    $grade = $_POST['grade'];

    $change = "insert into transfer (studentId, courseCode, name_en, name_tr, credits, ects,category, grade) values ('$student', '$code', '$name_en', '$name_tr', '$credits', '$ects','$category', '$grade')";
    $run_change = mysqli_query($con, $change);

    if ($run_change) {
        echo "<script>alert('Transfer course Updated')</script>";
        echo "<script>window.open('index.php?student=$student','_self')</script>";
    }
}
?>
<?php
require('../advisor/includes/footer.php');

?>