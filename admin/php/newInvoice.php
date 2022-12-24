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
							
	$name = $_POST["fName"];
	$contactNumber = $_POST["cNumber"];
	$otherContactNumber = $_POST["oCNumber"];
	$brand = $_POST["brand"];
	$model = $_POST["model"];
	$fault = $_POST["fault"];
	$description = $_POST["description"];
	$chargesPKR = $_POST["chargesPKR"];
	$accessories = $_POST["accessories"];

	$receiveDateTime = myDateTime();
	$receivedBy = $_SESSION['userNameNL'];
	$status = "Pending";

	$sql = " INSERT INTO customers (name, contactNumber, otherContactNumber, brand, model, fault, description, chargesPKR, accessories, receiveDateTime, receivedBy, status) VALUES ('$name', '$contactNumber', '$otherContactNumber', '$brand', '$model', '$fault', '$description', '$chargesPKR', '$accessories', '$receiveDateTime', '$receivedBy', '$status') ";

	if(mysqli_query($conn,$sql))
	{
		$sql = " SELECT * FROM customers WHERE contactNumber = '$contactNumber' AND receiveDateTime = '$receiveDateTime' AND receivedBy = '$receivedBy' ";
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);

		$_SESSION["jobNumber"] = $row["jobNumber"];
		$_SESSION["name"] = $row["name"];
		$_SESSION["contactNumber"] = $row["contactNumber"];
		$_SESSION["otherContactNumber"] = $row["otherContactNumber"];
		$_SESSION["brand"] = $row["brand"];
		$_SESSION["model"] = $row["model"];
		$_SESSION["fault"] = $row["fault"];
		$_SESSION["description"] = $row["description"];
		$_SESSION["chargesPKR"] = $row["chargesPKR"];
		$_SESSION["accessories"] = $row["accessories"];
		$_SESSION["receiveDateTime"] = $row["receiveDateTime"];

		mysqli_close($conn);
		header('location:../html/newInvoiceAdded.php');
	}
	else
	{
		echo("Error: " . $sql . "<br>" . mysqli_error($conn));
	}
	mysqli_close($conn);

	echo('<button type="button" onclick="window.close()">Close</button>');
?>