<?php
class DataBase
{
	
    private static $instance = null;
    public $pdo;
	
    private function __construct()
    {
        // Initialize your database connection here
        $this->pdo = new PDO('mysql:host=localhost;dbname=db3', 'root', '' );
		
    }
     public static function getInstance()
    {
        if (!isset(self::$instance)) 
		{
            self::$instance = new DataBase();
			
        }

        return self::$instance;
    }
	
	public function signup($name, $email, $password, $gender, $phone, $address) 
	{
	$data = DataBase::getInstance();
	 $sql = "INSERT INTO tbl_form (name, email, password, gender, phone, address) VALUES (:name, :email, :password, :gender, :phone, :address)";
        $insert = $data->prepare($sql);
        $insert->bindParam(':name', $name);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':password', $password);
        $insert->bindParam(':gender', $gender);
        $insert->bindParam(':phone', $phone);
        $insert->bindParam(':address', $address);
        if ($insert->execute()) {
			session_start();
            $user_id = $data->lastInsertId();
            $_SESSION['id'] = $user_id;
            echo "New record created successfully";
            header('location: welcome.php');
        } else {
            echo "Error: " . $insert->errorInfo()[2];
        }
    }
    
	 public function login($email, $password) 
	 {
		$data = DataBase::getInstance();
		$sql = "SELECT * FROM tbl_form WHERE email = :email AND password = :password";
		$login = $data->pdo->prepare($sql);
		$login->bindParam(':email', $email);
		$login->bindParam(':password', $password);
		$login->execute();
		$row = $login->fetch(PDO::FETCH_ASSOC);	
		if (!empty($row)) {
			session_start();
			echo "Login successful";
			$user_id = $row['id'];
			$_SESSION['id'] = $user_id;
			echo $user_id;
			//header('location: welcome.php');
		} else 
		{
			echo "Invalid login password";
		}
	}
	public function insertList($listname, $user_id)
    {
		$data = DataBase::getInstance();
        $sql = "INSERT INTO tbl_list (listname, user_id) VALUES (:listname, :user_id)";
        $stm = $data->pdo->prepare($sql);
        $stm->bindParam(':listname', $listname);
        $stm->bindParam(':user_id', $user_id);
        if ($stm->execute()) {
            echo "List submitted";
        } else {
            echo "Error: " . $stm->errorInfo()[2];
        }
    }
	

    
    public function insertItem($item, $list_id, $user_id, $color, $rank)
    {
		$data = DataBase::getInstance();
        $ran = "SELECT MAX(rank) AS max_position FROM tbl_item";
        $stm = $data->pdo->query($ran);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $maxRank = $result['max_position'];
        // Increment the position value for items placed at the top
        if ($rank == "rank=top") {
            $newrank = $maxRank + 1;
        }
		else {
			// Increment the position value for other items
			$newrank = $maxRank ;
		}
        
        $sql = "INSERT INTO tbl_item (item, list_id, user_id, color, rank) VALUES (:item, :list_id, :user_id, :color, :newrank)";
        $stm = $data->pdo->prepare($sql);
        $stm->bindParam(':item', $item);
        $stm->bindParam(':list_id', $list_id);
        $stm->bindParam(':user_id', $user_id);
        $stm->bindParam(':color', $color);
        $stm->bindParam(':newrank', $newrank);
        
        if ($stm->execute()) {
            echo "Item submitted";
        } else {
            echo "Error: " . $stm->errorInfo()[2];
        }
    }
	////// fetch listdata from database ///////
	 public function getlist($user_id) 
	{
		$data = DataBase::getInstance();
        $stmt = $data->pdo->prepare("SELECT * FROM tbl_list WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        return $stmt;
    }
	
	////// fetch itemdata from database ///////
	public function getitem($list_id, $user_id) 
	{
		$data = DataBase::getInstance();
        $itm = $data->pdo->prepare("SELECT * FROM tbl_item WHERE list_id = :list_id AND user_id = :user_id ORDER BY rank DESC");
        $itm->bindParam(':list_id', $list_id);
        $itm->bindParam(':user_id', $user_id);
        return $itm;
    }
	  public function deleteitem($item_id)
	{
		 $data = DataBase::getInstance();
        $stmt = $data->pdo->prepare("DELETE FROM tbl_item WHERE id = :item_id");
        $stmt->bindParam(':item_id', $item_id);
        $stmt->execute();
    }
	public function deletelistitem($id)
	{	$data = DataBase::getInstance();
        $stmt1 = $data->pdo->prepare("DELETE FROM tbl_item WHERE list_id = :list_id");
		$stmt1->bindParam(':list_id', $listId);
		$stmt1->execute();

		$stmt2 = $data->pdo->prepare("DELETE FROM tbl_list WHERE id = :id");
		$stmt2->bindParam(':id', $id);
		$stmt2->execute();
		echo 'Deleted successfully.';
    }
}
	$data = DataBase::getInstance();
	
	if (isset($_POST['signup'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		
		$data->signup($name, $email, $password, $gender, $phone, $address);
	}

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$data->login($email, $password);
	}
	if (isset($_POST['create']))
	{
		session_start();
		$user_id = $_SESSION['id'];
		$listname = $_POST['listname'];
		
		$data->insertList($listname, $user_id);
	}

	if (isset($_POST['itemcreate']))	
	{
		session_start();
		$user_id = $_SESSION['id'];
		$item = $_POST['item'];
		$list_id = $_POST['list_id'];
		$color = $_POST['color'];
		$rank = $_POST['rank'];
		$data->insertItem($item, $list_id, $user_id, $color, $rank);
	}
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$data->deletelistitem($id);
		
	}
	

?>