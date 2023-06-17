<?php

class crud
{
    // private database object
    private $db;

    // constructor to initialise private variable to the databse connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into attendee & specialties tables 
    public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
            // prepare sql statement for execution
            $stmt = $this->db->prepare($sql);

            // bind all placeholders to the actual values (PDO methodology)
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty', $specialty);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees()
    {
        $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSpecialties()
    {
        $sql = "SELECT * FROM `specialties`";
        $result = $this->db->query($sql);
        return $result; 
    }

}
?>