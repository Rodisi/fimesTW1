<?
print_r($_REQUEST);
print_r($_FILES);

$idSessao=$_REQUEST['idSessao'];
$sessoes=$_REQUEST['sessoes'];
$idFilme=$_REQUEST['idFilme'];
$idCinema=$_REQUEST['idCinema'];

if($idSessao)  // pode nao ter id por ser registo novo
	if(!is_numeric($idSessao)) 
		die("não existe");

include "../config.php";

if ($idSessao){
	$sql="update sessoes set 
	sessoes='$sessoes',
	idFilme='$idFilme',
	idCinema='$idCinema'
	where idSessao='$idSessao'";
	echo $sql;
} else{
	$sql="insert into sessoes 
	(sessoes, idFilme, idCinema) 
	values ('$sessoes', '$idFilme', '$idCinema')"; 
	}
	
if (mysql_query($sql))
	print "guardou";
else
	print "erro";
		
include "sessoes.php";
	