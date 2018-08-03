<?php 

class admin{
	private $db;

	function __construct(){
		$this->db = new Database();
	}

	public function adminLogin($email,$password){
		$this->db->query("SELECT * FROM admins WHERE email = :email and password = :password");
		$this->db->bind(':email',$email);
		$this->db->bind(':password',$password);
		$row = $this->db->getSingleRow();
		return $row;
	}

	public function getAdsWithNoPermission($startfrom){
		$this->db->query("SELECT * FROM ads  WHERE admin_permission = 0 ORDER BY created_at DESC LIMIT :startfrom,5");
		$this->db->bind(":startfrom",$startfrom);
		$rows = $this->db->getAllRows();	
		return $rows;
	}

	public function totalAdsPages(){
		$limit = 5;
		$this->db->query("SELECT COUNT(*) as total FROM ads WHERE admin_permission = 0");
		$rows = $this->db->getAllRows();
		foreach ($rows as $row ) {
			$total_records = $row->total;
		}
		
		$total_pages  = ceil($total_records/$limit);
		return $total_pages;
	}

	public function setPermission($admin_id,$id){
		$this->db->query("UPDATE ads SET admin_permission = 1 , who_allowed = :admin_id  WHERE id = :id");
		$this->db->bind(':id',$id);
		$this->db->bind(':admin_id',$admin_id);
		$this->db->execute();
	}


	public function notAllowedToPublish($id){
		$this->db->query("DELETE FROM ads  WHERE id = :id");
		$this->db->bind(':id',$id);
		$this->db->execute();
	}

}


?>