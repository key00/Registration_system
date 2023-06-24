<?php
require("../HR/includes/header.php");
require("../HR/includes/db.php"); ?>


<div class="search-box m-3">

    <a href="add_academic.php" class="btn add"><i class="fa-solid fa-plus"></i> Add New Academic</a>
    <form action="" method="POST">
        <input type="text" name="academic" id="" placeholder="search Academic Number" required>
        <button class="btn" type="submit" name="search_academic"><i class="fa-solid fa-magnifying-glass"></i></button>

    </form>


</div>

<div class="container info dashboard active mt-3 pt-3">
    <?php if (isset($_POST['search_academic']) or isset($_SESSION['academic'])) {
        include("academic_info.php");
    }
    ?>
</div>

<?php
require('../HR/includes/footer.php');
?>