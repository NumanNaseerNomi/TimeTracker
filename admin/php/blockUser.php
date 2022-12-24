<?php
	include "connectDB.php";

	session_start();
	if(!isset($_SESSION["userNameNL"]))
	{
		header('location:../index.php');
	}

	$uName = $_SESSION["uName"];
	$status = $_POST["status"];

	if($uName == $_SESSION["userNameNL"])
	{
		echo("<h1>You can't change your Status</h1>" );
	}
	else
	{
		$sql = " UPDATE admin SET status = '$status' WHERE userName = '$uName' ";

		if(!mysqli_query($conn,$sql))
		{
			echo("Error: " . $sql . "<br/>" . mysqli_error($conn));	
		}
		echo("<h1>User " . $uName . " Updated Successfully..</h1>" );
	}
	mysqli_close($conn);
?>