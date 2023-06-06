<?php require("./includes/db.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration System</title>
  <link rel="icon" href="images/UoK_logo.jpg" />
  <link rel="stylesheet" href="main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body class="login-body">
  <div class="main-wrap">

    <div class="login row">
      <div class="col-md-6 login-left">

        <img src="images/UoK_logo.jpg" alt="Logo" width="200" height="200" />
      </div>
      <div class="col-md-6 login-right">
        <h3 class="mt-2 pt-3">University of Kyrenia</h3>
        <h5 class="pt-2 sec-title">Student Portal</h5>

        <?php if (isset($_GET['error'])) {
        ?>
          <p class="error"> <?php echo $_GET['error'];
                            ?></p>

        <?php }
        ?>
        <form action="login.php" method="POST" class="login-form">
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />

          <button class="btn-primary" type="submit" name="login">Login</button>
        </form>
      </div>
    </div>

  </div>


</body>

</html>

<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $check_student = "SELECT * FROM students WHERE studentId='$username' AND stdpass='$password'";
  $run_student = mysqli_query($con, $check_student);

  $check_secretary = "SELECT * from faculty where f_email='$username' and issecretary=1";
  $run_secretary = mysqli_query($con, $check_secretary);

  $check_advisor = "SELECT * from faculty where f_email='$username' and isadvisor=1";
  $run_advisor = mysqli_query($con, $check_advisor);


  if (mysqli_num_rows($run_student) > 0) {
    session_start();
    $_SESSION['student_id'] = $username;
    echo "<script>alert('Login successful')</script>";
    echo "<script>window.open('student/index.php','_self')</script>";
  } elseif (mysqli_num_rows($run_secretary) > 0) {
    session_start();
    $_SESSION['secretary_id'] = $username;
    echo "<script>alert('Login successful')</script>";
    echo "<script>window.open('secretary/index.php','_self')</script>";
  } elseif (mysqli_num_rows($run_advisor) > 0) {
    session_start();
    $_SESSION['advisor_id'] = $username;
    echo "<script>alert('Login successful')</script>";
    echo "<script>window.open('advisor/index.php','_self')</script>";
  } else {
    header("Location: login.php?error=Incorrect password");
    exit();
  }
}
?>