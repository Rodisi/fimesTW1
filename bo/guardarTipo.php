<?
print_r($_REQUEST);



$descricao=$_REQUEST['descricao'];
$idTipo=$_REQUEST['idTipo'];

if($idTipo)  // pode nao ter id por ser registo novo
	if(!is_numeric($idTipo)) 
		die("não existe");

include "../config.php";

if ($idTipo){
	$sql="update tipoFilme set descricao='$descricao'where idTipo=$idTipo";
} else{
	$sql="insert into tipoFilme
	(descricao) 
	values ('$descricao')"; 
	}
	
if (mysql_query($sql))
	print "guardou";
else
	print "erro";
		
include "tipos.php";