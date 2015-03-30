<style>
input{width:300px}
</style>
<?
print_r($_REQUEST);
print_r($_FILES);

$id=@$_REQUEST['id'];
$idFilme=@$_REQUEST['idFilme'];
if($id)
	if(!is_numeric($id)) 
		die("não existe");

if ($id){
	include "../config.php";

	$sql="select * from comentarios where idComentario=$id";

	$result = mysql_query($sql); 

	$row=mysql_fetch_array($result);
	
	$data=date("Y/m/d");
}
?>
<form name="formulario" action="guardarComentario.php" method="post" enctype="multipart/form-data">

<p>
	<label>assinatura</label>
	<input type="text" name="assinatura" value="<?=@$row['assinatura']?>">
	<input type="hidden" name="idComentario" value="<?=$id ?>">
	<input type="hidden" name="idFilme" value="<?=$idFilme ?>">
<p>
<p>
	<label>comentarios</label>
	<input type="text" name="comentario" value="<?=@$row['comentario']?>">
<p>


<input type="submit" name="acao" value="guardar">


</form>