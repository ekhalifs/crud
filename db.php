<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'crud'); 
class db_connect{

	public $con;
	public $error;

	public function __construct(){
		$this->con = new mysqli(HOST,USERNAME,PASSWORD,DB_NAME);
		if($this->con->connect_error){
			die($this->con->connect_error);
		}
	}

	public function create_product($table_name,$name,$hash,$price,$validity,$description,$location,$phone,$warranty){
		$query = $this->con->prepare("INSERT INTO `$table_name`(`name`,`hash`,`price`,`validity`,`description`,`location`,`phone`,`warranty`) VALUES(?,?,?,?,?,?,?,?)");
		if($query){
			$query->bind_param('ssdssssd',$name,$hash,$price,$validity,$description,$location,$phone,$warranty);
			$query->execute();
			$query->close();
			$this->con->close();
		}else{
			echo $this->con->error;
		}

		return $query;
	}

	public function select_product($table_name){


		$array = [];
		$query = $this->con->query("SELECT * FROM `$table_name` ");
		//$query->execute();

		if(mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query)){

				$array[] = $row;

			}
		}

		return $array;
	}

	public function selectAProduct($table_name,$user){

		$query = $this->con->query("SELECT * FROM $table_name WHERE hash = '$user' ");

		$res = mysqli_fetch_array($query);

		return $res;
		}

	
	public function updateAProduct($table_name,$price,$validity,$description,$location,$phone,$warranty,$user){

		$query = $this->con->prepare("UPDATE $table_name SET  price = ?, validity = ?, description = ?, location = ?, phone = ?, warranty = ?, updated_at = now()  WHERE hash = '$user'");
		if($query){
			$query->bind_param('dssssd',$price,$validity,$description,$location,$phone,$warranty);
			$query->execute();
			$query->close();
			$this->con->close();

		}else{
			$this->con->error;
		}

		return $query;
	}	


	public function deleteAProduct($table_name,$user){
		$query = $this->con->query("DELETE FROM $table_name where hash = '$user'");
		return $query;
	}



}
?>