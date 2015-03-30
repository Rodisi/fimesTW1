<?
//print_r($_REQUEST);
//print_r($_FILES);

$assinatura=$_REQUEST['assinatura'];
$idComentario=$_REQUEST['idComentario'];
$comentario=$_REQUEST['comentario'];
$idFilme=$_REQUEST['idFilme'];
$data=date("Y/m/d");


if($idComentario)  // pode nao ter id por ser registo novo
	if(!is_numeric($idComentario)) 
		die("não existe");

include "../config.php";

if ($idComentario){
	$sql="update comentarios set 
	assinatura='$assinatura',
	idFilme=$idFilme,
	data='$data',
	comentario='$comentario'
	where idComentario=$idComentario";
} else{
	$sql="insert into comentarios 
	(assinatura , idFilme , data , comentario) 
	values ('$assinatura', '$idFilme', '$data', '$comentario')"; 
	}
	//echo $sql;
if (mysql_query($sql))
	print "guardou";
else
	print "erro";
