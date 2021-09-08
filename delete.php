<?php
$title = 'delete';
require_once 'components/header.php';
require_once 'components/db/connect.php';

if(!$_GET['id'])
{
    //echo 'error';
    include "components/errormsg.php";
    header("Location: viewrecords.php");
}

else 
{
    //Get ID values
    $id = $_GET['id'];


    //Call delete function
    $result = $crud -> deleteattendee($id);

    //Redirect to list
    if ($result)
    {
        header("Location: viewrecords.php");
    }
    else
    {
        include "components/errormsg.php";
    }

}

?>

<br/>
<br/>
<br/>
<?php require_once 'components/nav.php' ?>