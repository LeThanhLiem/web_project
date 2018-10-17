<?php
class Db{
	// tao bien ket noi $conn
	public static $conn;
	//viet ham construct ket noi
	public function __construct(){
	self::$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		self::$conn->set_charset('utf8');
	}
	//dong ket noi
	public function __destruct(){
		//self::$conn->close();
	}
	//viet ham tra ve array tu mot object
	public function getData($obj){
		$arr = array();
		while ($row = $obj->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	}
	public function getKeyword(){
		if(isset($_GET["key"])){
		$keyword = $_GET['key'];
		}
		$sql2 = "SELECT * FROM `products` JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_ID` JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE Name LIKE '%".$keyword."%'";
		
		$result2 = self::$conn->query($sql2);
		return $this->getData($result2);
	
	}
	//viet ham lay ra ten va gia san pham 
	public function product1(){
		$sql ="SELECT * FROM `products`,`manufactures`,`protypes` WHERE manufactures.manu_ID = products.manu_ID AND protypes.type_ID = products.type_ID";
		$result = self::$conn->query($sql);
		return $this->getData($result);
	}
		
		public function  getAllProducts($page,$per_page){
			$first_links = ($page - 1) * $per_page;
			$sql = "SELECT * FROM `products`,`manufactures`,`protypes` WHERE manufactures.manu_ID = products.manu_ID AND protypes.type_ID = products.type_ID LIMIT $first_links,$per_page";
			$result = self::$conn->query($sql);
			return $this->getData($result);
		}

		public function paginate($url,$total,$page,$per_page){
			$total_links = ceil($total/$per_page);
			$link = "";
			for ($j = 1; $j <= $total_links; $j++){
				$link = $link."<a href='$url?page=$j'>$j</a>";
				
			}
			return $link;
		}
		public function product3($name,$type_ID,$manu_ID,$image,$des,$price){
			if (isset($_POST['name'])){
				$name = $_POST['name'];
				$type_ID = $_POST['type_ID'];
				$manu_ID = $_POST['manu_ID'];
				$image =  $_FILES["fileToUpload"]["name"];
				$des  = $_POST['description'];
				$price = $_POST['price'];
			}
			$sql = "INSERT INTO products (name,price,image,des,manu_ID,type_ID) 
					VALUES ('$name','$price','$image','$des',$manu_ID,$type_ID)";
			$result = self::$conn->query($sql);
			header('location: index.php');
			return $result;

		}
		public function delete($ID){
			$sql = "DELETE FROM `products` WHERE ID = $ID";
			self::$conn->query($sql);
		}
		public function getAllManu(){
			$sql = "SELECT * FROM `manufactures` WHERE 1";
		$result = self::$conn->query($sql);
		return $this->getData($result);
		}
		public function Showedit($ID){

		if(isset($_GET['ID'])){
			$ID = $_GET['ID'];
		}
		$sql = "SELECT * FROM `products` JOIN `manufactures` ON `products`.`manu_id` = `manufactures`.`manu_ID` JOIN `protypes` ON `products`.`type_id` = `protypes`.`type_id` WHERE ID='$ID'";
		$result = self::$conn->query($sql);
		return $this->getData($result);
		}
		public function update($ID,$name,$type_ID,$manu_ID,$image,$des,$price)
		{
		if (isset($_POST['name'])){
				$name = $_POST['name'];
				$type_ID = $_POST['type_ID'];
				$manu_ID = $_POST['manu_ID'];
				$image =  $_FILES["fileToUpload"]["name"];
				$des  = $_POST['description'];
				$price = $_POST['price'];
			}
		$sql =" UPDATE `products` SET name = '$name',image='$image',manu_ID =$manu_ID ,type_ID=$type_ID,des='$des',price=$price WHERE ID = $ID";
		return self::$conn->query($sql);
		}

  }
?>
