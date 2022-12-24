<?php
	include "connectDB.php";

	session_start();

	if(!isset($_SESSION['userNameNL']))
	{
		header('location:../index.php');
	}
	else
	{
		$jobNumber = $_SESSION["jobNumber"];
		$worker = $_SESSION["userNameNL"];

		$sql = " SELECT * FROM customers WHERE jobNumber = '$jobNumber' ";
		$query = mysqli_query($conn, $sql);

		if(mysqli_num_rows($query) == 1)
		{
			$row = mysqli_fetch_assoc($query);

			if($row["worker"] == "")
			{
				$sql = " UPDATE customers SET worker = '$worker', status = 'inProcess' WHERE jobNumber = '$jobNumber' ";
				if (mysqli_query($conn, $sql))
				{
					echo("<h1>Added Successfully...</h1>");
				}
				else
				{
					echo("<h1>ERROR</h1>");
				}
			}
			else if ($row["worker1"] == "")
			{
				$sql = " UPDATE customers SET worker1 = '$worker', status = 'inProcess' WHERE jobNumber = '$jobNumber' ";
				if (mysqli_query($conn, $sql))
				{
					echo("<h1>Added Successfully...</h1>");
				}
				else
				{
					echo("<h1>ERROR</h1>");
				}
			}
			else if ($row["worker2"] == "")
			{
				$sql = " UPDATE customers SET worker2 = '$worker', status = 'inProcess' WHERE jobNumber = '$jobNumber' ";
				if (mysqli_query($conn, $sql))
				{
					echo("<h1>Added Successfully...</h1>");
				}
				else
				{
					echo("<h1>ERROR</h1>");
				}
			}
			else
			{
				echo("<h1>No more Workers</h1>");
			}
		}
		else
		{
			echo("<h1>ERROR</h1>");
		}
	}

	mysqli_close($conn);
?>