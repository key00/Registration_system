<?php
require("../secretary/includes/header.php");
require("../secretary/includes/db.php"); ?>


<div class="search-box m-3">
    <!-- <form method="post">
        <button class="btn refresh" type="submit" name="refresh"> <i class="fa-solid fa-rotate me-3"></i>REFRESH</button>
    </form> -->
    <form action="" method="GET">
        <input type="text" name="student" id="" placeholder="search Student Number" required>
        <button class="btn" type="submit" name="search_student"><i class="fa-solid fa-magnifying-glass"></i></button>

    </form>


</div>
<div class="container my-3 pt-3">
    <?php if (isset($_GET['student'])) {

        $student = $_GET['student'];
        $get_info = "select * from students where studentId=$student";
        $run_info = mysqli_query($con, $get_info);

        if (mysqli_num_rows($run_info) > 0) {
            $student_info = mysqli_fetch_array($run_info);
            $studentId = $student_info['studentId'];
            $fname = $student_info['firstName'];
            $lname = $student_info['lastName'];
        }
    ?>
        <div class="card" style="width: 60%; margin: 0 auto;">

            <div class="card-body p-4">


                <h5 class="text-center"><?= $studentId ?> | <?php echo $fname . " " . $lname ?> </h5>

            <?php
        } ?>
            </div>
        </div>
</div>

<div class="container info dashboard active my-3 pt-3">
    <?php if (isset($_GET['student'])) {
        include("student_info.php");
    }
    ?>

</div>
<div class="container semester dashboard my-3 pt-3">
    <?php if (isset($_GET['student'])) {
        include("semester.php");
    }
    ?>
</div>
<?php
require('../secretary/includes/footer.php');
?>

<?php
// if (isset($_POST['refresh'])) {
// unset($_SESSION['student']);
// unset($_GET['student']);
// }
?>