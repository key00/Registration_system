<?php

$con = mysqli_connect("localhost", "root", "", "registration_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
