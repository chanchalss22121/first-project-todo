<?php

	  $pdo= new PDO('mysql:host=localhost;dbname=db3', 'root', '' );
	  // registration form
	  
	  if(isset($_POST['signup']))
	  {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		echo $sql="insert into tbl_form (name,email,password,gender,phone,address)values(:name, :email, :password, :gender, :phone, :address)";
		$insert = $pdo->prepare($sql);
		$insert->bindParam(':name', $name);
		$insert->bindParam(':email', $email);
		$insert->bindParam(':password', $password);
		$insert->bindParam(':gender', $gender);
		$insert->bindParam(':phone', $phone);
		$insert->bindParam(':address', $address);
		$insert->execute();
		if ($insert->execute()) 
			{  session_start();
				$user_id = $pdo->lastInsertId();
				$_SESSION['id']=$user_id;
				echo "New record created successfully";
				header('location:welcome.php');
			}
			else 
			{
				echo "Error: " . $insert->errorInfo()[2];
			}

	  }
	  // login form
	  if(isset($_POST['login']))
	  {
		$sql = "SELECT * FROM tbl_form WHERE email = :email AND password = :password";
		$login = $pdo->prepare($sql);
		$login->bindParam(':email', $email);
		$login->bindParam(':password', $password);
		$login->execute();
		$row=$login->fetch(PDO::FETCH_ASSOC);
		if (!empty($row)) 
			{
				echo "login successfully";
				session_start();
				 $user_id = $row['id']; // Retrieve the 'id' from the fetched row
				$_SESSION['id'] = $user_id;
				echo $user_id;
				header('location:welcome.php');
				
				
			}

	  }
	  //for list insert

if(isset($_POST['create']))
{ 
	session_start();
	$user_id = $_SESSION['id'];
	$listname=$_POST['listname'];
	$sql = "INSERT INTO tbl_list (listname, user_id) VALUES (:listname, :user_id)";
	$stm = $pdo->prepare($sql);
	$stm->bindParam(':listname', $listname);
	$stm->bindParam(':user_id', $user_id);
	
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
	session_start();
	$user_id = $_SESSION['id'];
	

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
			  $newrank = (int)$maxRank + 1;
			
		}
		
		$sql = "INSERT INTO tbl_item (item, list_id, user_id, color, rank) VALUES (:item, :list_id, :user_id, :color, :newrank)";
		$itm = $pdo->prepare($sql);
		$itm->bindParam(':item', $item);
		$itm->bindParam(':list_id', $list_id);
		$itm->bindParam(':user_id', $user_id);
		$itm->bindParam(':color', $color);
		$itm->bindParam(':newrank', $newrank);
		$itm->execute();
		if($itm->execute())
		{
			echo "item submitted";
			//header('location: welcom.php');
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