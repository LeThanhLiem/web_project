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
		self::$conn->close();
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
		$sql2 = "SELECT * FROM `products`,`manufactures`,`protypes` WHERE `name` LIKE '%$keyword%'";
		$result2 = self::$conn->query($sql2);
		return $this->getData($result2);
	
	}
	//viet ham lay ra ten va gia san pham 
	public function product1(){
		$sql ="SELECT * FROM `products`,`manufactures`,`protypes` WHERE manufactures.manu_ID = products.manu_ID AND protypes.type_ID = products.type_ID";
		$result = self::$conn->query($sql);
		return $this->getData($result);
	}
	
	

  }
