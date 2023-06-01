<?php
require("../includes/db.php");


global $con;
if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
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

        $get_dep = "select * from departments where dId=$department";
        $run_dep = mysqli_query($con, $get_dep);
        $row_dep = mysqli_fetch_array($run_dep);
        $dep_name = $row_dep['departmentName'];


?>


        <div class='card'>
            <div class='card-body p-4'>
                <div class='row info'>
                    <div class='col-5 col-md-5'>
                        <p>Name: <?php echo $fname; ?></p>
                        <p>Surname: <?php echo $lname; ?></p>
                        <p>Date of Birth: <?php echo $dob; ?></p>
                        <p>Gender: <?php echo $gender; ?></p>
                        <p>Email: <?php echo $stdmail; ?></p>
                    </div>
                    <div class='col-5 col-md-5'>
                        <p>Country of Origin: <?php echo $country; ?></p>
                        <p>Passport Number: <?php echo $pass_num; ?></p>
                        <p>Father's Name: Niyungeko Deo</p>
                        <p>Mother's Name: Nsabimana Laetitia</p>
                        <p>Tel: 05338857918</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='card mt-3'>
            <div class='card-body p-4'>
                <p><i class='fa-solid fa-building-columns pe-3'></i>Faculty: Engineering</p>
                <p><i class='fa-solid fa-building pe-3'></i>Department: <?php echo $dep_name; ?></p>
                <p><i class='fa-solid fa-inbox pe-3'></i>Status: Active Student</p>
                <p><i class='fa-solid fa-graduation-cap pe-3'></i>Scholarship: <?php echo $scholarship . "%" ?></p>
                <p class='full_name'><i class='fa-solid fa-user-group pe-3'> </i>Advisor: <?php echo $advisor; ?></p>
            </div>
        </div>

<?php

    } else {

        echo "
        <div class='card mt-4'>
        <div class='card-body p-4'>
            <h5 class='text-center'> No student found</h5>
        </div>
        </div>
        ";
    }
}
?>