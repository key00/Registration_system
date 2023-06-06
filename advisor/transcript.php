<?php
require("../advisor/includes/db.php");


global $con;
if (isset($_POST['search_student'])) {
    $student = $_POST['stdId'];
    $stdNumber = mysqli_real_escape_string($con, $student);
    $_SESSION['student'] = $stdNumber;
}
$get_semesters = "SELECT DISTINCT year, period FROM semesters WHERE studentId=$studentId AND year BETWEEN '2019-2020' AND '2022-2023' AND period IN ('Fall', 'Spring') ORDER BY year, period ASC";
$run_semesters = mysqli_query($con, $get_semesters);

if (mysqli_num_rows($run_semesters) > 0) {
    $cumulativeCredits = 0;
    $cumulativeGradePoints = 0;

    while ($row_semesters = mysqli_fetch_array($run_semesters)) {
        $year = $row_semesters['year'];
        $period = $row_semesters['period'];

        $get_courses = "SELECT semesters.*, courses.* FROM semesters INNER JOIN courses ON semesters.course_code = courses.course_code WHERE semesters.studentId = $studentId AND semesters.year = '$year' AND semesters.period = '$period'";
        $run_courses = mysqli_query($con, $get_courses);

        $totalCredits = 0;
        $totalGradePoints = 0;


?>



        <table class='table table-hover bg-light table-borderless mt-3'>
            <thead>
                <tr class='table-success'>
                    <th class='text-center table-header' colspan='10'><?php echo $period . "&nbsp" . $year; ?></th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>
                <tr class='table-secondary'>
                    <th scope='col'>R</th>
                    <th scope='col'>Cat</th>
                    <th scope='col'>Code</th>
                    <th scope='col'>Name(EN)</th>
                    <th scope='col'>Name(TR)</th>
                    <th scope='col'>Credits</th>
                    <th scope='col'>ECTS</th>
                    <th scope='col'>Lecturer</th>
                    <th scope='col'>Grade</th>
                    <th scope="col"></th>
                </tr>

                <?php
                while ($row_course = mysqli_fetch_array($run_courses)) {



                    $category = $row_course['category'];
                    $code = $row_course['course_code'];
                    $name_en = $row_course['courseName_en'];
                    $name_tr = $row_course['courseName_tr'];
                    $credits = $row_course['credits'];
                    $ects = $row_course['ects'];
                    $lecturer = $row_course['lecturer'];
                    $grade = $row_course['grade'];


                    $get_count = "SELECT COUNT(*) AS count FROM semesters WHERE studentId = $studentId and course_code='$code'";
                    $run_count = mysqli_query($con, $get_count);
                    $row_count = mysqli_fetch_array($run_count);
                    $count = $row_count['count'];

                    $gradePoints = calculateGradePoints($grade, $credits);
                    $totalCredits += $credits;
                    $totalGradePoints += $gradePoints;

                    $semesterGPA = $totalGradePoints / $totalCredits;
                    $formattedGPA = number_format($semesterGPA, 2);

                    $cumulativeCredits += $credits;
                    $cumulativeGradePoints += $gradePoints;

                    $cgpa = $cumulativeGradePoints / $cumulativeCredits;
                    $formattedCGPA = number_format($cgpa, 2);
                ?>

                    <tr>
                        <td scope='row'><?php echo $count; ?></td>
                        <td scope='row'><?php echo $category; ?></td>
                        <td scope='row'><?php echo $code; ?></td>
                        <td scope='row'><?php echo $name_en; ?></td>
                        <td scope='row'><?php echo $name_tr; ?></td>
                        <td scope='row'><?php echo $credits; ?></td>
                        <td scope='row'><?php echo $ects; ?></td>
                        <td scope='row'><?php echo $lecturer; ?></td>
                        <td scope='row'><?php echo $grade; ?></td>
                        <td scope='row'> <a href="edit_transcript.php?course=<?= $code ?>&id=<?= $studentId ?>&period=<?= $period ?>&year=<?= $year ?>"><i class=" fa-solid fa-pen-to-square"></i></a></td>
                    </tr>

                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th class='text-end' colspan='7'> GPA: </th>
                    <th> <?php echo $formattedGPA; ?> </th>
                </tr>
                <tr>
                    <th class='text-end' colspan='7'> CGPA: </th>
                    <th> <?php echo $formattedCGPA; ?> </th>
                </tr>

            </tfoot>
        </table>
<?php
    }
} else {
    echo "<div class='card mt-4'>
    <div class='card-body p-4'>
      <h5 class='text-center'> No semesters found </h5>
    </div>
  </div>";
}

?>