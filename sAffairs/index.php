<?php
require("../sAffairs/includes/header.php");
require("../sAffairs/includes/db.php"); ?>


<div class="search-box m-3">
    <!-- <form method="post">
        <button class="btn refresh" type="submit" name="refresh"> <i class="fa-solid fa-rotate me-3"></i>REFRESH</button>
    </form> -->
    <a href="add_student.php" class="btn add"><i class="fa-solid fa-plus"></i> Add New Student</a>
    <form action="" method="GET">
        <input type="text" name="student" id="" placeholder="search Student Number" required>
        <button class="btn" type="submit" name="search_student"><i class="fa-solid fa-magnifying-glass"></i></button>

    </form>


</div>

<div class="container info dashboard active my-3 pt-3">
    <?php if (isset($_GET['student'])) {
        include("student_info.php");
    }
    ?>
</div>
<div class="container payment dashboard my-3 pt-3">
    <!-- for payments -->
    <?php
    //if (isset($_GET['search_student'])) {
    //  include("student_info.php");
    // }
    ?>
</div>
<?php
require('../sAffairs/includes/footer.php');
?>

<?php
// if (isset($_POST['refresh'])) {
// unset($_SESSION['student']);
// unset($_GET['student']);
// }
?>