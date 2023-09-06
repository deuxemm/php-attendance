<?php
$title = 'View Records';

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

// Get all attendess
$results = $crud->getAttendees();
?>

<table class="table">

    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <!-- design/layout decision - removed these next 3 lines off page  -->
        <!-- 
        <th>Date of Birth</th>
        <th>Email Address</th>
        <th>Contact Number</th> 
        -->
        <th>Specialty</th>
        <th>Actions</th>
    </tr>

    <!-- using PHP to dynamically generate a table with a while loop -->
    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td>
                <?php echo $r['attendee_id'] ?>
            </td>
            <td>
                <?php echo $r['firstname'] ?>
            </td>
            <td>
                <?php echo $r['lastname'] ?>
            </td>
            <!-- design/layout decision - removed these  3 lines (as for above)   -->
            <!--
            echo $r['dateofbirth']
            echo $r['emailaddress']
            echo $r['contactnumber']
            -->

            <!-- 
            because we changed - public function getAttendees(),
            inside of crud.php - we can change this last line to use 'name'
            instead of 'specialty_id' 
            -->
            <td>
                <?php echo $r['name'] ?>
            </td>
            <td>
                <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('DELETE is irreversable - are you sure!?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>"
                    class="btn btn-danger">Delete</a>
            </td>
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