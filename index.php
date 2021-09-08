
<?php 
$title = "Home";

require_once 'components/header.php'; 
require_once 'components/db/connect.php';

$result = $crud -> getspecialties();

?>

    <h1>Register for IT Conference</h1> 

<!-- method="get" -->
<form method = "post" action="success.php">
    <p>First Name: </p>
<input type="text" name="firstname" id = "firstname" required="required" size="100">
<p>Last Name: </p>
<input type="text" required="required" id="lastname" name="lastname" size="100">
<p>Date Of Birth: </p>
<input type="text" id="dob" name="dob" required="required" size="100">
<p>Area of Expertise: </p>
<select name="Categories" required="required" id="categories" style="width: 76%;">

<?php 

    while ($r = $result -> fetch(PDO::FETCH_ASSOC))
    {
?>

    <option value = "<?php echo $r['specialty_id'] ?> " > <?php echo $r['name']; ?> </option>

<?php 
    }
?>    

</select>
<p>E-mail Address: </p>
<input type="email" id = "mail" name="mail" required="required" size="100">
<p>Contact Number: </p>
<input type="ctype_digit" id="contact" name="contact" required="required" size="100">
<br/>
<button type="submit" id = "submit" name="submit" class="btn btn-primary btn-block" style = "width:985px;" value="Submit">Submit</button>
</form>



<?php require_once 'components/nav.php' ?>