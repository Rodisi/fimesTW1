<?
print_r($_REQUEST);



$nome=$_REQUEST['nome'];
$idCinema=$_REQUEST['idCinema'];

if($idCinema)  // pode nao ter id por ser registo novo
	if(!is_numeric($idCinema)) 
		die("não existe");

include "../config.php";

if ($idCinema){
	$sql="update cinemas set nome='$nome'where idCinema=$idCinema";
} else{
	$sql="insert into cinemas
	(nome) 
	values ('$nome')"; 
	}
	
if (mysql_query($sql))
	print "guardou";
else
	print "erro";
		
include "cinemas.php";