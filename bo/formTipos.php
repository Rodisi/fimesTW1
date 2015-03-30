<style>
input{width:300px}
</style>
<?

$id=@$_REQUEST['id'];

if($id)
	if(!is_numeric($id)) 
		die("não existe");

if ($id){
	include "../config.php";

	$sql="select * from tipofilme where idTipo=$id";

	$result = mysql_query($sql); 

	$row=mysql_fetch_array($result);
}
?>
<form name="formulario" action="guardarTipo.php" method="post" enctype="multipart/form-data">

<p>
	<label>descricao</label>
	<input type="text" name="descricao" value="<?=@$row['descricao']?>">
	<input type="hidden" name="idTipo" value="<?=$id ?>">
<p>
<input type="submit" name="acao" value="guardar">


</form>