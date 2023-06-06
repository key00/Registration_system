<?php
require('../student/includes/header.php')
?>
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


  <?php getSemester()
  ?>



  </table>
</div>

<div class="std_transc dashboard container">

  <?php get_all_semesters()
  ?>

</div>

<div class="transfer dashboard container">

  <?php
  global $con;
  $get_transfer = "select * from transfer where studentId=$std_num";
  $run_transfer = mysqli_query($con, $get_transfer);
  $row_transfer = mysqli_fetch_array($run_transfer);
  if ($row_transfer == 0) {
    echo "
                    <table class='table table-hover bg-light table-borderless mt-3'>

            <thead class='table-success'>
              <tr>
                <th class='text-center table-header ' colspan='7'>Transfer Courses</th>
              </tr>

            </thead></table>
                    <div class='card mt-4'>
                      <div class='card-body p-4'>
                        <h5 class='text-center'>No transfer courses available</h5>
                      </div>
                    </div>
          
          ";
  } else {
    $code = $row_transfer['CourseCode'];
    $name_en = $row_transfer['name_en'];
    $name_tr = $row_transfer['name_tr'];
    $credits = $row_transfer['credits'];
    $ects = $row_transfer['ects'];
    $category = $row_transfer['category'];
    $grade = $row_transfer['grade'];



  ?>

    <table class="table table-hover bg-light table-borderless mt-3">

      <thead class="table-success">
        <tr>
          <th class="text-center table-header " colspan="7">Transfer Courses</th>
        </tr>

      </thead>
      <tbody class="table-group-divider">
        <tr class="table-secondary">
          <th scope="col">Cat</th>
          <th scope="col">Code</th>
          <th scope="col">course Name(EN)</th>
          <th scope="col">course Name(TR)</th>
          <th scope="col">Credits</th>
          <th scope="col">ECTS</th>
          <th scope="col">Grade</th>
        </tr>
        <tr>
          <td scope="row"><?php echo $category; ?></td>
          <td scope="row"><?php echo $code; ?></td>
          <td scope="row"><?php echo $name_en; ?></td>
          <td scope="row"><?php echo $name_tr; ?></td>
          <td scope="row"><?php echo $credits; ?></td>
          <td scope="row"><?php echo $ects; ?></td>
          <td scope="row"><?php echo $grade;
                        } ?></td>


        </tr>

      </tbody>
    </table>

</div>

<div class="courses dashboard container">
  <div class="row row-tables">
    <div class="col-lg-6">
      <table class="table bg-light mt-3 pe-4">
        <?php get_credits() ?>
      </table>
    </div>
    <div class="col-lg-6">
      <table class="table bg-light mt-3">
        <tr>
          <th>CC</th>
          <td>Compulsory Course</td>
        </tr>
        <tr>
          <th>TE</th>
          <td>Technical Elective</td>
        </tr>
        <tr>
          <th>NTE</th>
          <td>Non-Technial Elective</td>
        </tr>
      </table>
    </div>

  </div>

  <?php get_courses_left() ?>
  <table class="table table-hover bg-light table-borderless mt-3">

    <thead>
      <tr class="table-success">
        <th class="text-center table-header" colspan="7">All <?php echo $dep_name; ?> courses</th>
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
      <?php getCourses()
      ?>

    </tbody>
  </table>
</div>

</div>
</div>

<?php
require('../student/includes/footer.php')
?>