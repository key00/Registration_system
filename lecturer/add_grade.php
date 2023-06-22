<?php
require("../lecturer/includes/header.php");
require("../lecturer/includes/db.php");

if (isset($_GET['course']) and isset($_GET['id'])) {
    $course_code = $_GET['course'];
    $student = $_GET['id'];

?>


<?php }
require('../lecturer/includes/footer.php');
?>