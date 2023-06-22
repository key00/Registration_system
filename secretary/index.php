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