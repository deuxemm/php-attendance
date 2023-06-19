<?php
require_once 'db/conn.php';
echo 'DB connected successfully';

// Get values from post operation
if (isset($_POST['submit'])) {
    // extract values from $_POST array
    // and add $id since data (to edit) exits now
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

    // Call crud function
    $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty);
    // Redirect to viewrecords.php
    if ($result) {
        header("Location: viewrecords.php");
    }
} else {
    echo 'error';
}


?>