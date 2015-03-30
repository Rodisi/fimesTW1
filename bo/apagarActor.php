<?
$id=$_REQUEST['idActor'];

if(!is_numeric($id)) die("não existe");

include "../config.php";


$sql="delete from actores where idActor=$id";

if (mysql_query($sql))
	print "apagou actor";
else
	print "erro";
		
$sql="delete from cast where idActor=$id";

if (mysql_query($sql))
	print "apagou do cast";
else
	print "erro";
	

	
include "actores.php";