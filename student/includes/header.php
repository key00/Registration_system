<?php

session_start();
require("../student/includes/db.php");
require("../student/functions.php");
global $con;
if (isset($_SESSION['student_id'])) {

    $std_num = $_SESSION['student_id'];
    $get_student = "select * from students where studentId=$std_num";
    $run_student = mysqli_query($con, $get_student);
    $row_student = mysqli_fetch_array($run_student);
    $fname = $row_student['firstName'];
    $lname = $row_student['lastName'];
    $dob = $row_student['date_birth'];
    $gender = $row_student['gender'];
    $stdmail = $row_student['stdEmail'];
    $country = $row_student['country'];
    $pass_num = $row_student['passportNum'];
    $scholarship = $row_student['scholarship'];
    $advisorid = $row_student['advisor'];

    $get_advisor = "select * from academic where id='$advisorid' and isadvisor=1";
    $run_advisor = mysqli_query($con, $get_advisor);
    $row_advisor = mysqli_fetch_array($run_advisor);
    $advisor = $row_advisor['firstName'] . " " . $row_advisor['lastName'];


    $department = $row_student['dId'];

    $get_dep = "select * from departments where dId=$department";
    $run_dep = mysqli_query($con, $get_dep);
    $row_dep = mysqli_fetch_array($run_dep);
    $dep_name = $row_dep['departmentName'];
} else echo "<script> window.open('../login.php','_self')</script>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/UoK_logo.jpg" />
    <title>Registration System</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="../main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg">
            <div class="navbar-brand">
                <a href="../student/index.php"><img src="../images/second_logo.png" alt="" width="250" height="50" /></a>
            </div>
            <div class="collapse navbar-collapse px-4">
                <ul class="navbar-nav"><i class="fa-solid fa-bars sidebarBtn" style="color: #fff;"></i></ul>
                <ul class="navbar-nav user">
                    <li class="nav-item dropdown"><a class="user nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-2"></i> <?php echo $std_num ?> </a>
                        <ul class="dropdown-menu">
                            <!-- <li><a class="dropdown-item" href="../student/change_password.php"><i class="fa-solid fa-key pe-2"></i>Change password</a></li> -->
                            <li><a class="dropdown-item" href="../logout.php"> <i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a></li>
                            <!-- <li><hr class="dropdown-divider"></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <div class="wrapper">
        <div class="aside">
            <div class="profile">
                <div class="text-center">
                    <img class="user-img text-center" src="../images/user3.png" alt="" />
                </div>
                <hr />

                <p class="text-center full_name"><strong><?php echo $fname; ?> <?php echo $lname; ?></strong></p>
                <hr />
                <p class="text-center"><strong><?php echo $std_num; ?></strong></p>
                <hr />

                <div class="sidenav">
                    <ul>
                        <a href="index.php?pinfo">
                            <li class="pinfo content <?php if (isset($_GET['pinfo'])) {
                                                            echo "active";
                                                        } ?>"><i class="fa-solid fa-circle-info pe-3"></i>Personal Informations</li>
                        </a>
                        <a href="index.php?semester">
                            <li class="curr_sem content <?php if (isset($_GET['semester'])) {
                                                            echo "active";
                                                        } ?>"><i class="fa-solid fa-location-pin pe-3"></i>Current Semester</li>
                        </a>
                        <a href="index.php?transcript">
                            <li class="trans content <?php if (isset($_GET['transcript'])) {
                                                            echo "active";
                                                        } ?>"><i class="fa-solid fa-scroll pe-3"></i>Transcript</li>
                        </a>
                        <a href="index.php?courses">
                            <li class="course content <?php if (isset($_GET['courses'])) {
                                                            echo "active";
                                                        } ?>"><i class="fa-brands fa-discourse pe-3"></i>Courses</li>
                        </a>
                        <a href="index.php?transfer">
                            <li class="transfer content <?php if (isset($_GET['transfer'])) {
                                                            echo "active";
                                                        } ?>"><i class="fa-solid fa-paper-plane pe-3"></i>Transfer Courses</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main">