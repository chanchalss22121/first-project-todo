<?php
	session_start();
?>
<!DOCTYPE html>
	<head>
		<title>Insert data in MySQL database using Ajax</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style>
			.container
			{
				border:1px solid black;
				margin auto;
				width:500px;
				margin-top:100px;
				padding:10px;
			}
			.form-group
			{
				margin-top:20px;
			}
			
			form
			{
				padding:10px;
			}
			.button
			{
				margin-top:10px;
			}
			 @media (max-width: 600px)
			 {
			.container
				{
					margin none;
					width:100%;
					margin-top:0px;
					
				}
				.form-group
				{
					margin-top:10px;
				}
				
				form
				{
					padding:20px;
					margin-bottom:10px;
				}
				.button
				{
					margin-top:0px;
				}
			 }
		</style>
		<script type="text/javascript"> 
			$(document).ready(function() {
				$('.sign-up').click(function(){
					$('#form1').show();
					$('#form2').hide();
				})
				$('.log-in').click(function(){
					$('#form2').show();
					$('#form1').hide();
				})
				$('#signup').on('click', function() {
					var username = $('#username').val();
					var email = $('#email').val();
					var password = $('#password').val();
					var action = $(this).val();
					if(username!="" && email!="" && password!="") 
					{
						$.ajax
						({
							type: "POST",
							url: "logdb.php",
							data:
							{
								username: username,
								email: email,
								password: password,
								sin: action
							},
							
							cache: false,
							success: function(data)
							{
								if(data)
								{
									alert('registered successfully');
									location.href="tolist.php";
								}
								else
								{
									alert('please check your data');
								}
							}
						})	
					}
					else
					{
						alert('Please fill all the field !');
					}
					
				})
				$('#login').on('click', function() {
					var email = $('#email_log').val();
					var password = $('#password_log').val();
					var action = $(this).val();
					if(email!="" && password!="") 
					{ 
						$.ajax
						({
							type: "POST",
							url: "logdb.php",
							data:
							{
								email: email,
								password: password,
								log: action
							},
							
							cache: false,
							success: function(data)
							{
								if(data)
								{
									alert('login successfully ');
									location.href="tolist.php";
								}
								else
								{
									alert('please check your data');
								}
							}
						})	
					}
					else
					{
						alert('Please fill all the field !');
					}
					
				})
			})
			
		</script>
	</head>
	<body>
		<div class="container">
			<form class="horizontal-form" method="post" action="" id="form1">
				<div class="from text-center ">
					<input id="tab-1" type="button" name="tab" class="sign-up btn btn-primary " value="signup">
					<input id="tab-2" type="button" name="tab" class="log-in btn btn-primary" value="login">
				</div>	
				<div class="form-group">
					<label for="" class="col-sm-4">Username</label>
					<input for="text" class="" id="username" name="username">	
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4">Email</label>
					<input for="email" class="" id="email" name="email">	
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4">Password</label>
					<input for="password" class="" id="password" name="password">
				</div>
				<div class="col-sm-offset-4">
					<input type="button" class="btn btn-success button" id="signup" name="sin" value="signup">
				</div>
			</form>
			<form class="horizontal-form" method="post" action="" id="form2"  style="display:none;">
				<div class="from text-center ">
					<input id="tab-1" type="button" name="tab" class="sign-up btn btn-primary" checked value="signup">
					<input id="tab-2" type="button" name="tab" class="log-in btn btn-primary" value="login">
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4" >Email</label>
					<input for="email" class="" id="email_log" name="email">	
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4">Password</label>
					<input for="password" class="" id="password_log" name="password">	
				</div>
				<div class="col-sm-offset-4">
					<input type="button" class="btn btn-success button" id="login" name="log" value="login">
				</div>
			</form>
		</div>
	</body>
</html>
	