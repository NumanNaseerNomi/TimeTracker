<?php include "../connectDB.php"; ?>

<?php

// sql to create table
$sql = "ALTER TABLE admin
AUTO_INCREMENT=3;";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>