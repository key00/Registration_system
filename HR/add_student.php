<?php
require("../HR/includes/header.php");
require("../HR/includes/db.php");
?>
<div class="container mt-3">
    <form action="" method="POST">
        <fieldset>
            <div class='card'>
                <div class='card-body p-4'>
                    <h3 class="text-center card-title pb-4 mb-3">PERSONAL INFORMATIONS</h3>
                    <div class='row info'>
                        <div class='col-5 col-md-5'>
                            <label class="form-label">Name: </label>
                            <input class="form-control" type="text" name="first_name" required>
                            <label class="form-label">Surname: </label>
                            <input class="form-control" type="text" name="last_name" required>
                            <label class="form-label">Date of Birth: </label>
                            <input class="form-control" type="date" name="dob" required>
                            <label class="form-label">Gender: </label>
                            <select class="form-select" type="text" name="gender" required>
                                <option value="" disabled selected>--Select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label class="form-label">Email: </label>
                            <input class="form-control" type="text" name="std_email" required>
                        </div>
                        <div class='col-5 col-md-5'>
                            <label class="form-label">Country of Origin: </label>
                            <input class="form-control" type="text" name="country" required>
                            <label class="form-label">Passport Number:</label>
                            <input class="form-control" type="text" name="passport" required>
                            <label class="form-label">Father's Name:</label>
                            <input class="form-control" type=" text" name="father" required>
                            <label class="form-label">Mother's Name:</label>
                            <input class="form-control" type="text" name="mother" required>
                            <label class="form-label">Tel:</label>
                            <input class="form-control" type="tel" name="phone_num" required>
                        </div>
                    </div>
                    <center>
                        <button type="button" class="btn btn-success mt-3 p-3 next next_button action-button form-button">Next</button>
                    </center>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <div class='card mt-3'>
                <div class='card-body p-4'>
                    <h3 class="text-center card-title pb-4 mb-3">ACADEMIC INFORMATIONS</h3>
                    <div class='row'>
                        <div class='col-5 col-md-5'>
                            <p><i class='fa-solid fa-building-columns pe-3'></i>Faculty: Engineering</p>
                            <label class="form-label"><i class='fa-solid fa-building pe-3'></i>Department: </label>
                            <select class="form-select" name="department" required>
                                <option value="" disabled selected>--Select--</option>
                                <option value="1">Computer Engineering</option>
                                <option value="2">Civil Engineering</option>
                                <option value="5">Electrical and Electronics Engineering</option>
                                <option value="6">Software Engineering</option>
                                <option value="7">Mechanical Engineering</option>

                            </select>
                            <label class="form-label"><i class='fa-solid fa-inbox pe-3'></i>Status:</label>
                            <select class="form-select" name="status" required>
                                <option value="" disabled selected>--Select--</option>
                                <option value="Active">Active</option>
                                <option value="Not Active">Not active</option>
                            </select>
                            <label class="form-label"><i class='fa-solid fa-graduation-cap pe-3'></i>Scholarship: </label>
                            <select class="form-select" name="scholarship" required>
                                <option value="" disabled selected>--Select--</option>
                                <option value="0">0%</option>
                                <option value="50">50%</option>
                                <option value="75">75%</option>
                                <option value="100">100%</option>
                            </select>
                            <!-- <label class="form-label" class='full_name'><i class='fa-solid fa-user-group pe-3'> </i>Advisor: </label>
                        <input class="form-control" type="text" name="advisor" required> -->
                        </div>
                    </div>
                    <div class="buttons mt-3 pt-3">
                        <button type="button" class="btn btn-success mt-3 p-3 action-button previous previous_button form-button"> Previous </button>
                        <button class="btn btn-success mt-3 p-3 form-button" type="submit" name="add_student">Submit</button>
                    </div>
                </div>
            </div>

        </fieldset>


    </form>
</div>
<?php
if (isset($_POST['add_student'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $date = $_POST['dob'];
    $gender = $_POST['gender'];
    $std_email = $_POST['std_email'];

    $country = $_POST['country'];
    $passport_num = $_POST['passport'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $phone_num = $_POST['phone_num'];

    $department = $_POST['department'];
    $status = $_POST['status'];
    $scholarship = $_POST['scholarship'];
    $advisor = $_POST['advisor'];

    $add = "insert into students (studentId, firstName, lastName, gender,date_birth,stdEmail,stdpass,scholarship,advisor,registration_date,country,passportNum,mother,father,phone,status,dId) 
                           values('','$fname' , '$lname', '$gender' , '$date'  , '$std_email','password' , '$scholarship' , '$advisor',NOW(), '$country' , '$passport_num' ,'$mother','$father','$phone_num' , '$status' , '$department')";
    $run_add = mysqli_query($con, $add);
    if ($run_add) {
        echo "<script>alert('Student Added')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
<?php
require('../HR/includes/footer.php');
?>