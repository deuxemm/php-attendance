<?php
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

// First check if the id exists in the DB 
if (!$_GET['id']) {
    // echo 'error';
    include 'includes/errormsg.php';
    // redirect to this page in case of error
    header("Location: viewrecords.php");
} else {
    // Get id values
    $id = $_GET['id'];

    // Call Delete function
    $result = $crud->deleteAttendee($id);

    // Redirect to list
    if ($result) {
        header("Location: viewrecords.php");
    } else {
        // echo 'error';
        include 'includes/errormsg.php';
    }

}


?>