<?php 


class Customers extends Controller{
	function __construct(){
		$this->customerModel = $this->model('Customer');
	}

	public function register(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$customerName = htmlspecialchars($_POST['customer_name']);
			$customerLastname = htmlspecialchars($_POST['customer_lastname']);
			$customerEmail = htmlspecialchars($_POST['customer_email']);
			$customerPassword = htmlspecialchars($_POST['customer_password']);
			$customerPassword_confirm = htmlspecialchars($_POST['customer_confirm_password']);
			$customerAge = htmlspecialchars($_POST['customer_age']);
			$customerLocation = $_POST['customer_location'];
			$customerPhone = htmlspecialchars($_POST['customer_phone']);
			$errors = [];

			if(!is_numeric($customerAge)){
				$errors = ['ageERR'=>'age must be numeric'];
			}
			if(!is_numeric($customerPhone)){
				$errors = ['phoneERR' => 'phone number must be numeric'];
			}
			if(strlen($customerPassword) < 6){
				$errors = ['passERR' => 'password must be atleast 6 charachters'];
			}
			if(!uppercase_in($customerPassword)){
				$errors = ['passERR' => 'password must contain one uppercase letter'];
			}
			
			if(!pass_confirm($customerPassword,$customerPassword_confirm)){
				$errors = ['passERR' => 'password must be match to confirm password'];
			}

			if(empty($errors)){
				$hashedPassword = password_hash($customerPassword,PASSWORD_DEFAULT);
				$this->customerModel->customerRegister($customerName,$customerLastname,$customerEmail,$hashedPassword,$customerAge,$customerLocation,$customerPhone);
				redirect('customers/login');
			}else{
				echo implode("", $errors);
			}


		}
		$this->view('customer/register');
	}

	public function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$customerEmail = htmlspecialchars($_POST['customer_email']);
			$customerPassword = htmlspecialchars($_POST['customer_password']);
			

			$customer = $this->customerModel->customerLogin($customerEmail);

			if(password_verify($customerPassword,$customer->password)){
				$logedin_customer = ['customer_email'=>$customer_email,'customer_id'=>$customer->id,'customer_name'=>$customer->name,'customer_lastname'=>$customer->lastname,'customer_location'=>$customer->location];
				session_start();
				$_SESSION['customer_id'] = $logedin_customer['customer_id'];
				$_SESSION['customer_name'] = $logedin_customer['customer_name'];
				$_SESSION['customer_lastname'] = $logedin_customer['customer_lastname'];
				$_SESSION['customer_location'] = $logedin_customer['customer_location'];
				redirect('ads/index');
			}else{
				echo "NO NO NO";
			}
		
		}
		$this->view('customer/login');
	}

	public function logout(){
		session_start();
		session_destroy();
		redirect('ads/index');
	}


	public function isLogin(){
		if(isset($_SESSION['customer_id'])){
			return true;
		}else{
			return false;
		}
	}

	public function myAds(){
		session_start();
		if($this->isLogin()){
			$myads = $this->customerModel->getCustomerAds($_SESSION['customer_id']);
			$myAdsNum = $this->customerModel->countCustomerAds($_SESSION['customer_id']);
			$data = ['ads'=>$myads,'adsNumber'=>$myAdsNum];
			$this->view('customer/myad',$data);
		}else{
			redirect('pages/notFound');
		}
	}


}




?>