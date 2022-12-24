<?php
	include "connectDB.php";

	session_start();
	if(!isset($_SESSION['userNameNL']))
	{
		header('location:../index.php');
	}

	function myDateTime()
	{
		date_default_timezone_set("Asia/Karachi");
		return date("d-m-Y (h:i:s a)");
	}
							
	$jobNumber = $_SESSION["jobNumber"];
	$name = $_POST["fName"];
//	$contactNumber = $_POST["cNumber"];
	$otherContactNumber = $_POST["oCNumber"];
	$brand = $_POST["brand"];
	$model = $_POST["model"];
	$fault = $_POST["fault"];
	$description = $_POST["description"];
	$chargesPKR = $_POST["chargesPKR"];
	$accessories = $_POST["accessories"];

	$partsUsed = $_POST["partsUsed"];
	$workDone = $_POST["workDone"];
	$comment = $_POST["comment"];
	$status = $_POST["status"];

	$lastUpdate = myDateTime();
	$lastUpdateBy = $_SESSION['userNameNL'];

	$sql = " UPDATE customers SET name = '$name', otherContactNumber = '$otherContactNumber', brand = '$brand', model = '$model', fault = '$fault', description = '$description', chargesPKR = '$chargesPKR', accessories = '$accessories', partsUsed = '$partsUsed', workDone = '$workDone', comment = '$comment', lastUpdate = '$lastUpdate', lastUpdateBy = '$lastUpdateBy' WHERE jobNumber = '$jobNumber' ";

	if(mysqli_query($conn,$sql))
	{
		if($status != "")
		{
			$sql = " UPDATE customers SET status = '$status', outBy = '', outDateTime = '' WHERE jobNumber = '$jobNumber' ";

			if(!mysqli_query($conn,$sql))
			{
				echo("Error: " . $sql . "<br>" . mysqli_error($conn));
			}
		}
	}
	else
	{
		echo("Error: " . $sql . "<br>" . mysqli_error($conn));
	}

	mysqli_close($conn);

	echo("<h1>Job Number " . $jobNumber . " Updated Successfully..</h1>" );
?>