<?php
require('../student/includes/header.php');
require('../student/includes/db.php');
if (isset($_SESSION['username'])) {

    $student = $_SESSION['username'];
    $check_student = "select * from students where studentId=$student";
    $run_check = mysqli_query($con, $check_student);
    $row = mysqli_fetch_array($run_check);
}

?>
<div class="container  mt-3">
    <div class="card changePass">
        <div class="card-body p-4">
            <form action="" method="post">

                <label>Your current password:</label>
                <input class="form-control" type="password" name="pass_old" required>
                <label>Enter your new password:</label>
                <input class="form-control" type="password" name="pass_new1" required>
                <label>Confirm your new password:</label>
                <input class="form-control" type="password" name="pass_new2" required>
                <center>
                    <button class="btn mt-4 p-3 btn-pass" name="change_pass">Update password</button>
                </center>
            </form>

        </div>
    </div>
</div>
<?php
if (isset($_POST['change_pass'])) {
}
?>
<?php require('../student/includes/footer.php'); ?>