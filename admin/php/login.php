<?php include "connectDB.php"; ?>
<?php
	session_start();

	$userNameNL = $_POST['uName'];
	$cNumber = $_POST['cNumber'];

	$sql = " SELECT * FROM  admin WHERE userName = '$userNameNL' AND contactNumber = '$cNumber' AND status = 'Active' ";
	$query = mysqli_query($conn,$sql);

	$row = mysqli_num_rows($query);

	if($row == 1)
	{
		$userID = mysqli_fetch_assoc($query);
		$userNameNL = $userID["userName"];
		$userType = $userID["userType"];

		$_SESSION['userNameNL'] = $userNameNL;
		$_SESSION['userType'] = $userType;

		mysqli_close($conn);

		header('location:admin.php');
	}
	else
	{
		mysqli_close($conn);
		header('location:../index.php');
	}
?>