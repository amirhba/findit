<?php 

class Ads extends Controller{

	function __construct(){
		$this->adModel = $this->model('ad');
	}

	public function index(){
		session_start();
		$ads = $this->adModel->getAdsHavePermission();
		$subjects = $this->adModel->getSubjects();
		$data = ['ads'=> $ads ,'subjects'=>$subjects];
		$this->view('ads/index',$data);
	}

	public function newAd(){
		if($this->isLogedinCustomer()){
			$subjects = $this->adModel->getSubjects();
			$data = ['subjects'=>$subjects];
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$adsTitle = htmlspecialchars($_POST['ad_title']);
				$adsSubject = $_POST['ad_subject'];
				$adsSellerphone = $_POST['seller_phone'];
				$adsPrice = htmlspecialchars($_POST['ad_price']);
				$adsDescription = htmlspecialchars($_POST['ad_description']);
				$adsLocation = $_POST['ad_location'];
				$adsAuthorId = $_SESSION['customer_id'];
				$erros = [];

				if(!is_numeric($adsPrice)){
					$erros = ['priceERR'=>'Price must be numeric'];
				}

				if(empty($erros)){
					$this->adModel->insertAd($adsTitle,$adsDescription,$adsSubject,$adsLocation,$adsSellerphone,$adsPrice,$adsAuthorId);
					$data = ['alertTitle'=>'Well done','alertText'=>'We recive your advertise and after our team confirm,it will be showen in the homepage','alertFooter'=>'if it takes more than 1 hour then let us know'];
				}else{
					echo implode("", $erros);
				}

			}
			$this->view('ads/newAd',$data);
		}else{
			redirect('customers/login');
		}
	}

	public function detail(){
		if($_SERVER['REQUEST_METHOD']=="GET"){
			$adid = urlencode($_GET['ad_id']);
			$specificAd = $this->adModel->getAdById($adid);
			$data = ['ad'=>$specificAd];
			$this->view('ads/adDetail',$data);
		}
	}

	public function isLogedinCustomer(){
		session_start();
		if(isset($_SESSION['customer_id'])){
			return true;
		}else{
			return false;
		}
	}

	public function filterbysubject(){
		session_start();
		if(isset($_GET['subject_val'])){
			$subject = $_GET['subject_val'];
			$subjects = $this->adModel->getSubjects();
			$adsbysubject = $this->adModel->getAdsBySubject($subject);
			$data = ['ads'=>$adsbysubject,'subjects'=>$subjects];
			$this->view('ads/filterbysubject',$data);
		}
	}
}


?>