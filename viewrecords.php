<?php
$title = 'View Records';

require_once 'includes/header.php';
require_once 'db/conn.php';

$results = $crud->getAttendees();
?>

<table class="table">

    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Email Address</th>
        <th>Contact Number</th>
        <th>Specialty</th>
    </tr>

    <!-- using PHP to dynamically generate a table with a while loop -->
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $r['attendee_id'] ?></td>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['dateofbirth'] ?></td>
            <td><?php echo $r['emailaddress'] ?></td>
            <td><?php echo $r['contactnumber'] ?></td>
           <!-- 
            because we changed - public function getAttendees(),
            inside of crud.php - we can change this last line to use 'name'
            instead of 'specialty_id' 
            -->
            <td><?php echo $r['name'] ?></td> 

        </tr>
    <!-- this next piece of syntx is to close the curly braces above -->
    <?php } ?>

    <!-- rather use PHP (above). This was purely sample code to test/show table & formatting -->
    <!-- <tr>
        <td>1</td>
        <td>fname value</td>
        <td>lname value</td>
        <td>dob</td>
        <td>someone@gmail.com</td>
        <td>89374587847</td>
        <td>DB Admin</td>
    </tr> -->

</table>


<br>
<?php require_once 'includes/footer.php'; ?>