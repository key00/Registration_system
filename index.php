<?php

session_start();
require("./includes/db.php");
require("./functions/functions.php");
global $con;
if (isset($_SESSION['username'])) {

  $std_num = $_SESSION['username'];
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
  $advisor = $row_student['advisor'];
  $department = $row_student['dId'];

  $get_dep = "select * from departments where dId=$department";
  $run_dep = mysqli_query($con, $get_dep);
  $row_dep = mysqli_fetch_array($run_dep);
  $dep_name = $row_dep['departmentName'];
} else echo "<script> window.open('login.php','_self')</script>";

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="navbar-brand">
        <a href=""><img src="images/second_logo.png" alt="" width="250" height="50" /></a>
      </div>
      <div class="collapse navbar-collapse px-4">
        <ul class="navbar-nav"><i class="fa-solid fa-bars sidebarBtn" style="color: #fff;"></i></ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown"><a class="user nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-2"></i> <?php echo $std_num ?> </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-key pe-2"></i>Change password</a></li>
              <li><a class="dropdown-item" href="logout.php"> <i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a></li>
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
          <img class="user-img text-center" src="images/user3.png" alt="" />
        </div>
        <hr />

        <p class="text-center full_name"><strong><?php echo $fname; ?> <?php echo $lname; ?></strong></p>
        <hr />
        <p class="text-center"><strong><?php echo $std_num; ?></strong></p>
        <hr />

        <div class="sidenav">
          <ul>
            <li class="pinfo content active"><i class="fa-solid fa-circle-info pe-3"></i>Personal Informations</li>
            <li class="curr_sem content"><i class="fa-solid fa-location-pin pe-3"></i>Current Semester</li>
            <li class="trans content"><i class="fa-solid fa-scroll pe-3"></i>Transcript</li>
            <li class="course content"><i class="fa-brands fa-discourse pe-3"></i>Courses</li>
            <li class="transfer content"><i class="fa-solid fa-paper-plane pe-3"></i>Transfer Courses</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main">

      <div class="p_info dashboard active container mt-3">
        <div class="card">
          <div class="card-body p-4">
            <div class="row info">
              <div class="col-5 col-md-5">
                <p>Name: <?php echo $fname ?></p>
                <p>Surname: <?php echo $lname ?></p>
                <p>Date of birth: <?php echo $dob ?></p>
                <p>Gender: <?php echo $gender ?></p>
                <p>Email: <?php echo $stdmail ?></p>


              </div>
              <div class="col-5 col-md-5">
                <p>Country of Origin: <?php echo $country ?></p>
                <p>Passport Number: <?php echo $pass_num ?></p>
                <p> Father's name: Niyungeko Deo </p>
                <p> Mother's name: Nsabimana Laetitia</p>
                <p>Tel: 05338857918</p>
              </div>
            </div>

          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body p-4">
            <p><i class="fa-solid fa-building-columns pe-3"></i>Faculty: Engineering</p>
            <p><i class="fa-solid fa-building pe-3"></i>Department: <?php echo $dep_name ?></p>
            <p><i class="fa-solid fa-inbox pe-3"></i>Status: Active Student</p>
            <p><i class="fa-solid fa-graduation-cap pe-3"></i>Scholarship: <?php echo $scholarship ?>%</p>
            <p class="full_name"><i class="fa-solid fa-user-group pe-3"> </i>Advisor: <?php echo $advisor ?></p>
          </div>
        </div>
      </div>

      <div class="current dashboard container">

        <table class="table table-hover bg-light table-borderless mt-3">

          <thead>
            <tr class="table-success">
              <th class="text-center table-header" colspan="8">Spring 2022-2023</th>
            </tr>

          </thead>
          <tbody class="table-group-divider">
            <tr class="table-secondary">
              <th scope="col">Cat</th>
              <th scope="col">Code</th>
              <th scope="col">Name(EN)</th>
              <th scope="col">Name(TR)</th>
              <th scope="col">Credits</th>
              <th scope="col">ECTS</th>
              <th scope="col">Lecturer</th>
              <th scope="col">Grade</th>
            </tr>
            <?php getSemester() ?>

          </tbody>
        </table>
      </div>

      <div class="std_transc dashboard container">
        <table class="table table-hover bg-light table-borderless mt-3">

          <tbody class="table-group-divider">
            <tr class="table-secondary">
              <th scope="col">Year</th>
              <th scope="col">Period</th>
              <th scope="col">Code</th>
              <th scope="col">course Name(EN)</th>
              <th scope="col">course Name(TR)</th>
              <th scope="col">Credits</th>
              <th scope="col">Grade</th>
            </tr>

            <?php getGrades() ?>

          </tbody>
        </table>

      </div>

      <div class="transfer dashboard container">

        <table class="table table-hover bg-light table-borderless mt-3">

          <thead class="table-success">
            <tr>
              <th class="text-center table-header " colspan="4">Fall 2019-2020</th>
            </tr>

          </thead>
          <tbody class="table-group-divider">
            <tr class="table-secondary">
              <th scope="col">Code</th>
              <th scope="col">course Name</th>
              <th scope="col">Credits</th>
              <th scope="col">Grade</th>
            </tr>
            <tr>
              <td scope="row">MTH101</td>
              <td>Analysis</td>
              <td>4</td>
              <td>AA</td>
            </tr>
            <tr>
              <td scope="row">MTH101</td>
              <td>Analysis</td>
              <td>4</td>
              <td>AA</td>
            </tr>
            <tr>
              <td scope="row">MTH101</td>
              <td>Analysis</td>
              <td>4</td>
              <td>AA</td>
            </tr>
            <tr>
              <td scope="row">MTH101</td>
              <td>Analysis</td>
              <td>4</td>
              <td>AA</td>
            </tr>
            <tr>
              <td scope="row">MTH101</td>
              <td>Analysis</td>
              <td>4</td>
              <td>AA</td>
            </tr>
          </tbody>
        </table>

      </div>

      <div class="courses dashboard container">
        <table class="table table-hover bg-light table-borderless mt-3">

          <thead>
            <tr class="table-success">
              <th class="text-center table-header" colspan="7">Fall semester</th>
            </tr>

          </thead>
          <tbody class="table-group-divider">
            <tr class="table-secondary">
              <th scope="col">Cat</th>
              <th scope="col">Code</th>
              <th scope="col">Name(EN)</th>
              <th scope="col">Name(TR)</th>
              <th scope="col">Credits</th>
              <th scope="col">ECTS</th>
              <th scope="col">Pre-requisite</th>
            </tr>
            <?php getCourses() ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>

  <script src="./script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>