<?php 



function pass_confirm($password,$confirmpassword){
	if($password == $confirmpassword){
		return true;
	}else{
		return false;
	}
}

function uppercase_in($value){
	if(preg_match('/[A-Z]/', $value)){
		return true;
	}else{
		return false;
	}
}

?>