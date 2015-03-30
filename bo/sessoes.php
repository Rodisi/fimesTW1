<style>
a{margin: 6px;}

</style>
<h1>Lista Sessoes</h1>
<?
include "../config.php";

$procurar=@$_REQUEST['procurar'];
$offset=@$_REQUEST['offset'];
if (!$offset) $offset=0;

$limit=4;  //nº de linhas por pagina

$sql="select count(idFilme) as total from sessoes ";
if ($procurar) $sql.= " where sessoes like '%$procurar%' ";
$result = mysql_query($sql); 
$linhatotal=mysql_fetch_array($result);
$total_num_rows=$linhatotal['total'];


$sql="select * from sessoes ";
if ($procurar) $sql.= " where sessoes like '%$procurar%' ";
$sql.= " order by idFilme desc limit $offset, $limit";

$result = mysql_query($sql);     




while ($row=mysql_fetch_array($result)){
	// vai buscar linha  a linha e testa se ainda há linha
		?>
		<a href="formSessoes.php?id=<?=$row['idSessao']?>"><?=$row['sessoes']?></a>
		<a href="apagarSessao.php?id=<?=$row['idSessao']?>">[X]</a>
		<br>

		<?
}

?>
<a href="formSessoes.php?id=0">Inserir nova sessao</a>
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

