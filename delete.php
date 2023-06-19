<?php
require_once 'db/conn.php';

// First check if the id exists in the DB 
if (!$_GET['id']) {
    echo 'error';
} else {
    // Get id values
    $id = $_GET['id'];

    // Call Delete function
    $result = $crud->deleteAttendee($id);

    // Redirect to list
    if ($result) {
        header("Location: viewrecords.php");
    } else {
        echo 'error';
    }

}


?>