<?php
	session_start();
?>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
	$('#login').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();
	});
	$('#register').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();
	});
	$('#butsignup').on('click', function() {
		//$("#butsave").attr("disabled", "disabled");
		var name = $('#name').val();
		var email = $('#email').val();
		var city = $('#city').val();
		var password = $('#password').val();
		var action =$(this).val();
		if(name!="" && email!="" && password!="" ){
			$.ajax({
				url: "signdb.php",
				type: "POST",
				data: {
					name: name,
					email: email,
					city: city,
					password: password	,
					signup:action
				},
				cache: false,
				success: function(data){
					if(data)
					{
						alert('registered successfully goto the login page');	
							location.reload();
										
					}
					else 
						
					{
						alert('please check your data');
					}
					
				}
				
			});
		}
		else{
			alert('Please fill all the field !');
		}
		 
	});
	$('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		var action =$(this).val();
		
		if(email!="" && password!=""){
			$.ajax({
				url: "signdb.php",
				type: "POST",
				data: {
					email: email,
					password: password,
					login:action					
				},
				cache: false,
				success: function(data){
					if(data){
						
							location.href="todo.php";	
					}
					else
					{
						
						alert('Invalid EmailId or Password !');		
					}
					 
				}
				
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>

</head>
<body>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<button type="button" class="btn btn-success btn-sm" id="register">Register</button> <button type="button" class="btn btn-success btn-sm" id="login">Login</button>
	
	<form id="register_form" name="form1" method="post">
		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group" >
			<label for="pwd">City:</label>
			<select name="city" id="city" class="form-control">
				<option value="">Select</option>
				<option value="Delhi">Delhi</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Pune">Pune</option>
			</select>
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password" placeholder="Password" name="password">
		</div>
		<input type="button" name="signup" class="btn btn-primary" value="Register" id="butsignup">
	</form>
	<form id="login_form" name="form1" method="post" style="display:none;">
		
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
		</div>
		<input type="button" name="login" class="btn btn-primary" value="Login" id="butlogin">
	</form>
</div>

</body>
</html>    
     