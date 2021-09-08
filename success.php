<?php 
$title = "Success";
require_once 'components/header.php';
require_once 'components/db/connect.php';

if(isset($_POST['submit']))
{
    //extract values from the $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['mail'];
    $category = $_POST['Categories'];
    $contact = $_POST['contact'];

    //call function to insert and track if success or not
    $issuccess = $crud->insertattendees($fname,$lname,$dob,$email,$category,$contact);

    if($issuccess)
    {

        //echo '<h1 class="text-success">You have been registered successfully</h1>';
      include "components/successmsg.php";
        
    }

    else
    {

        include "components/errormsg.php";

    }
}

?>


<!-- get method
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo 'Full Name: '. $_GET['firstname'] . ' '.$_GET['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['Categories'] ?></h6>
    <p class="card-text"> <?php 
    //echo 'Date of Birth: '.$_GET['dob'] .'<br/>';
//echo 'Email Address: '.$_GET['mail'].'<br/>';
//echo 'Contact Number: '.$_GET['contact'].'<br/>';
    ?>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo 'Full Name: '. $_POST['firstname'] . ' '.$_POST['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['Categories'] ?></h6>
    <p class="card-text"><?php 
    echo 'Date of Birth: '.$_POST['dob'] .'<br/>';
echo 'Email Address: '.$_POST['mail'].'<br/>';
echo 'Contact Number: '.$_POST['contact'].'<br/>';
    ?>
  </div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>

<?php require_once 'components/nav.php' ?>