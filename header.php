<!DOCTYPE html>
	<head>
		<title>Insert data in MySQL database using Ajax</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
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
	