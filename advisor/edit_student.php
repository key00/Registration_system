<?php
require("../advisor/includes/header.php");
require("../advisor/includes/db.php");

if (isset($_GET['id'])) {
    $student = $_GET['id'];
    $stdNumber = mysqli_real_escape_string($con, $student);

    $get_info = "select * from students where studentId=$stdNumber";
    $run_info = mysqli_query($con, $get_info);

    if (mysqli_num_rows($run_info) > 0) {
        $student_info = mysqli_fetch_array($run_info);
        $student_Id = $student_info['studentId'];
        $fname = $student_info['firstName'];
        $lname = $student_info['lastName'];
        $dob = $student_info['date_birth'];
        $gender = $student_info['gender'];
        $stdmail = $student_info['stdEmail'];
        $country = $student_info['country'];
        $pass_num = $student_info['passportNum'];
        $scholarship = $student_info['scholarship'];
        $advisor = $student_info['advisor'];
        $department = $student_info['dId'];
        $phone = $student_info['phone'];
        $mother = $student_info['mother'];
        $father = $student_info['father'];
        $status = $student_info['status'];

        $get_dep = "select * from departments where dId=$department";
        $run_dep = mysqli_query($con, $get_dep);
        $row_dep = mysqli_fetch_array($run_dep);
        $dep_name = $row_dep['departmentName'];
    }

?>
    <div class="container mt-3">
        <form action="" method="POST">
            <div class='card'>
                <div class='card-body p-4'>
                    <div class='row info'>
                        <div class='col-5 col-md-5'>
                            <label class="form-label">Name: </label>
                            <input class="form-control" type="text" name="first_name" id="" value="<?= $fname ?>">
                            <label class="form-label">Surname: </label>
                            <input class="form-control" type="text" name="last_name" id="" value="<?= $lname ?>">
                            <label class="form-label">Date of Birth: </label>
                            <input class="form-control" type="text" name="dob" id="" value="<?= $dob ?>">
                            <label class="form-label">Gender: </label>
                            <input class="form-control" type="text" name="gender" id="" value="<?= $gender ?>">
                            <label class="form-label">Email: </label>
                            <input class="form-control" type="text" name="std_email" id="" value="<?= $stdmail ?>">
                        </div>
                        <div class='col-5 col-md-5'>
                            <label class="form-label">Country of Origin: </label>
                            <input class="form-control" type="text" name="country" id="" value="<?= $country ?>">
                            <label class="form-label">Passport Number:</label>
                            <input class="form-control" type="text" name="passport" id="" value=" <?= $pass_num ?>">
                            <label class="form-label">Father's Name:</label>
                            <input class="form-control" type=" text" name="father" id="" value="<?= $father ?>">
                            <label class="form-label">Mother's Name:</label>
                            <input class="form-control" type="text" name="mother" id="" value="<?= $mother ?>">
                            <label class="form-label">Tel:</label>
                            <input class="form-control" type="text" name="phone_num" id="" value="<?= $phone ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class='card mt-3'>
                <div class='card-body p-4'>
                    <p><i class='fa-solid fa-building-columns pe-3'></i>Faculty: Engineering</p>
                    <label class="form-label"><i class='fa-solid fa-building pe-3'></i>Department: </label>
                    <input class="form-control" type="text" name="department" id="" value="<?= $dep_name ?>">
                    <input class="form-control" type="hidden" name="studentId" id="" value="<?= $student_Id ?>">
                    <label class="form-label"><i class='fa-solid fa-inbox pe-3'></i>Status:</label>
                    <input class="form-control" type="text" name="status" id="" value="<?= $status ?>">
                    <label class="form-label"><i class='fa-solid fa-graduation-cap pe-3'></i>Scholarship: </label>
                    <input class="form-control" type="text" name="scholarship" id="" value="<?= $scholarship . "%" ?>">
                    <label class="form-label" class='full_name'><i class='fa-solid fa-user-group pe-3'> </i>Advisor: </label>
                    <input class="form-control" type="text" name="advisor" id="" value="<?= $advisor ?>">
                </div>
            </div>

            <button class="btn btn-success my-3 p-2" type="submit" name="update_info">UPDATE INFOS</button>
        </form>
    </div>

<?php } ?>

<?php
if (isset($_POST['update_info'])) {
    $studentId = $_POST['studentId'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $std_email = $_POST['std_email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $passport = $_POST['passport'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $department = $_POST['department'];
    $status = $_POST['status'];
    $scholarship = $_POST['scholarship'];
    $advisor = $_POST['advisor'];

    $update = "UPDATE students SET firstName='$first_name', lastName='$last_name' ,gender='$gender', date_birth='$dob', stdEmail='$std_email',scholarship='$scholarship', advisor='$advisor',country='$country',passportNum='$passport',mother='$mother',father='$father', phone='$phone',status='$status' where studentId=$studentId";
    $run_update = mysqli_query($con, $update);
    if ($run_update) {
        echo "<script>alert('Infos Updated')</script>";
        echo "<script>window.open('index.php?student=$studentID','_self')</script>";
    }
}
?>

<?php
require('../advisor/includes/footer.php');
?>