<?php

include "../config.php";

session_start(); 


if (@$_REQUEST['logout']) {
	logout();
	
}


if (@$_POST['user'] && @$_POST['pass']){

	$uuser= mysql_real_escape_string($_POST['user']);
	$upass= md5($_POST['pass']);

	$sql="SELECT id FROM usersbo WHERE password='$upass' AND username='$uuser'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);

	if ($num<1) {
		form_login();
		exit; // depois de apesentar o formulario nao apresenta mais nada;
	} else {
		$_SESSION['user'] = $uuser;
	}
	
} else if (!@isset($_SESSION['user'])) { // nao vem do form 
	form_login();
	exit;   // depois de apesentar o formulario nao apresenta mais nada
}


function form_login(){
		?>
		<h3>Login</h3>
		<form action='' method='post'>
			Username: <input type='text' name='user'><br>
			Password: <input type='password' name='pass'><br><br>
			<input type='submit' value='login'>
		</form>
		<?
}


function logout(){
	session_destroy();
}
?>
