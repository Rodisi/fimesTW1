<?
$id=$_REQUEST['id'];

if(!is_numeric($id)) die("não existe");

include "../config.php";

$sql="delete from filmes where idFilme=$id";

if (mysql_query($sql))
	print "apagou filme";
else
	print "erro";
	
$sql="delete from sessoes where idFilme=$id";

if (mysql_query($sql))
	print "apagou sessoes associadas";
else
	print "erro";
	

	

	
include "filmes.php";