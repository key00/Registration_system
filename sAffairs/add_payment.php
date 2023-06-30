<?php
require("../sAffairs/includes/header.php");
require("../sAffairs/includes/db.php");

$studentId = $_SESSION['student'];
$get_info = "select * from students where studentId=$studentId";
$run_info = mysqli_query($con, $get_info);



?>

<div class='card m-3'>
    <div class='card-body p-4'>
        <h3 class="text-center card-title pb-4 mb-3">PAYMENT DETAILS</h3>

        <form action="" method="post" class="">
            <label for="" class="form-label">Type</label>
            <select name="type" id="" class="form-select">
                <option value="" disabled selected>--Select--</option>
                <option value="Tuition fees">Tuition fees</option>
                <option value="Lunch">Lunch</option>
                <option value="Residence">Residence</option>
            </select>
            <label for="" class="form-label">Period</label>
            <select name="period" id="" class="form-select">
                <option value="" disabled selected>--Select--</option>
                <option value="Spring">Spring</option>
                <option value="Fall">Fall</option>
                <option value="summer">Summer</option>
            </select>
            <label for="" class="form-label">Year</label>
            <input type="text" class="form-control" name="year" id="">
            <label for="" class="form-label">Amount</label>
            <input type="text" name="amount" id="" class="form-control">
            <button class="btn btn-success my-3" name="add_payment">ADD</button>
        </form>
    </div>
</div>

<?php

if (isset($_POST['add_payment'])) {

    $year = $_POST['year'];
    $period = $_POST['period'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];

    // echo $year . $period . $type . $amount . $studentId;
    $add = "insert into payments (id,studentId,type,period,year,pay_date,amount) 
                        values ('','$studentId','$type','$period','$year',NOW(),'$amount')";
    $run_add = mysqli_query($con, $add);
    if ($run_add) {
        echo "<script>alert('Payment Updated')</script>";
        echo "<script>window.open('index.php?student=$studentId','_self')</script>";
    }
}
?>


<?php
require('../sAffairs/includes/footer.php');
?>