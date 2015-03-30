<style>
a{margin: 6px;}

</style>
<h1>Lista Filmes</h1>
<?
include "../config.php";


$procurar=@$_REQUEST['procurar'];
$offset=@$_REQUEST['offset'];
if (!$offset) $offset=0;

$limit=4;  //nº de linhas por pagina

$sql="select count(idFilme) as total from filmes ";
if ($procurar) $sql.= " where nome like '%$procurar%' ";
$result = mysql_query($sql); 
$linhatotal=mysql_fetch_array($result);
$total_num_rows=$linhatotal['total'];


$sql="select * from filmes ";
if ($procurar) $sql.= " where nome like '%$procurar%' ";
$sql.= " order by idFilme desc limit $offset, $limit";

$result = mysql_query($sql);     
// o result aponta para a tabela temporária

//print "id tab temporaria $result <br>";

while ($row=mysql_fetch_array($result)){
	// vai buscar linha  a linha e testa se ainda há linha
		?>
		<a href="formFilmes.php?id=<?=$row['idFilme']?>"><?=$row['nome']?></a>
		<a href="apagarFilme.php?id=<?=$row['idFilme']?>">[X]</a>
        <a href="comentarios.php?id=<?=$row['idFilme']?>">[comentarios]</a>
		<br>

		<?
}

?>
<a href="formFilmes.php?id=0">Inserir novo filme</a>
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

