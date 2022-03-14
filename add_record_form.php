<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Update Record</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br><br>
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
            
            <label>&nbsp;</label>
            <input type="submit" value="Update Record">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>