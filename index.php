<?php
$title = 'Index';

require_once 'includes/header.php';
require_once 'db/conn.php';
?>

<!-- 
    There are the fields we're designing our form to collect
    - First Name
    - Last Name 
    - DOB (Use DatePicker)
    - Speciality (Database Admin, Software Developer, Web Administrator)
    - Email Address
    - Contact Number
 -->

<h2 class="text-center">Registration for IT Conference</h2>

<form method="post" action=success.php>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob">
    </div>

    <div class="form-group">
        <label for="specialty">Primary Area of Expertise (role)</label>
        <select class="form-control" id="specialty" name="specialty">
            <option value="2">Other</option>
            <option value="3">Cloud Engineer</option>
            <option value="1">DB Admin</option>
            <option value="4">Security</option>
            <option value="5">Software Dev</option>
            <option value="6">SRE</option>
            <option value="7">Web Admin</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="phone">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>


<br>
<?php require_once 'includes/footer.php'; ?>