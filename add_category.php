<?php
// Get the category data
$fname = $fname = filter_input(INPUT_POST, 'fname');

// Validate inputs
if ($fname == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database
    $query = "INSERT INTO categories (categoryName)
              VALUES (:fname)";
    $statement = $db->prepare($query);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':residence', $residence);
    $statement->bindValue(':ceo', $ceo);
    $statement->bindValue(':networth', $networth);
    $statement->bindValue(':stake', $stake);
    $statement->bindValue(':image', $image);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>