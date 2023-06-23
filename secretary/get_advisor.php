<?php

require('../secretary/includes/db.php');

global $con;
$get_advisor = "select id, firstName, lastName from academic where isadvisor=1";
$result = mysqli_query($con, $get_advisor);
$advisors = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $advisor = array(
            "id" => $row["id"],
            "firstName" => $row["firstName"],
            "lastName" => $row["lastName"]
        );
        $advisors[] = $advisor;
    }
}


// Return the data as JSON
echo json_encode($advisors);
