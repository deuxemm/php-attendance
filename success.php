<?php
$title = 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    // extract values from $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialty = $_POST['specialty'];

    // call function to insert, then track if isSuccess or not 
    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $phone, $specialty);

    if ($isSuccess) {
        // echo '<h2 class="text-center text-success">You Have Been Registered</h2>';
        include 'includes/successmsg.php';
    } else {
        // echo '<h2 class="text-center text-danger">There was an error in processing</h2>';
        include 'includes/errormsg.php';
    }

}
?>

<!-- This prints out the values that were passed to the action page using method="get"  -->
<!-- 
<br>
<h2 class="text-center text-success">You Have Been Registered</h2>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php // echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php // echo $_GET['specialty']; ?>
        </h6>

        <p class="card-text">
            Date of Birth:
            <?php // echo $_GET['dob']; ?>
        </p>
        <p class="card-text">
            Email:
            <?php // echo $_GET['email']; ?>
        </p>
        <p class="card-text">
            Contact Number:
            <?php // echo $_GET['phone']; ?>
        </p>
    </div>
</div>

// <?php
// echo $_GET['firstname'];
// echo $_GET['lastname'];
// echo $_GET['dob'];
// echo $_GET['specialty'];
// echo $_GET['email'];
// echo $_GET['phone'];
// ?>
-->


<br>
<!-- 
    took this heading tag and moved it up into the isSuccess section above
    <h2 class="text-center text-success">You Have Been Registered</h2> 
-->

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST['specialty']; ?>
        </h6>

        <p class="card-text">
            Date of Birth:
            <?php echo $_POST['dob']; ?>
        </p>
        <p class="card-text">
            Email:
            <?php echo $_POST['email']; ?>
        </p>
        <p class="card-text">
            Contact Number:
            <?php echo $_POST['phone']; ?>
        </p>
    </div>
</div>

<br>
<?php require_once 'includes/footer.php'; ?>