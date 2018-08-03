<?php 

class ad{
	private $db;

	function __construct(){
		$this->db = new Database();
	}

	public function insertAd($title,$description,$subject,$location,$sellerphone,$price,$author_id){
	
		$this->db->query("INSERT INTO ads (title,description,subject,location,sellerphone,price,author_id) VALUES 
		(:title,:description,:subject,:location,:sellerphone,:price,:author_id)");
		$this->db->bind(':title',$title);
		$this->db->bind(':description',$description);
		$this->db->bind(':subject',$subject);
		$this->db->bind(':location',$location);
		$this->db->bind(':sellerphone',$sellerphone);
		$this->db->bind(':price',$price);
		$this->db->bind(':author_id',$author_id);

		$this->db->execute();
	}

	public function getAdsHavePermission(){
		$this->db->query("SELECT * FROM ads WHERE admin_permission = 1");
		$rows = $this->db->getAllRows();
		return $rows;
	}

	public function getSubjects(){
		$this->db->query("SELECT * FROM subjects ");
		$rows = $this->db->getAllRows();
		return $rows;
	}

	public function getAdById($id){
		$this->db->query("SELECT * FROM ads WHERE id = :id and admin_permission = 1");
		$this->db->bind(":id",$id);
		$rows = $this->db->getAllRows();
		return $rows;
	}

	public function getAdsBySubject($subject){
		$this->db->query("SELECT * FROM ads WHERE subject = :subject");
		$this->db->bind(":subject",$subject);
		$rows = $this->db->getAllRows();
		return $rows;
	}
}

?>