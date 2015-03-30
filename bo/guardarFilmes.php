<?
//print_r($_REQUEST);
//print_r($_FILES);
$uploads_dir = 'upload';
if ($_FILES["imagem"]['error'] == UPLOAD_ERR_OK) {
	$tmp_name = $_FILES["imagem"]["tmp_name"];  //nome temporario
	$name = $_FILES["imagem"]["name"];   // nome original
	$imagem= "$uploads_dir/$name";  //nome final
	move_uploaded_file($tmp_name, "../" . $imagem);
	}

	
$nome=$_REQUEST['nome'];
$idTipo=$_REQUEST['idTipo'];
$sinopse=$_REQUEST['sinopse'];
$realizador=$_REQUEST['realizador'];
$ano=$_REQUEST['ano'];
$actores=$_REQUEST['actores'];
$idFilme=$_REQUEST['idFilme'];

if($idFilme)  // pode nao ter id por ser registo novo
	if(!is_numeric($idFilme)) 
		die("não existe");

include "../config.php";

if ($idFilme){
	$sql="update filmes set 
	nome='$nome',
	idTipo='$idTipo',
	realizador='$realizador',
	actores='$actores',
	sinopse='$sinopse'";
	if (@$imagem) $sql .=" ,imagem='$imagem'";
	$sql .=" ,ano='$ano' 
	where idFilme=$idFilme";
} else{
	$sql="insert into filmes 
	(nome, idTipo, realizador, actores , sinopse, ano , imagem ) 
	values ('$nome', '$idTipo', '$realizador', '$actores' , '$sinopse', '$ano' , '$imagem' )"; 
	}
	echo $sql;
if (mysql_query($sql))
	print "guardou";
else
	print "erro";
		
include "filmes.php";
	