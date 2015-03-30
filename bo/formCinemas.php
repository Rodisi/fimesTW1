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

	$sql="select * from cinemas where idCinema=$id";

	$result = mysql_query($sql); 

	$row=mysql_fetch_array($result);
}
?>
<form name="formulario" action="guardarCinemas.php" method="post" enctype="multipart/form-data">

<p>
	<label>nome</label>
	<input type="text" name="nome" value="<?=@$row['nome']?>">
	<input type="hidden" name="idCinema" value="<?=$id ?>">
<p>
<input type="submit" name="acao" value="guardar">


</form>