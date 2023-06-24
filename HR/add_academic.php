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
                            <input class="form-control" type="text" name="faculty_email" required>
                            <label class="form-label"><i class='fa-solid fa-building-columns pe-3'></i>Faculty: </label>
                            <select class="form-select" name="faculty" id="facultySelect">
                                <option value="" disabled selected>--Select--</option>
                            </select>
                        </div>

                        <div class='col-5 col-md-5'>

                            <label class="form-label">Country of Origin: </label>
                            <input class="form-control" type="text" name="country" required>
                            <label class="form-label">Passport Number or ID number:</label>
                            <input class="form-control" type="text" name="passport" required>
                            <label class="form-label">Roles:</label> <br>
                            <input type="checkbox" name="isadvisor"> Advisor <br>
                            <input type="checkbox" name="islecturer"> Lecturer <br>
                            <input type="checkbox" name="issecretary"> Secretary <br>

                            <label class="form-label">Tel:</label>
                            <input class="form-control" type="tel" name="phone_num" required>
                            <label class="form-label"><i class='fa-solid fa-building pe-3'></i>Department: </label>
                            <select class="form-select" name="department" id="departmentSelect" required>
                                <option value="" disabled selected>--Select a faculty first--</option>


                            </select>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-success mt-3 p-3 form-button" type="submit" name="add_academic">Submit</button>

                    </center>
                </div>
            </div>
        </fieldset>


    </form>
</div>
<?php
if (isset($_POST['add_academic'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $date = $_POST['dob'];
    $gender = $_POST['gender'];

    $faculty_email = $_POST['faculty_email'];
    if (isset($_POST['isadvisor'])) {
        $isadvisor = 1;
    } else $isadvisor = 0;

    if (isset($_POST['islecturer'])) {
        $islecturer = 1;
    } else $islecturer = 0;

    if (isset($_POST['issecretary'])) {
        $issecretary = 1;
    } else $issecretary = 0;



    $country = $_POST['country'];
    $passport_num = $_POST['passport'];

    $phone_num = $_POST['phone_num'];

    $department = $_POST['department'];
    $faculty = $_POST['faculty'];

    $get_dep_id = "select * from departments where departmentName='$department'";
    $run_dep_id = mysqli_query($con, $get_dep_id);
    $row_dep_id = mysqli_fetch_array($run_dep_id);
    $dep_id = $row_dep_id['dId'];

    $get_faculty_id = "select * from faculties where faculty_name='$faculty'";
    $run_faculty_id = mysqli_query($con, $get_faculty_id);
    $row_faculty_id = mysqli_fetch_array($run_faculty_id);
    $faculty_id = $row_faculty_id['id'];


    $to = $_POST['email'];
    $subject = "Registration Complete : Log In  ";
    $message = "Thank you for registering on our website. We're glad to have you as a customer. \n \n Your username: $username \n Your password: $upassword";

    mail($to, $subject, $message);


    $add = "insert into academic (id, firstName, lastName, gender,date_birth,faculty,department,isadvisor,islecturer,issecretary,f_email,password,phone_num,registration_date,country,passport) 
                           values('','$fname' , '$lname', '$gender' , '$date', '$faculty_id', '$dep_id' ,'$isadvisor','$islecturer','$issecretary' , '$faculty_email','password','$phone_num' ,NOW(), '$country' , '$passport_num')";
    $run_add = mysqli_query($con, $add);
    if ($run_add) {
        echo "<script>alert('Academic Added')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
<?php
require('../HR/includes/footer.php');
?>