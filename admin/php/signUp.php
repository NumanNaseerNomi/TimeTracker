<?php
	include "connectDB.php";

	$fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$cNumber = $_POST["cNumber"];
	$oCNumber = $_POST["oCNumber"];
	$nicNumber = $_POST["nicNumber"];
	$hAddress = $_POST["hAddress"];
	$about = $_POST["about"];
	$uType = $_POST["uType"];

	$sql = "SELECT * FROM admin WHERE fName = '$fName' AND contactNumber = '$cNumber' AND userType = '$uType' ";
	$query = mysqli_query($conn,$sql);

	$test = mysqli_num_rows($query);

	if($test == 0)
	{
		$sql = "INSERT INTO admin (fName, lName, contactNumber, gContactNumber, nicNumber, hAddress, about, userType, status) VALUES ('$fName', '$lName', '$cNumber', '$oCNumber', '$nicNumber', '$hAddress', '$about',  '$uType', 'Active')";

		if(mysqli_query($conn, $sql))
		{
			$sql = "SELECT * FROM admin WHERE fName = '$fName' AND lName = '$lName' AND contactNumber = '$cNumber' AND userType = '$uType' ";
			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_assoc($result);
			$rowID = $row["id"];

			$userName = str_ireplace(" ",".",strtolower($fName)) . "." . $rowID;

			$sql = "UPDATE admin SET userName = '$userName' WHERE id = '$rowID'";
			mysqli_query($conn, $sql);

			echo("<h3>Your User Name is: " . $userName . "</h3><h3>Your Password is: " . $cNumber . "</h3>");

			mysqli_close($conn);
			echo('<button type="button" onclick="window.close()">Close</button>');
		}
		else
		{
			echo("Error: " . $sql . "<br>" . mysqli_error($conn));
			mysqli_close($conn);
		}
	}
	else
	{
		mysqli_close($conn);
		echo("<h1>Error</h1>");
	}
?>