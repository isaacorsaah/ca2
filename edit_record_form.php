<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">

                   <label for="fname">First name:</label>
            <input type="text" name="fname" required><br><br>
            <label for="lname">Last name:</label>
            <input type="text" name="lname" required><br><br>

            <label>Age:</label>
            <input type="number" size="4" name="age" placeholder="" min="18"  required>
            <br><br> 
            
            <label>Residence:</label>
            <input type="text" name="residence" required>
            <br><br>  

            <label>Co-founder and CEO:</label>
            <input type="text"  name="ceo" required>
            <br><br>  

            <label>Net Worth:</label>
            <input type="currency" name="networth" placeholder="" value="0.00"  required>
            <br><br>  

            <label>Ownership Stake:</label>
            <input type="text" name="stake" required>
            <br><br>  
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br><br>
        
           
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
       
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>