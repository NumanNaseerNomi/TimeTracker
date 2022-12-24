<?php
	include "connectDB.php";

	session_start();

	if(!isset($_SESSION['userNameNL']))
	{
		header('location:../index.php');
	}
	else
	{
		function myDateTime()
		{
			date_default_timezone_set("Asia/Karachi");
			return date("d-m-Y (h:i:s a)");
		}

		$jobNumber = $_SESSION["jobNumber"];
		$nicNumber = $_POST["nicNumber"];
		$outBy = $_SESSION["userNameNL"];
		$outDateTime = myDateTime();

		$sql = " UPDATE customers SET nicNumber = '$nicNumber', outBy = '$outBy', outDateTime = '$outDateTime' WHERE jobNumber = '$jobNumber' ";

		if (mysqli_query($conn, $sql))
		{
			echo("<h1>Invoice out Successfully</h1>");
		}
		else
		{
			echo("<h1>ERROR</h1>");
		}
	}

	mysqli_close($conn);	
?>