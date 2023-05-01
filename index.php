<?php
require("./includes/db.php")
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
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="navbar-brand">
        <a href=""><img src="images/second_logo.png" alt="" width="250" height="50" /></a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav"><i class="fa-solid fa-bars" id="aside" style="color: #d1e2ff;"></i></ul>
        <ul class="navbar-nav left">
          <li class="nav-item dropdown"><a class="user nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Keyna Laure INAMUGISHA</a>
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
        <img class="user-img" src="images/user.jpg" alt="" />
        <hr />
        <p class="text-center"><strong>K20190684</strong></p>
        <hr />
        <p class="text-center"><strong>KEYNA LAURE INAMUGISHA</strong></p>
        <hr />
        <p>
          <i class="fa-solid fa-building-columns pe-3"></i>Faculty of
          Engineering
        </p>
        <p><i class="fa-solid fa-building pe-3"></i>Computer Engineering</p>
        <p><i class="fa-solid fa-tag pe-3"></i>Burs 100%</p>
        <p><i class="fa-solid fa-location-dot pe-3"></i>Yabanci</p>
        <p><i class="fa-solid fa-door-closed pe-3"></i>Yabanci</p>
        <p><i class="fa-solid fa-inbox pe-3"></i>Bolumde actif ogrenci</p>
        <p><i class="fa-solid fa-calendar-days pe-3"></i>15.10.2019</p>
        <p><i class="fa-solid fa-address-card pe-3"></i>Burundi : OP0215452</p>
        <p><i class="fa-solid fa-passport pe-3"></i>OP0215452</p>
        <p><i class="fa-solid fa-user-group pe-3"> </i> ESER GEMIKONAKLI</p>
      </div>
    </div>
    <div class="main">

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>