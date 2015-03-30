<style>
a{margin: 6px;}

</style>
<h1>Lista Comentarios</h1>
<?
print_r($_REQUEST);
print_r($_FILES);
include "../config.php";

$procurar=@$_REQUEST['procurar'];
$offset=@$_REQUEST['offset'];
if (!$offset) $offset=0;

$limit=4;  //nº de linhas por pagina
$idFilme=@$_REQUEST['id'];
$sql="select count(idComentario) as total from comentarios ";
if ($procurar) $sql.= " where assinatura like '%$procurar%'AND idFilme='$idFilme'";
else $sql.= "idFilme='$idFilme'";
$result = mysql_query($sql); 
$linhatotal=mysql_fetch_array($result);
$total_num_rows=$linhatotal['total'];


$sql="select * from comentarios ";
if ($procurar) $sql.= " where assinatura like '%$procurar%' AND idFilme='$idFilme'  ";
else $sql.= " where idFilme='$idFilme'  ";
$sql.= " order by idComentario desc limit $offset, $limit";

$result = mysql_query($sql);     
// o result aponta para a tabela temporária

//print "id tab temporaria $result <br>";

while ($row=mysql_fetch_array($result)){
	// vai buscar linha  a linha e testa se ainda há linha
		?>
		<a href="formComentarios.php?id=<?=$row['idComentario']?>&idFilme=<?=$row['idFilme']?>"><?=$row['comentario']?><?="---------"?><?=$row['assinatura']?></a>
		<a href="apagarComentario.php?id=<?=$row['idComentario']?>">[X]</a>
		<br>

		<?
}

?>
<a href="formComentarios.php?id=0&idFilme=<?=$idFilme?>">Inserir novo comentario</a>

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