<?php 


class Admins extends Controller{

	function __construct(){
		$this->adminModel = $this->model('admin');
	}

	public function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(csrf_token_isvalid()){

				$adminEmail = htmlspecialchars($_POST['admin_email']);
				$adminPassword = htmlspecialchars($_POST['admin_password']);
				$logedin_admin = $this->adminModel->adminLogin($adminEmail,$adminPassword);
				if($logedin_admin){
					session_start();
					session_regenerate_id();
					$_SESSION['admin_id'] = $logedin_admin->id;
					$_SESSION['admin_name'] = $logedin_admin->name;
					$_SESSION['admin_lname'] = $logedin_admin->lastname;
					redirect('admins/home');
				}else{
					die("admin does not exists");
				}


			}else{
				echo "NOT VALID CSRF";
			}
		}
		$this->view('admin/login');
	}

	public function logout(){
		session_start();
		session_destroy();
		redirect('admins/login');
	}

	public function index(){
		session_start();
		if($this->isLogin()){
			echo json_encode($this->adminModel->getAdsWithNoPermission(0));

		}else{
			die("404 NOT FOUND");
		}
	
	}

	public function home(){
		session_start();
		if($this->isLogin()){
			$data = ['total_pages'=>$this->adminModel->totalAdsPages()];
			$this->view('admin/index',$data);
		}else{
			redirect('pages/notfound');
		}
	}

	public function isLogin(){
		if(isset($_SESSION['admin_id'])){
			return true;
		}else{
			return false;
		}
	}

	public function permissionSets(){
		$ad_id = $_POST['adid'];
		$admin_id = $_POST['adminid'];
		$this->adminModel->setPermission($admin_id,$ad_id);
	}


	public function noPermissionSets(){
		$ad_id = $_POST['adid'];
		$this->adminModel->notAllowedToPublish($ad_id);
	}
	
	public function page(){
		$page = $_POST['page'];
		if($page > 1){
			$currentPage = $page - 1;
		}else{
			$currentPage = 1;
		}

		$startfrom = ($page - $currentPage) * 5;

		echo json_encode($this->adminModel->getAdsWithNoPermission(5));
	}


}


?>