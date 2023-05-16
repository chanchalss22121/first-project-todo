<?php
session_start();

if (!isset($_SESSION['email'])) { 
    header("Location: signup.php");
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "db");

	$errors = "";
	//error_reporting(0);
	// connect to database
	
	// for list insert
	
	if(isset($_POST['create'])) { 
		if (empty($_POST['list'])) { 
			$errors = "You must fill in the task";
		}
		else{
			$list = $_POST['list'];
			$sql = "INSERT INTO tbl_todo(listname)VALUES('$list')";
			mysqli_query($conn, $sql);
		}
	}	
	
	
	
	//for item insert
		if(isset($_POST['additem'])) { 
		if (empty($_POST['item'])) { 
			$errors = "You must fill in the task";
		}
		else{
			$item = $_POST['item'];
			$listitem = $_POST['listitem'];
			$rank = $_POST['rank'];
			$color = $_POST['color'];
			$sql = "INSERT INTO tbl_item(item,list_id,rank,color)values('$item','$listitem','$rank','$color')";
			mysqli_query($conn, $sql);
			//header('location: todo.php');
		}	
	}					
	if (isset($_GET['del_item'])) {
	$id = $_GET['del_item'];
	mysqli_query($conn, "DELETE FROM tbl_item WHERE id=".$id);
	}
?>
<html>
	<head>
		<title></title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.6.4.js"integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
			.container
			{
				margin:20px 200px;
				font-weight:bold;
				font-size:14px;
			}
			.glyphicon-plus-sign
			{
				padding:2px;
				margin-top:2px;
				color:green;
			}
			
			.table1
			{
				
				height:200px;
				width:500px;
				border:1px solid black;
				padding:2px;
				margin-top:10px;
			}
			#newlist
			{
				margin-bottom:20px;
			}
			.table2
			{
				
				height:250px;
				width:300px;
				border:1px solid black;
				float:left;
				margin-right:10px;
			}
			
			.listrow1
			{
				height:50px;
				border-bottom:1px solid black;
				margin: 2px 2px;
				padding-top:10px;
			}
			
			
			.listrow1 .glyphicon
			{
				
				font-size:20px;
				padding-top:2px;
		
			}
			.listrow2  
			{
				height:70px;
				margin: 14px 2px;
				padding-top:21px;
			}
			
			.listrow3 
			{
				height:50px;
				margin: 2px 1px;
				padding:10px;
			}
			.listrow3 .col-sm-12
			{
				height:150px;
			}
			.additm
			{
				height:30;
				margin-top:100px;#b1d8e4
			}
			.additm .btn
			{
				border:none;
			}
			.additm .glyphicon-plus-sign
			{
				color:#b1d8e4;
				padding: 1px;
			}
			.table3 
			{
				
				height:300px;
				width:500px;
				border:1px solid black;
				padding:2px;
				margin-top:10px;
				margin:auto;
			}
			.table3 .listrow2
			{
				height:40px;
			}
			.radio .col-sm-offset-3
			{
				margin-left: 30%;
				margin-bottom:10px;
			}
			.listrow5
			{
				
				padding-top:10px;
				margin-bottom:30px;
			}
			
			#myform4
			{
				
				height:200px;
				width:400px;
				border:1px solid black;
				padding:2px;
				margin-top:10px;
				margin:auto;
			}
			
		</style>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#myform1").hide();
			$("#myform2").show();
			$("#myform3").hide();
			$("#myform4").hide();
				$('#newlist').on('click', function() {
				$("#myform1").show();
				$("#myform2").hide();
				$("#myform3").hide();
				$("#myform4").hide();
				});
			$('#listbtn').on('click', function() {
				$("#myform1").hide();
				$("#myform2").show();
					$("#myform3").hide();
				$("#myform4").hide();
				
			});
			$('.listdis').on('click', function() {
				$("#myform1").hide();
				$("#myform2").hide();
				$("#myform3").show();
				$("#myform4").hide();
				});
				
		$(".delete").click(function(){

        var id = $(this).attr("id");

        if(confirm('Are you sure to remove this record ?'))
        {


            $.ajax({

               url: 'delete.php',

               type: 'GET',
			   data :{id:id },
			    success: function(data) {
				 window.location.reload();
				},
				
            });
				return false;
        }

    });
 

                                 
  });
  
	</script>
	</head>
	<body>
		<div class="container">
			  <h2>Welcome!</h2>
			  <a href="logout.php" class="" id="" >logout</a>
			<h2>List homepage </h2>
			<button id="newlist"><span class="glyphicon glyphicon-plus-sign">NewList</span></button>
				<form class="form-horizontal " method="post" id="myform1">
				<?php if (isset($errors)) { ?>
						<p><?php echo $errors; ?></p>
							<?php } ?>
					<div class="table1">
						<div class="listrow1 row ">
							<div class="col-sm-10">New list</div>
							<div class="col-sm-2 text-center"><a href="" name=""><span class="glyphicon glyphicon-remove-sign"></span></a></div>
						</div>
						<div class="listrow2 row">
							<div class="col-sm-3">List name</div>
							<div class="col-sm-9"><input type="text" name="list" id="list" class="task_input" required></div>
						</div>
						<div class="col-sm-offset-3 col-sm-10">
							<input type="submit" name="create" id="listbtn" class="" value="create">
						</div>
						
					</div>
				</form>
				
				<form class="form-horizontal " method="post" id="myform2">
					<?php 
					// select all tasks if page is visited or refreshed
					$query = mysqli_query($conn, "SELECT * FROM tbl_todo");
					$i = 1; 
					while ($row = mysqli_fetch_array($query)) { ?>
						<div class="table2">
							<div class="listrow1 row">
								<div class="task col-sm-10"> <?php echo $row['listname']; ?></div>
								<div class="text-right col-sm-2"><a href="" class="delete" id="<?php echo $row['id'] ;?>" ><span class="glyphicon glyphicon-remove-sign"></span></a></div>
							</div>
							<div class=" listrow3 row">
							<?php
							$check = mysqli_query($conn, "SELECT * FROM tbl_item where list_id = $row[id] order by rank DESC");
								 $s=1; ?>
								<ul >
								<?php while ($result = mysqli_fetch_array($check)) { ?>	
								<li><?php echo $result['item']; ?><a href="todo.php?del_item=<?php echo $result['id'] ?>"> <span class="glyphicon glyphicon-remove-sign"></span></a></li>
								<?php } ?>
								</ul>
							</div>
							<div class="additm text-right" >
								<a href="javascript:void(0)" class="listdis" name="">Add item<span class="glyphicon glyphicon-plus-sign"></span></a>
							</div>
						</div>
					<?php } ?>
				</form>
				<form class="form-horizontal " method="post" id="myform3">
					<div class="table3">
						<div class="listrow1 row ">
							<div class="col-sm-10">Add items</div>
							<div class="col-sm-2 text-center"><a href="javascript:void(0)" class="confirm"> <span class="glyphicon glyphicon-remove-sign"></span></a></div>
						</div>
						<div class=" listrow2 row">
							<div class="col-sm-3">Item name</div>
							<div class="col-sm-9"><input type="text" id="item" name="item"class="item" required>
								<select class="" name ="listitem" id="listitem">
								<option value="1"></option>
								  <?php
									$result = mysqli_query($conn, 'SELECT * FROM tbl_todo');
									while ($fetch = mysqli_fetch_assoc($result)) {
										echo "<option value='".$fetch['id']."'>".$fetch['listname']."</option>";
									}
									?>
								</select>
							</div>	
						</div>
						
						<div class="radio row">
							<div class="col-sm-offset-3 col-sm-10">
								<input class="" type="radio" name="rank" class="Radio1">Place on top<br><br>
								<input class="" type="radio" name="Radio" id="Radio2">Place on bottom<br><br>
								<input class="" type="color" name="color" id="colorpicker">Pick color
							</div>
						</div>
						<div class="col-sm-offset-3 col-sm-9 text-left">
						<input type="submit" name="additem" id="itemcreate" class="" value="create">
						</div>
					</div>
				</form>
				
		</div>
	</body>
	
</html>
