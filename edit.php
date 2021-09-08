
<?php 
$title = "Edit Record";

require_once 'components/header.php'; 
require_once 'components/db/connect.php';

$result = $crud -> getspecialties();

if (!isset($_GET['id']))
{
    //echo "error";
    include "components/errormsg.php";
    header("Location: viewrecords.php");
}

else
{
    $id = $_GET['id'];
    $attendee = $crud -> getuserdetails($id);

?>

    <h1>Edit Record</h1> 

<!-- method="get" -->
<form method = "post" action="editpost.php">
    <input type = "hidden" name = "id" value = " <?php echo $attendee['attendees_ID'] ; ?>" />
    <p>First Name: </p>
<input type="text" name="firstname" value = " <?php echo $attendee['firstname'] ; ?>"  id = "firstname" required="required" size="100">
<p>Last Name: </p>
<input type="text" required="required" value = " <?php echo $attendee['lastname'] ; ?>" id="lastname" name="lastname" size="100">
<p>Date Of Birth: </p>
<input type="text" id="dob" value = " <?php echo $attendee['dob'] ; ?>" name="dob" required="required" size="100">
<p>Area of Expertise: </p>
<select name="Categories" required="required" value = " <?php echo $attendee['name'] ; ?>" id="categories" style="width: 76%;">

<?php 

    while ($r = $result -> fetch(PDO::FETCH_ASSOC))
    {
?>

    <option value = "<?php echo $r['specialty_id'] ?> " <?php if ($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'?> > 
    <?php echo $r['name']; ?> 
</option>

<?php 
    }
?>    

</select>
<p>E-mail Address: </p>
<input type="email" id = "mail" value = " <?php echo $attendee['email'] ; ?>" name="mail" required="required" size="100">
<p>Contact Number: </p>
<input type="ctype_digit" id="contact" value = " <?php echo $attendee['contact'] ; ?>" name="contact" required="required" size="100">
<br/>
<button type="submit" id = "submit" name="submit" style = "width:985px;" class="btn btn-success btn-block" value="Submit">Save Changes</button>
</form>

<?php } ?>

<?php require_once 'components/nav.php' ?>