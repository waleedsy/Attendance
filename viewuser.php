<?php
$title = 'viewuser';
require_once 'components/header.php';
require_once 'components/db/connect.php';

//get attendees by id

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $result = $crud -> getuserdetails($id);
}

else
{
    //echo "<h1 class='text-danger'>Please check details and try again</h1>";
    include "components/errormsg.php";
}

?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo 'Full Name: '. $result['firstname'] . ' '.$result['lastname']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'] ?></h6>
    <p class="card-text"><?php 
    echo 'Date of Birth: '.$result['dob'] .'<br/>';
echo 'Email Address: '.$result['email'].'<br/>';
echo 'Contact Number: '.$result['contact'].'<br/>';
    ?>                                             
  </div>
</div>

<br/>
  <a href="viewrecords.php" class="btn btn-info">Back to list</a>
  <a href="edit.php?id=<?php echo $result['attendees_ID']; ?>" class="btn btn-warning">Edit</a>
  <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendees_ID']; ?>" class="btn btn-danger">Delete</a>
            

    <!-- <a href="#" class="card-link">Another link</a> -->
  </div>
</div> 

<!-- 
        <td> <?php // echo $r['dob']; ?> </td>
            <td> <?php //echo $r['email']; ?> </td>
            <td> <?php // echo $r['contact']; ?> </td> -->


<br/>
<br/>
<br/>
<?php require_once 'components/nav.php' ?>