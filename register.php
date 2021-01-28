<?php
	// Connect to database
	require_once('mysql_connect.php');
	
	// Get post variables
	$first = $_POST['FirstName'];
	$last  = $_POST['LastName'];
	$email = $_POST['Email'];
	$pass  = $_POST['Password'];
	
	// Check table to see if email exists already
	$query = mysqli_query($con, "SELECT * FROM login WHERE Email='$email' LIMIT 1");
	
	if(mysqli_num_rows($query) > 0)
	{
		// Email is in use
		echo "Email in use.";
	}
	else
	{
		// Add user to database
		// SQL message
		$sql = "INSERT INTO login (FirstName, LastName, Email, Password)
				VALUES ('$first', '$last', '$email', '$pass')";
				
		// Query and check for errors
		if(mysqli_query($con, $sql))
		{
			// Worked
			header("Location:index.html");
			//echo '<script>alert("Registration completed!")</script>';
		} 
		else
		{
			//Dint work
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	
	// Close connection
	mysqli_close($con);

?>