<?php
require("../includes/db.php");

?>

<div class="course dashboard active">
    <table class="table bg-light" style="width: 50%;">
        <?php get_credits()
        ?>
    </table>
    <?php get_courses_left();
    ?>

</div>