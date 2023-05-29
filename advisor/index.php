<?php

session_start();
require("../includes/db.php");
require("../functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/UoK_logo.jpg" />
    <title>Registration</title>
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
                <a href=""><img src="../images/second_logo.png" alt="" width="250" height="50" /></a>
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
                        <li class="students content active"><i class="fa-solid fa-circle-info pe-3"></i>Students</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="main">

            <div class="students dashboard active container mt-3">
                <div class="search-box my-3">
                    <input type="text" name="stdId" id="" placeholder="search Student Number">
                    <button class="btn" id="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>

                </div>
                <div class="std-section mb-3">
                    <ul class="nav nav-pills mb-4" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-tab-pane" type="button" role="tab" aria-controls="info-tab-pane" aria-selected="true"><i class="fa-solid fa-circle-info pe-3"></i>Personal Informations</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="semester-tab" data-bs-toggle="tab" data-bs-target="#semester-tab-pane" type="button" role="tab" aria-controls="semester-tab-pane" aria-selected="false"><i class="fa-solid fa-location-pin pe-3"></i>Current Semester</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="transc-tab" data-bs-toggle="tab" data-bs-target="#transc-tab-pane" type="button" role="tab" aria-controls="transc-tab-pane" aria-selected="false"><i class="fa-solid fa-scroll pe-3"></i>Transcript</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="course-tab" data-bs-toggle="tab" data-bs-target="#course-tab-pane" type="button" role="tab" aria-controls="course-tab-pane" aria-selected="false"><i class="fa-brands fa-discourse pe-3"></i>Courses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="transfer-tab" data-bs-toggle="tab" data-bs-target="#transfer-tab-pane" type="button" role="tab" aria-controls="transfer-tab-pane" aria-selected="false"><i class="fa-solid fa-paper-plane pe-3"></i>Transfer Courses</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info-tab-pane" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
                            hello1

                        </div>
                        <div class="tab-pane fade show" id="semester-tab-pane" role="tabpanel" aria-labelledby="semester-tab" tabindex="0">
                            hello5

                        </div>
                        <div class="tab-pane fade" id="transc-tab-pane" role="tabpanel" aria-labelledby="transc-tab" tabindex="0">
                            hello2

                        </div>
                        <div class="tab-pane fade" id="course-tab-pane" role="tabpanel" aria-labelledby="course-tab" tabindex="0">
                            hello3

                        </div>
                        <div class="tab-pane fade" id="transfer-tab-pane" role="tabpanel" aria-labelledby="transfer-tab" tabindex="0">
                            hello4

                        </div>
                    </div>


                </div>

            </div>



        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>