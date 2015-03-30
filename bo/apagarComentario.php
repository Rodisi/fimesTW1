<?
$id=$_REQUEST['id'];

if(!is_numeric($id)) die("não existe");

include "../config.php";


$sql="delete from comentarios where idComentario=$id";

if (mysql_query($sql))
	print "apagou comentario";
else
	print "erro";
		
	
include "comentarios.php";