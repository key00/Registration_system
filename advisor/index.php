<?php

session_start();
// $_SESSION['student'] = ''; //if i add this add and delete course are not working
require("../includes/db.php");
require("../advisor/functions.php");
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
                <a href="../advisor/index.php"><img src="../images/second_logo.png" alt="" width="250" height="50" /></a>
            </div>
            <div class="collapse navbar-collapse px-4">
                <ul class="navbar-nav"><i class="fa-solid fa-bars sidebarBtn" style="color: #fff;"></i></ul>
                <ul class="navbar-nav user">
                    <li class="nav-item dropdown"><a class="user nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-2"></i> Advisor Name </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-key pe-2"></i>Change password</a></li>
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

                <p class="text-center full_name"><strong>Advisor name</strong></p>
                <hr />

                <div class="sidenav">
                    <ul>
                        <li class="students"><i class="fa-solid fa-user pe-3"></i>Students
                            <ul class="nav nav-pills my-4 ps-3">

                                <li class="nav-item info content active"> <i class="fa-solid fa-circle-info pe-3"></i> Personal Informations
                                </li>
                                <li class="nav-item semester content "> <i class="fa-solid fa-location-pin pe-3"></i> Current Semester
                                </li>
                                <li class="nav-item transc content "> <i class="fa-solid fa-scroll pe-3"></i> Transcript
                                </li>
                                <li class="nav-item course content "> <i class="fa-brands fa-discourse pe-3"></i> Courses
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="main">

            <div class="students container mt-3">
                <div class="search-box my-3">
                    <form action="" method="POST">
                        <input type="text" name="stdId" id="" placeholder="search Student Number" required>
                        <button class="btn" type="submit" name="search_student"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                </div>

                <div class="info active dashboard">
                    <?php
                    if (isset($_POST['search_student']) or isset($_SESSION['student'])) {
                        include("student_info.php");
                    }
                    ?>
                </div>

                <div class="semester dashboard">
                    <?php
                    if (isset($_POST['search_student']) or isset($_SESSION['student'])) {
                        include("semester.php");
                    }

                    ?>
                </div>


                <div class="transc dashboard">
                    <?php
                    if (isset($_POST['search_student']) or isset($_SESSION['student'])) {
                        include("transcript.php");
                    }
                    ?>
                </div>


                <div class="course dashboard">
                    <?php
                    if (isset($_POST['search_student']) or isset($_SESSION['student'])) {
                        include("course.php");
                    }
                    ?>
                </div>


            </div>



        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>