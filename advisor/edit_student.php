<?php
require("../advisor/includes/header.php");
require("../advisor/includes/db.php");

if (isset($_GET['id'])) {
    $student = $_GET['id'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $_SESSION['student'] = $stdNumber;

    $studentId = $_SESSION['student'];
    $get_info = "select * from students where studentId=$studentId";
    $run_info = mysqli_query($con, $get_info);

    if (mysqli_num_rows($run_info) > 0) {
        $student_info = mysqli_fetch_array($run_info);
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
        <form action="">
            <div class='card'>
                <div class='card-body p-4'>
                    <div class='row info'>
                        <div class='col-5 col-md-5'>
                            <label class="form-label">Name: </label>
                            <input class="form-control" type="text" name="" id="" value="<?= $fname ?>">
                            <label class="form-label">Surname: </label>
                            <input class="form-control" type="text" name="" id="" value="<?= $lname ?>">
                            <label class="form-label">Date of Birth: </label>
                            <input class="form-control" type="text" name="" id="" value="<?= $dob ?>">
                            <label class="form-label">Gender: </label>
                            <input class="form-control" type="text" name="" id="" value="<?= $gender ?>">
                            <label class="form-label">Email: </label>
                            <input class="form-control" type="text" name="" id="" value="<?= $stdmail ?>">
                        </div>
                        <div class='col-5 col-md-5'>
                            <label class="form-label">Country of Origin: </label>
                            <input class="form-control" type="text" name="" id="" value="<?= $country ?>">
                            <label class="form-label">Passport Number:</label>
                            <input class="form-control" type="text" name="" id="" value=" <?= $pass_num ?>">
                            <label class="form-label">Father's Name:</label>
                            <input class="form-control" type=" text" name="" id="" value="<?= $father ?>">
                            <label class="form-label">Mother's Name:</label>
                            <input class="form-control" type="text" name="" id="" value="<?= $mother ?>">
                            <label class="form-label">Tel:</label>
                            <input class="form-control" type="text" name="" id="" value="<?= $phone ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class='card mt-3'>
                <div class='card-body p-4'>
                    <p><i class='fa-solid fa-building-columns pe-3'></i>Faculty: Engineering</p>
                    <label class="form-label"><i class='fa-solid fa-building pe-3'></i>Department: </label>
                    <input class="form-control" type="text" name="" id="" value="<?= $dep_name ?>">
                    <label class="form-label"><i class='fa-solid fa-inbox pe-3'></i>Status:</label>
                    <input class="form-control" type="text" name="" id="" value="<?= $status ?>">
                    <label class="form-label"><i class='fa-solid fa-graduation-cap pe-3'></i>Scholarship: </label>
                    <input class="form-control" type="text" name="" id="" value="<?= $scholarship . "%" ?>">
                    <label class="form-label" class='full_name'><i class='fa-solid fa-user-group pe-3'> </i>Advisor: </label>
                    <input class="form-control" type="text" name="" id="" value="<?= $advisor ?>">
                </div>
            </div>

            <button class="btn btn-success my-3 p-2" type="submit">UPDATE INFOS</button>
        </form>
    </div>

<?php } ?>


<?php
require('../advisor/includes/footer.php');
?>