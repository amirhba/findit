<?php 

function csrf_token(){
	return md5(uniqid(rand(),TRUE));
}

function create_csrf_token(){
	$token = csrf_token();
	session_start();
	$_SESSION['csrf_token'] = $token;
	$_SESSION['csrf_token_time'] = time();
	return $token;
}

function destroy_csrf_token(){
	$_SESSION['csrf_token'] = null;
	$_SESSION['csrf_token_name'] = null;
	return true;
}

function csrf_token_tag(){
	$token = create_csrf_token();
	return "<input type='hidden' name='csrf_token' value=" . $token .">";
}


function csrf_token_isvalid(){
	if(isset($_POST['csrf_token'])){
		session_start();
		$usertoken = $_POST['csrf_token'];
		$storedtoken = $_SESSION['csrf_token'];
		if($storedtoken == $usertoken){
			return true;
		}else{
			return false;
		}
	}
}

?>