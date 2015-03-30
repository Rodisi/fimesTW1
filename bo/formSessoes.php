
<style>
input{width:300px}
</style>
<?

$idSessao=@$_REQUEST['id'];


if($idSessao)
	if(!is_numeric($idSessao)) 
		die("não existe");
		

if ($idSessao){
	include "../config.php";

	$sql="select * from sessoes where idSessao=$idSessao";

	$result = mysql_query($sql); 

	$row=mysql_fetch_array($result);
}
?>
<form name="formulario" action="guardarSessao.php" method="post" enctype="multipart/form-data">


    
    
<p>

<?
// popular a select box
$sql="select * from filmes order by nome";
$result = mysql_query($sql); 
?>
<p>
	<label>filme</label>
	
	<select name="idFilme">
		<option value="">Escolha...</option>
	<? while ($rowc=mysql_fetch_array($result)){ 
	  $sel="";
	  if ($rowc['idFilme'] == $row['idFilme'])
	  	  $sel="selected";
		
	?>
		<option value="<?=$rowc['idFilme']?>" <?=$sel?>><?=$rowc['nome']?></option>
	<? } ?>
	</select>
<p>
<?
// popular a select box
$sql="select * from cinemas order by nome";
$result = mysql_query($sql); 
?>
<p>
	<label>cinema</label>
	
	<select name="idCinema">
		<option value="">Escolha...</option>
	<? while ($rowc=mysql_fetch_array($result)){ 
	  $sel="";
	  if ($rowc['idCinema'] == $row['idCinema'])
	  	  $sel="selected";
		
	?>
		<option value="<?=$rowc['idCinema']?>" <?=$sel?>><?=$rowc['nome']?></option>
	<? } ?>
	</select>
<p>
<p>
	<label>sessoes</label>
	<textarea name="sessoes">
	<?=@$row['sessoes']?>
	</textarea>
	<input type="hidden" name="idSessao" value="<?=$idSessao ?>">
<p>

<input type="submit" name="acao" value="guardar">


</form>
	