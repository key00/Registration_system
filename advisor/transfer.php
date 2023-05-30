<?php
require("../includes/db.php");
?>

<?php

global $con;
if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);



?>
    <table class='table table-hover bg-light table-borderless mt-3'>

        <thead class='table-success'>
            <tr>
                <th class='text-center table-header ' colspan='7'>Transfer Courses</th>
            </tr>

        </thead>

        <tbody class='table-group-divider'>
            <tr class='table-secondary'>
                <th scope='col'>Cat</th>
                <th scope='col'>Code</th>
                <th scope='col'>course Name(EN)</th>
                <th scope='col'>course Name(TR)</th>
                <th scope='col'>Credits</th>
                <th scope='col'>ECTS</th>
                <th scope='col'>Grade</th>
            </tr>
            <?php
            $get_transfer = "select * from transfer where studentId=$stdNumber";
            $run_transfer = mysqli_query($con, $get_transfer);
            if (mysqli_num_rows($run_transfer) > 0) {

                while ($row_transfer = mysqli_fetch_array($run_transfer)) {
                    $code = $row_transfer['CourseCode'];
                    $name_en = $row_transfer['name_en'];
                    $name_tr = $row_transfer['name_tr'];
                    $credits = $row_transfer['credits'];
                    $ects = $row_transfer['ects'];
                    $category = $row_transfer['category'];
                    $grade = $row_transfer['grade'];
            ?>
                    <tr>
                        <td scope='row'> <?php echo $category; ?> </td>
                        <td scope='row'> <?php echo $code; ?> </td>
                        <td scope='row'> <?php echo $name_en; ?> </td>
                        <td scope='row'> <?php echo $name_tr; ?> </td>
                        <td scope='row'> <?php echo $credits; ?> </td>
                        <td scope='row'> <?php echo $ects; ?> </td>
                        <td scope='row'> <?php echo $grade; ?> </td>
                    </tr>


                <?php
                }

                ?>
        </tbody>
    </table>
<?php
            } else {
                echo "
          <div class='card mt-4'>
            <div class='card-body p-4'>
              <h5 class='text-center'>No transfer courses available</h5>
            </div>
          </div>
          
          ";
            }
        } ?>