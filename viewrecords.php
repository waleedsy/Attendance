<?php
$title = 'viewrecords';
require_once 'components/header.php';
require_once 'components/db/connect.php';

//get attendees
$results = $crud->getattendees();

?>


<table class="table">
    <tr>
        <th>#</th>
        <th>&nbsp; First Name</th>
        <th>&nbsp; Last name</th>
        <th>&nbsp; Speciality</th>
        <th>Actions</th>
        
    </tr>

        <?php

            while ($r = $results -> fetch(PDO::FETCH_ASSOC))
            {

        ?>

        <tr>

            <td> <?php echo $r['attendees_ID']; ?> </td>
            <td> <?php echo $r['firstname']; ?> </td>
            <td> <?php echo $r['lastname']; ?> </td>
            <td> <?php echo $r['name']; ?> </td>
            <td>
                 <a href="viewuser.php?id=<?php echo $r['attendees_ID']; ?>" class="btn btn-primary">View</a>
                 <a href="edit.php?id=<?php echo $r['attendees_ID']; ?>" class="btn btn-warning">Edit</a>
                 <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendees_ID']; ?>" class="btn btn-danger">Delete</a>
            </td>
            
        </tr>

        <?php

            }

        ?>
    
</table>


<br/>
<br/>
<br/>
<?php require_once 'components/nav.php' ?>