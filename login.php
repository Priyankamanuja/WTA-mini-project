<?php
	// Connect to database
	require_once('mysql_connect.php');
	if(isset($_POST['login_submit'])){
		$email = ($_POST['Email']);
		$password = ($_POST['Password']);
		$query="select * from login where Email='$email' and Password='$password';";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)==1)
		{
			// $_SESSION['Email']=$email;
			header("Location:dashboard.html");
		}
		else
		{
		echo "Error: " . $query . "<br>" . mysqli_error($con);
		}
	}
	// Close connection
	mysqli_close($con);	
?>