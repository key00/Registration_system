<?php
require("../lecturer/includes/header.php");
require("../lecturer/includes/db.php");

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$get_lect_id = "select * from academic where firstName='$fname' and lastName='$lname'";
$run_query = mysqli_query($con, $get_lect_id);
$row = mysqli_fetch_array($run_query);
$lect_id = $row['id'];

?>


<div class="search-box m-3">

    <form action="" method="POST">
        <input type="text" name="course_code" id="" placeholder="search Course Code" required>
        <button class="btn" type="submit" name="search_course"><i class="fa-solid fa-magnifying-glass"></i></button>

    </form>


</div>

<div class="container dashboard active mt-3 pt-3">
    <div class="card mt-3">
        <div class="course-card card-body p-4">
            <h5 class="mb-4 card-title">COURSES LIST</h5>
            <ul class="course-list">

                <?php
                global $con;
                $get_courses = "select * from semesters where year='2022-2023' and period='Spring' and lecturer='$lect_id' group by course_code";
                $run_query = mysqli_query($con, $get_courses);
                if (mysqli_num_rows($run_query) > 0) {

                    while ($row = mysqli_fetch_array($run_query)) {

                        $course_code = $row['course_code'];
                        $year = $row['year'];
                        $period = $row['period'];

                        $get_name = "select * from courses where course_code='$course_code'";
                        $run_name = mysqli_query($con, $get_name);
                        $row_name = mysqli_fetch_array($run_name);
                        $name_en = $row_name['courseName_en'];
                        $name_tr = $row_name['courseName_tr'];


                        echo "<a href='course_detail.php?code=$course_code'>
                        <li>$period $year | $name_en | $name_tr</li>
                    </a>
                    <hr>";
                    }
                ?>


                <?php  } else echo "
                No Courses this semester 
                " ?>
            </ul>
        </div>
    </div>
</div>

<?php
require('../lecturer/includes/footer.php');
?>