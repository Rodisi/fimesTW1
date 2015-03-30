<?
$id=$_REQUEST['id'];

if(!is_numeric($id)) die("não existe");

include "../config.php";


$sql="delete from cinemas where idCinema=$id";

if (mysql_query($sql))
	print "apagou cinema";
else
	print "erro";
	
	
$sql="delete from sessoes where idCinema=$id";

if (mysql_query($sql))
	print "apagou sessoes";
else
	print "erro";
		
	
include "cinemas.php";