<?
$id=$_REQUEST['idTipo'];

if(!is_numeric($id)) die("não existe");

include "../config.php";

$sql="delete from tipofilme where idTipo=$id";

if (mysql_query($sql))
	print "apagou tipo";
else
	print "erro";
		
	
include "tipo.php";