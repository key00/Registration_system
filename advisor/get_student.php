<?php
// require("../includes/db.php");


// function get_info($stdNumber)
// {
//     global $con;

//     $stdNumber = mysqli_real_escape_string($con, $stdNumber);

//     $get_info = "select * from students where studentId=$stdNumber";
//     $run_info = mysqli_query($con, $get_info);

//     if (mysqli_num_rows($run_info) > 0) {
//         // Fetch the student information
//         $row_info = mysqli_fetch_array($run_info);

//         // Return the student information
//         return $row_info;
//     } else {
//         // Return null if no student is found
//         return null;
//     }
// }

// if (isset($_POST['search_student'])) {


//     global $con;
//     $student = $_POST['stdId'];
//     $student_info = get_info($student);

//     if ($student_info) {
//         $fname = $student_info['firstName'];
//         $lname = $student_info['lastName'];
//         $dob = $student_info['date_birth'];
//         $gender = $student_info['gender'];
//         $stdmail = $student_info['stdEmail'];
//         $country = $student_info['country'];
//         $pass_num = $student_info['passportNum'];
//         $scholarship = $student_info['scholarship'];
//         $advisor = $student_info['advisor'];
//         $department = $student_info['dId'];

//         $get_dep = "select * from departments where dId=$department";
//         $run_dep = mysqli_query($con, $get_dep);
//         $row_dep = mysqli_fetch_array($run_dep);
//         $dep_name = $row_dep['departmentName'];
//         echo "
//             <div class='card'>
//               <div class='card-body p-4'>
//                 <div class='row info'>
//                   <div class='col-5 col-md-5'>
//                     <p>Name:  $fname </p>
//                     <p>Surname:  $lname </p>
//                     <p>Date of birth:  $dob </p>
//                     <p>Gender:  $gender </p>
//                     <p>Email:  $stdmail </p>
    
    
//                   </div>
//                   <div class='col-5 col-md-5'>
//                     <p>Country of Origin:  $country </p>
//                     <p>Passport Number:  $pass_num </p>
//                     <p> Father's name: Niyungeko Deo </p>
//                     <p> Mother's name: Nsabimana Laetitia</p>
//                     <p>Tel: 05338857918</p>
//                   </div>
//                 </div>
    
//               </div>
//             </div>
    
//             <div class='card mt-3'>
//               <div class='card-body p-4'>
//                 <p><i class='fa-solid fa-building-columns pe-3'></i>Faculty: Engineering</p>
//                 <p><i class='fa-solid fa-building pe-3'></i>Department:  $dep_name </p>
//                 <p><i class='fa-solid fa-inbox pe-3'></i>Status: Active Student</p>
//                 <p><i class='fa-solid fa-graduation-cap pe-3'></i>Scholarship:  $scholarship %</p>
//                 <p class='full_name'><i class='fa-solid fa-user-group pe-3'> </i>Advisor:  $advisor </p>
//               </div>
//             </div>
//             ";
//     }
// } else echo "Student not found";
