<?php 

 function redirect($pagename){
	header("location:" . URL_ROOT . '' . $pagename );
}

function forbiddenURL($url){
	if($url == 'aajs'){
		return true;
	}else{
		return false;
	}
}

?>