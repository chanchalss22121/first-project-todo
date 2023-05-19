<?php 
	include 'confi.php'; 
   include 'header.php'; 
  
?>
  
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
				include_once 'database.php';
				$user_id = $_SESSION['id'];
                $stmt=$data->getlist($user_id);	
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
						  $itm = $data->getitem($row['id'], $user_id);
							$itm->execute();
						
						 ?>
						<ul class="list-unstyled">
						<?php 
						$itm->execute();
						while($result=$itm->fetch(PDO::FETCH_ASSOC)) {  ?>
							<li style="color: <?php echo $result['color']; ?>"<?php echo $result['rank']; ?>><?php echo $result['item']; ?>
								<a href="welcome.php?del_item=<?php echo $result['id'] ?>"> <span aria-hidden="true" class="closebutton">&times;</span></a>
							</li>
						 <?php } ?>
						
						<?php
						// for ranking
						
    
							// for delete item
							  if (isset($_GET['del_item']))
								{
									$id = $_GET['del_item'];
									$data->deleteitem($id);
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
										$stmt = $data->getlist($user_id);
										$stmt->execute();
										while ($fetch = $stmt->fetch(PDO::FETCH_ASSOC))
										{
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
		
						