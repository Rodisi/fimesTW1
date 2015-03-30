<script src="ckeditor/ckeditor.js"></script>
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

	$sql="select * from filmes where idFilme=$id";

	$result = mysql_query($sql); 

	$row=mysql_fetch_array($result);
}
?>
<form name="formulario" action="guardarFilmes.php" method="post" enctype="multipart/form-data">

<p>
	<label>nome</label>
	<input type="text" name="nome" value="<?=@$row['nome']?>">
	<input type="hidden" name="idFilme" value="<?=$id ?>">
<p>
<p>
	<label>realizador</label>
	<input type="text" name="realizador" value="<?=@$row['realizador']?>">
<p>
<p>
	<label>actores</label>
	<input type="text" name="actores" value="<?=@$row['actores']?>">
    
    
<p>
<p>
	<label>ano</label>
	<input type="text" name="ano" value="<?=@$row['ano']?>">
    
    
<p>

<?
// popular a select box
$sql="select * from tipoFilme order by descricao";
$result = mysql_query($sql); 
?>
<p>
	<label>tipo de filme</label>
	
	<select name="idTipo">
		<option value="">Escolha...</option>
	<? while ($rowc=mysql_fetch_array($result)){ 
	  $sel="";
	  if ($rowc['idTipo'] == $row['idTipo'])
	  	  $sel="selected";
		
	?>
		<option value="<?=$rowc['idTipo']?>" <?=$sel?>><?=$rowc['descricao']?></option>
	<? } ?>
	</select>
<p>

<p>
	<label>imagem</label>
	<input type="file" name="imagem" >
	<br><img src="../<?=@$row['imagem']?>" width="100">
<p>
<p>
	<label>sinopse</label>
	<textarea name="sinopse">
	<?=@$row['sinopse']?>
	</textarea>
<p>

<input type="submit" name="acao" value="guardar">


</form>
<script>
CKEDITOR.replace('sinopse');
</script>		