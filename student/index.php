<?php
require('../student/includes/header.php')
?>
<div class="p_info dashboard active container mt-3">
  <?php if (isset($_GET['pinfo'])) {
    include('pinfo.php');
  }
  ?>
</div>

<div class="current dashboard active container">


  <?php if (isset($_GET['semester'])) {
    include('semester.php');
  }
  ?>



  </table>
</div>

<div class="std_transc dashboard active container">

  <?php if (isset($_GET['transcript'])) {
    include('transcript.php');
  }
  ?>

</div>

<div class="transfer dashboard active container">

  <?php if (isset($_GET['transfer'])) {
    include('transfer.php');
  }
  ?>

</div>

<div class="courses dashboard active container">
  <?php if (isset($_GET['courses'])) {
    include('courses.php');
  }
  ?>
</div>

</div>
</div>

<?php
require('../student/includes/footer.php')
?>