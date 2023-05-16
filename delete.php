<?php
$pdo = mysqli_connect("localhost", "root", "", "db2");

/*if(isset($_GET['id']))
{
	$id= $_GET['id'];
	mysqli_query($conn,"DELETE FROM tbl_item WHERE list_id =".$id);
	mysqli_query($conn,"DELETE FROM tbl_todo WHERE id =" .$id);
	
	 echo 'Deleted successfully.';
}*/
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