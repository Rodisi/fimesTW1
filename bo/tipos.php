
<h1>Lista Tipos Filme</h1>
<?
include "../config.php";

$procurar=@$_REQUEST['procurar'];
$offset=@$_REQUEST['offset'];
if (!$offset) $offset=0;

$limit=4;  //nº de linhas por pagina

$sql="select count(idTipo) as total from tipofilme ";
if ($procurar) $sql.= " where descricao like '%$procurar%' ";
$result = mysql_query($sql); 
$linhatotal=mysql_fetch_array($result);
$total_num_rows=$linhatotal['total'];


$sql="select * from tipofilme ";
if ($procurar) $sql.= " where descricao like '%$procurar%' ";
$sql.= " order by idTipo desc limit $offset, $limit";

$result = mysql_query($sql);     
// o result aponta para a tabela temporária



while ($row=mysql_fetch_array($result)){
	// vai buscar linha  a linha e testa se ainda há linha
		?>
		<a href="formTipos.php?id=<?=$row['idTipo']?>"><?=$row['descricao']?></a>
		<a href="apagarTipo.php?id=<?=$row['idTipo']?>">[X]</a>
		<br>

		<?
}

?>
<a href="formTipos.php?id=0">Inserir novo tipo</a>
	<? if (($offset - $limit ) >= 0) { ?>
		<a href="?offset=0&procurar=<?=$procurar?>"> << </a>
	<a href="?offset=<?= ($offset - $limit) ?>&procurar=<?=$procurar?>"> < </a>
	<? } ?>

	<? if (($offset + $limit ) < $total_num_rows) { ?>
		<a href="?offset=<?= ($offset + $limit) ?>&procurar=<?=$procurar?>"> > </a>
		
		<a href="?offset=<?= 
		($total_num_rows - ($total_num_rows % $limit) ) ?>&procurar=<?=$procurar?>"> >> </a>
	<? } ?>
	
		<form action="">
			<input name="procurar" value="<?=$procurar?>">
			<input type="submit" value="ok">
		</form>