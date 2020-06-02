<?php

function confirmQuery($result) {

    global $conn;

    if(!$result) {

        die("QUERY FAILED" . mysqli_error($conn) . mysqli_errno($conn));
    }



}

function escapeInjection($string) {

    global $conn;
    return mysqli_real_escape_string($conn, trim(stripslashes(htmlspecialchars($string))));
}

// function emailValidation() {

// }

// function passwordValidation() {

// }

