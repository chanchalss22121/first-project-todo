<?php
session_start();

if (!isset($_SESSION['id'])) { 
    header("Location:form.php");
    exit();
}
	
?>
<!DOCTYPE html>
	<head>
		<title>Insert data in MySQL database using Ajax</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript"></script>
		
	
	<style>
			.container
			{
				margin:20px 200px;
				font-weight:bold;
				font-size:16px;
			}
			.glyphicon-plus-sign
			{
				padding:2px;
				margin-top:2px;
				color:green;
			}
			
			.table1
			{
				height:215px;
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
			
			.closebutton
			{
				background:#ddedff;
				padding : 0px 4px;
				margin-bottom:2px;
				margin-left:2px;
				color:#758fc1;
				border-radius:5px;
				
			}
			.closered
			{
				color:red;
				font-weight:bold;
				font-size:20px;
			}
		</style>
		
	<script type="text/javascript">
		$(document).ready(function() {
			$('#newlist').click(function(){
					$('#myform1').show();
					$('#myform2').hide();
				})
				$('#listbtn').click(function(){
					$('#myform2').show();
					$('#myform1').hide();
					
				})
				
				$('.listdis').click(function(){
					$('#myform3').show();
					$('#myform2').hide();
				})
				$('#itemcreate').click(function(){
					$('#myform3').hide();
					$('#myform2').show();
				})
				
				$('#listbtn').click(function()
				{
					var list= $('#list').val();
					var action = $(this).val();
					if(list!="")
					{ 
						$.ajax
						({ 
							type: "POST",
							url: "database.php",
							data:
							{	
								listname:list,
								create:action
							},
							cache: false,
							success: function(data)
							{
								if(data)
								{
									alert('list submitted');
									window.location.reload();
									
								}
								else
								{
									alert('please check your data');
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
				
				//for item 
				$('#itemcreate').click(function()
				{
					var item= $('#item').val();
					var list_id= $('#listitem').val();
					var user_id= $('#user_id').val();
					var color= $('#color').val();
					var rank= $('.rank').serialize();
					var action = $(this).val();
					if(item!="" && list_id!="" && color!="" && rank!=""  )
					{ 
						$.ajax
						({ 
							type: "POST",
							url: "database.php",
							data:
							{	
								item:item,
								list_id:list_id,
								color:color,
								rank:rank,
								itemcreate:action
							},
							cache: false,
							success: function(data)
							{
								if(data)
								{
									alert('item submitted');
									window.location.reload();
								}
								else
								{
									alert('please check your data');
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
				
			$(".delete").click(function(){
	
			var id = $(this).attr('id');
			if (confirm('Are you sure to remove this record ?'))
			{ 


				$.ajax({

				   url: 'database.php',

				   type: 'GET',
				   data :{
					   id:id ,
				   },
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
			<h1>List Homepage  </h1>  <a href="logout.php" class="" id="" >logout</a><br>
			<a href="javascript:void(0)" id="newlist"><span class="glyphicon glyphicon-plus-sign">NewList</span></a>
			
			<form class="form-horizontal " method="post" id="myform1" style="display:none">
				<div class="table1">
					<div class="listrow1 row ">
						<div class="col-sm-10">New list</div>
						<div class="col-sm-2 text-center"><a href="" name=""><span class="glyphicon glyphicon-remove-sign"></span></a></div>
					</div>
					<div class=" listrow2 row">
						<div class="col-sm-3">List name</div>
						<div class="col-sm-9"><input type="text" name="listname" id="list" class="task_input" required></div>
					</div>
					<div class="col-sm-offset-3 col-sm-10">
						<input type="submit" name="create" id="listbtn" class="" value="create"/>
					</div>	
				</div>
			</form>
			
			<form class="form-horizontal " method="post" id="myform2" >
			<?php
				include_once('database.php');
				$user_id = $_SESSION['id'];
                  $stmt = $pdo->prepare("SELECT * FROM tbl_list WHERE user_id = :user_id");
				  $stmt->bindParam(':user_id', $user_id);
					
                  $i = 1; 
				   $stmt->execute();
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
				<div class="table2">
					<div class="listrow1 row">
						<div class="task col-sm-10"><?php echo $row['listname'];?></div>
						<div class="text-right col-sm-2"><a href="" class="delete" id="<?php echo $row['id'];?>" ><span aria-hidden="true" class="closered">&times;</span></a></div>
					</div>
					<div class=" listrow3 row">
						<?php
						$user_id = $_SESSION['id'];
						$itm = $pdo->prepare("SELECT * FROM tbl_item WHERE list_id = :list_id and user_id = :user_id ORDER BY rank DESC");
						$itm->bindParam(':list_id', $row['id']);
						$itm->bindParam(':user_id', $user_id);
						$itm->execute();
						$s=1;
						 ?>
						<ul class="list-unstyled">
						<?php 
						$itm->execute();
						while($result=$itm->fetch(PDO::FETCH_ASSOC)) {  ?>
							<li style="color: <?php echo $result['color']; ?>"<?php echo $result['rank']; ?>><?php echo $result['item']; ?>
								<a href="tolist.php?del_item=<?php echo $result['id'] ?>"> <span aria-hidden="true" class="closebutton">&times;</span></a>
							</li>
						 <?php } ?>
						
						<?php
						// for ranking
						
    
							// for delete item
							if (isset($_GET['del_item'])) 
							{
								$id = $_GET['del_item'];
								$del=$pdo->prepare("DELETE FROM tbl_item WHERE id=".$id);
								$del->execute();
								
							}
						
						?>
						</ul>
						
					</div>
					<div class="additm text-right" >
						<a href="javascript:void(0)" class="listdis" name="">Add item<span class="glyphicon glyphicon-plus-sign"></span></a>
					</div>
				</div>
			<?php }?>
			</form>
			
			<form class="form-horizontal " method="post" id="myform3" style="display:none">
				<div class="table3">
					<div class="listrow1 row ">
						<div class="col-sm-10">Add items</div>
						<div class="col-sm-2 text-center"><a href="javascript:void(0)" class="confirm"> <span class="glyphicon glyphicon-remove-sign"></span></a></div>
					</div>
					<div class=" listrow2 row">
						<div class="col-sm-3">Item name</div>
						<div class="col-sm-9"><input type="text" id="item" name="item"class="item" required>
							<select name="list_id" id="listitem">
								<?php 
									$result = $pdo->prepare("SELECT * FROM tbl_list WHERE user_id = :user_id");
									$result->bindParam(':user_id', $user_id);
									 $result->execute();
										while ($fetch = $result->fetch(PDO::FETCH_ASSOC)) { 
											echo "<option value='".$fetch['id']."'>".$fetch['listname']."</option>";
										}
								
								?>
							</select>
						</div>
					</div>
					<div class="radio row">
						<div class="col-sm-offset-3 col-sm-10">
							<input type="radio" name="rank" class="rank" id="top" value="top" >Place on top<br><br>
							<input class="rank" type="radio" name="rank" id="bottom" value="bottom">Place on bottom<br><br>
							<input class="" type="color" name="color" id="color">Pick color
						</div>
					</div>
					<div class="col-sm-offset-3 col-sm-9 text-left">
						<input type="submit" name="additem" id="itemcreate"  value="create">
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
		
						