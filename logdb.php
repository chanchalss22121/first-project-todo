<?php
	
	$pdo= new PDO('mysql:host=localhost;dbname=db2', 'root', '' );
	if(isset($_POST['sin']))
	{	
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql="insert into tbl_log (username,email,password)values('$username', '$email',' $password')";
		$stmt = $pdo->prepare($sql);
		session_start();
		if ($stmt->execute()) 
		{
			
			$_SESSION['email'] = $email; 
			echo "New record created successfully";
			//header('location: tolist.php');
		}
		else 
		{
			echo "Error: " . $stmt->errorInfo()[2];
		}

	}

if(isset($_POST['log']))
	{	
		$email=$_POST['email'];
		$password=$_POST['password'];
		$sql= "SELECT * FROM tbl_log where email = '$email' AND password = '$password' ";
		//WHERE email = '$email' AND password = '$password'
		$stmt = $pdo->prepare($sql);
        $stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		session_start();		
		if (!empty($row)) 
		{
			
			$_SESSION['email'] = $email;
			header('location: tolist.php');
			
					
		}
		
}
//for list insert

$pdo= new PDO('mysql:host=localhost;dbname=db2', 'root', '' );
if(isset($_POST['create']))
{
	$listname=$_POST['listname'];
	$sql="insert into tbl_list(listname)values('$listname')";
	$stm=$pdo->prepare($sql);
	if($stm->execute())
	{
		echo "list submitted";
	}
	else 
	{
		echo "Error: " . $stm->errorInfo()[2];
	}
	
}

//for item insert
	
	if(isset($_POST['itemcreate']))
	{
		$item=$_POST['item'];
		$list_id=$_POST['list_id'];
		$color=$_POST['color'];
		$rank=$_POST['rank'];
		$ran = "SELECT MAX(rank) AS max_position FROM tbl_item";
		$itm = $pdo->query($ran);
		$result = $itm->fetch(PDO::FETCH_ASSOC);
		$maxRank = $result['max_position'];

		// Increment the position value for items placed at the top
		if ($rank == "rank=top" ) {
			$newrank = $maxRank + 1;
			
		}
		
		$sql="insert into tbl_item(item,list_id,color,rank)values('$item','$list_id','$color','$newrank')";
		$itm=$pdo->prepare($sql);
		if($itm->execute())
		{
			echo "item submitted";
			//header('location: tolist.php');
		}
		else 
		{
			echo "Error: " . $itm->errorInfo()[2];
		}
	}
	
	
	
	// for delete list and item
if(isset($_GET['id'])	)	
	{ 	
	$id= $_GET['id'];
	$stmt1 = $pdo->prepare("DELETE FROM tbl_item WHERE list_id =".$id);
	$stmt1->execute();

    $stmt2 = $pdo->prepare("DELETE FROM tbl_list WHERE id =" .$id);
    $stmt2->execute();

    echo 'Deleted successfully.';
	}

		

?>