<?php

require('../advisor/includes/db.php');

global $con;
$get_lecturer = "select id, firstName, lastName from academic where islecturer=1";
$result = mysqli_query($con, $get_lecturer);
$lecturers = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lecturer = array(
            "id" => $row["id"],
            "firstName" => $row["firstName"],
            "lastName" => $row["lastName"]
        );
        $lecturers[] = $lecturer;
    }
}


// Return the data as JSON
echo json_encode($lecturers);
