<?php require("./includes/db.php");
if (isset($_GET['user'])) {
    $username = $_GET['user'];

?>

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
                    <h5 class="pt-2 sec-title">Registration Portal</h5>


                    <form action="" method="POST" class="login-form">
                        <label class="form-label"> LOG IN AS</label>
                        <div class="text-center"><input type="radio" name="role" value="lecturer" /> Lecturer</div>
                        <div class="text-center"><input type="radio" name="role" value="advisor" /> Advisor</div>

                        <button class="btn-primary" type="submit" name="proceed">Proceed</button>
                    </form>
                </div>
            </div>

        </div>


    </body>

    </html>

<?php
} else {
    echo "<script>window.open('login.php','_self')</script>";
} ?>

<?php
if (isset($_POST['proceed'])) {

    $role = $_POST['role'];

    if ($role == 'advisor') {
        session_start();
        $_SESSION['advisor_id'] = $username;
        echo $_SESSION['advisor_id'];
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('advisor/index.php','_self')</script>";
    } elseif ($role == 'lecturer') {
        session_start();
        $_SESSION['lecturer_id'] = $username;
        echo $_SESSION['lecturer_id'];
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('lecturer/index.php','_self')</script>";
    }
}
?>