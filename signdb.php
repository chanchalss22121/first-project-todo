<?php
session_start();
	$conn = mysqli_connect("localhost", "root", "", "db");
	
	
	if(isset($_POST['signup'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$city=$_POST['city'];
		$password=$_POST['password'];
			$sql="insert into tbl_signup (name,email,city,password)values('$name','$email','$city','$password')";
			if ($conn->query($sql) == true) {
			// User created successfully
				$_SESSION['email'] = $email;			// Set session variable
				header("Location: todo.php"); // Redirect to welcome page
			} else {
				// Error occurred during signup
				
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
		
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql ="SELECT * FROM tbl_signup WHERE email = '$email' AND password = '$password'";
		$query=mysqli_query($conn,$sql) or die ("check the query");
		$result = mysqli_num_rows($query);
		
		if ($result == 1) { 
			// Login successful
			$_SESSION['email'] = $email;
				header('location: todo.php');
			// Set session variable
			 // Redirect to dashboard or protected page
		}
		
			
	}
?>