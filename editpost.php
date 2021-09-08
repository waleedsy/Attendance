<?php

require_once 'components/db/connect.php';

if(isset($_POST['submit']))
{
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['mail'];
    $category = $_POST['Categories'];
    $contact = $_POST['contact'];

    //call crud function

    $result = $crud -> editattendee($id, $fname, $lname, $dob, $email, $category, $contact);

    // Redirect to index.php

    if ($result)
    {

        header("Location: viewrecords.php");

    }

    else
    {

        include "components/errormsg.php";

    }

}

else
{

    include "components/errormsg.php";
    
}

?>