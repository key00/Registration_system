<?php
require("../sAffairs/includes/db.php");

global $con;
// if (isset($_GET['student'])) {
//     $student = $_GET['student'];
//     $stdNumber = mysqli_real_escape_string($con, $student);
//     $_SESSION['student'] = $stdNumber;
// }
$studentId = $_SESSION['student'];
$get_info = "select * from payments where studentId=$studentId";
$run_info = mysqli_query($con, $get_info);

$get_student = "select * from students where studentId=$studentId";
$run_student = mysqli_query($con, $get_student);
$row_student = mysqli_fetch_array($run_student);
$scholarship = $row_student['scholarship'];
$tuition = 5600 * (1 - ($scholarship / 100));


?>

<a href="add_payment.php" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Add Payment</a>

<div class='card'>
    <div class='card-body p-4'>
        <h3 class="text-center card-title pb-4 mb-3">PAYMENT DETAILS</h3>
        <div class="row">
            <div class="col-lg-6">
                <table class="table bg-light mt-3">
                    <tr>
                        <th>Tuition fees</th>
                        <td>$ <?= $tuition; ?></td>
                    </tr>
                    <tr>
                        <th>Lunch</th>
                        <td> $ 1500</td>
                    </tr>
                    <tr>
                        <th>Residence</th>
                        <td> $ 2000</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6">

            </div>
        </div>

        <table class="table table-responsive table-borderless table-hover m-1">
            <thead>
                <tr class='table-success'>
                    <th class='text-center table-header' colspan='5'> Spring 2022-2023</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                </tr>

                <?php
                if (mysqli_num_rows($run_info) > 0) {
                    while ($row_info = mysqli_fetch_array($run_info)) {
                        $date = $row_info['pay_date'];
                        $period = $row_info['period'];
                        $year = $row_info['year'];
                        $type = $row_info['type'];
                        $amount = $row_info['amount'];
                        $date = $row_info['pay_date'];


                ?>
                        <tr class="py-1">
                            <td><?= $type; ?></td>
                            <td class="amount">$ <?= $amount; ?></td>
                            <td><?= $date; ?></td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>
    <?php

                } else echo "<tr> <td>No Payments Available</td></tr>";
    ?>
    </div>
</div>