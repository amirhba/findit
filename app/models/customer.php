<?php 

class customer {
	private $db;

	function __construct(){
		$this->db = new Database();
	}

	public function customerRegister($name,$lastname,$email,$password,$age,$location,$phone){
		$this->db->query("INSERT INTO customers (name,lastname,email,password,age,location,phone) 

			VALUES 

			(:name,:lastname,:email,:password,:age,:location,:phone)

			");
		$this->db->bind(':name',$name);
		$this->db->bind(':lastname',$lastname);
		$this->db->bind(':email',$email);
		$this->db->bind(':password',$password);
		$this->db->bind(':age',$age);
		$this->db->bind(':location',$location);
		$this->db->bind(':phone',$phone);

		$this->db->execute();
	}

	public function customerLogin($email){
		$this->db->query("SELECT * FROM customers WHERE email = :email");
		$this->db->bind(':email',$email);
		$row = $this->db->getSingleRow();
		return $row;
	}

	public function getCustomerAds($id){
		$this->db->query("SELECT * FROM ads WHERE author_id = :id");
		$this->db->bind(':id',$id);
		$rows = $this->db->getAllRows();
		return $rows;

	}

	public function countCustomerAds($id){
		$this->db->query("SELECT COUNT(id) as total FROM ads WHERE author_id = :id");
		$this->db->bind(':id',$id);
		$rows = $this->db->getAllRows();
		return $rows;
	}

}

?>