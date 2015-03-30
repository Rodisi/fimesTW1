<?
print_r($_REQUEST);
print_r($_FILES);

$assinatura=$_REQUEST['assinatura'];
$idFilme=$_REQUEST['idFilme'];
$data=date("Y/m/d");
$Comentario=$_REQUEST['comentario'];
$email=$_REQUEST['email'];


include "config.php";


$sql="insert into comentarios 
(assinatura , idFilme , data , comentario , email) 
values ('$assinatura', '$idFilme', '$data', '$Comentario' , '$email')"; 

	
if (mysql_query($sql))
	include "sucesso.html";
else
	print "erro";
