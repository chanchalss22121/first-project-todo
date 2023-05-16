<?php
session_start();
?>

<!DOCTYPE html>
	<head>
		<title>Insert data in MySQL database using Ajax</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('.tab-1').click(function()
				{
					$('#sign').show();
					$('#log').hide();
					
				})
				$('.tab-2').click(function()
				{
					$('#log').show();
					$('#sign').hide();
					
				})
				$('#signup').on('click', function() 
				{
					var name = $('#name').val();
					var email = $('#email').val();
					var password = $('#password').val();
					 var gender = $('input[name="gender"]:checked').val();;
					var phone = $('#password').val();
					var address = $('#address').val();
					var action = $(this).val();
					if(name!="" && email!="" && password!="" && gender!=""&& phone!=""&& address!="") 
					{ 
						$.ajax
						({
							type: "POST",
							url: "database.php",
							data:
							{
								name:	name,
								email: email,
								password: password,
								gender: gender,
								phone: phone,
								address: address,
								signup: action
							},
							
							cache: false,
							success: function(data)
							{
								if(data)
								{
									alert( "Registered successfully");
									location.href="welcome.php";
								}
								else
								{
									alert( "check your data");
								}
							}
						});
						return false;
					}
					else
					{
						alert('Please fill all the field !');
					}
				});
				$('#login').on('click', function() 
				{
					var email = $('#email_log').val();
					var password = $('#password_log').val();
					var action = $(this).val();
					if(email!="" && password!="") 
					{ 
						$.ajax
						({
							type: "POST",
							url: "database.php",
							data:
							{ 
								
								email: email,
								password: password,
								login: action
							},
							
							cache: false,
							success: function(data)
							{ 
								if(data)
								{
									alert( "login successfully");
									location.href="welcome.php";
								}
								else
								{
									alert("check your email and password");
								}
							}
						});
						
					}
					else
					{
						alert('Please fill all the field !');
					}
				});
				
			});
			
			
		</script>
		<style>
        .container {
            max-width: 400px;
            margin: 0 auto;
        }
		</style>
</head>
<body>
    <div class="container">
        <form id="sign" method="post" >
		<h2>Registration Form</h2>
			  <input  type="button" name="tab" class="tab-1 btn btn-primary " value="signup">
				<input  type="button" name="tab" class="tab-2 btn btn-primary" value="login">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
             <div class="form-group">
                <label>Gender:</label>
        
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                    <label class="form-check-label" for="other">
                        Other
                    </label>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" placeholder="Enter your address"></textarea>
            </div>
			 <button type="submit" class="btn btn-primary" value="signup" id ="signup" name="signup">Register</button>
        </form>
        <form action="" id="log" method="post" style="display:none;">
		 <h2>Login Form</h2>
		 <input  type="button" name="tab" class="tab-1 btn btn-primary " value="signup">
				<input  type="button" name="tab" class="tab-2 btn btn-primary" value="login">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email_log" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password_log" name="Password" placeholder="Enter your password">
            </div>
			 <input type="button" class="btn btn-success button" id="login" name="login" value="login">
        </form>
    </div>
</body>
</html>
