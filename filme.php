<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<meta name="Description" content="">
	<META NAME="keywords" CONTENT="">
	<meta name="Author" content="Américo Rio">
	<title>Filmes</title>
	<link rel="stylesheet" href="site.css" type="text/css"  />
	<link rel="stylesheet" type="text/css" href="style.css"/>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.rating.js"></script>
<script type="text/javascript">
jQuery(function(){
    jQuery('form.rating').rating();
});
</script>
</head>
<body>

<?php error_reporting(E_ERROR); 
//print_r($_REQUEST);
//print_r($_FILES);
?>
<div id="all">

	<div id="topo" class="clearfix">
		<div class="esq"><img src="images/logo.gif"></div>
		<<div class="dir">
      

	
<form action="lista.php">
				<div class="clearfix" id="contentor1">
					<div id="contentor_procurar" class="esq clearfix">
                    
						
						<div class="dir" style="margin-right:20px;"><input type="image" id="accao_procurar" name="accao" value="procurar" src="images/btn_procurar.gif"></div>
						<div class="dir"><input type="text" id="" name="procurar"></div>

					</div>
					<div class="dir"><a href="contactos.html"><img src="images/i.gif"></a></div>
				</div>
			</form>
		</div>
	</div>
<!--fim topo-->


<div id="destaque" class="clearfix curved" >

<?


$id=$_REQUEST['idFilme'];

if(!is_numeric($id)) $id=1;

include "config.php";
$sql="SELECT *
FROM filmes
INNER JOIN tipofilme
ON tipofilme.idTipo=filmes.idTipo
WHERE idFilme=$id";
//echo $sql;
$result = mysql_query($sql); 

$row=mysql_fetch_array($result);
$votos=$row['votos'];


?>

		<div class="esq"><a href="#"><img src="<?=@$row['imagem']?>"width="300" height="400"  class="curved"></a></div>
		<div class="esq largo">
		
			<h1>TÍTULO ORIGINAL:</h1>
			<h2><a href="#"><?=@$row['nome']?></a><br></h2>
			<br>
			<p><span>DE:</span><?=@$row['realizador']?><p>
			<p><span>COM:</span><?=@$row['actores']?><p>
			<p><span>GÉNERO:</span><?=@$row['descricao']?> | <span>CLASSIFICAÇÃO:</span><?=@$row['votos']?>/5<p>
			<br>
			<p>
				<span>SINOPSE:</span><br>
			<?=@$row['sinopse']?> 
			</p>
			<br>
			<p>
				<span>CINEMAS:</span><br>
			<?
				$sql="SELECT *
				FROM sessoes
				INNER JOIN cinemas
				ON sessoes.idCinema=cinemas.idCinema
				WHERE idFilme=$id";
				$result = mysql_query($sql); 

				while ($row=mysql_fetch_array($result)){
				?>
			<?=@$row['nome']?> <?=@$row['sessoes']?> <br>
			<?}?>
			
			
			<?
$SQL = " SELECT votos, pontos FROM registro WHERE id = $id";
$RS = mysql_query($SQL);
$RF = mysql_fetch_array($RS);

$r = number_format($RF['pontos'] / $RF['votos'],2,'.','.');
?>
		<form style="display:none" title="Average Rating: <?=$votos?>" class="rating" action="rate.php">
    <input type="hidden" name="valor" value=<?=$id?> />
    <select id="r1">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
		</form>
		</div>

</div>


<div id="contents" class="clearfix">

	<div class="clearfix">
		<div id="comentarios" class="esq curved">
		<?
		$sql="select * from comentarios WHERE idFilme=$id";
		$result = mysql_query($sql);
		while ($row=mysql_fetch_array($result)){
				?>
			<div class="news clearfix">
				<div class="esq">
					<span><?=@$row['data']?></span>
					<?=@$row['assinatura']?>
				</div>
				<div class="dir">
					<?=@$row['comentario']?> 
				</div>
			</div>
		<? }?>
		</div>

		<div id="enviacomentarios" class="dir curved">
        
        <?


$id=@$_REQUEST['idFilme'];

if(!is_numeric($id)) $id=1;

include "config.php";

$sql="select * from comentarios where id=$id";

$result = mysql_query($sql); 

$row=mysql_fetch_array($result);

?>

			<form action="guardarComentario.php" name="comentform" method="post">
            <input type="hidden" name="idFilme" value="<?=$id ?>">
				<p><label for="email">Email</label><input type="text" name="email" id="email" ></p>
				<p><label for="assinatura">Assinatura</label><input type="text" name="assinatura" id="assinatura" ></p>
				<p><label for="comentario">Comentário</label><textarea name="comentario" id="comentario" ></textarea></p>
				<div class="btnsubmit"><input type="image" name="accao" value="comentar" src="images/btn_enviar.gif"></div>
			</form>
		</div>
	</div>
	


</div>


	<div id="copy">&copy; Isla/AR/VF/All Rights Reserved</div> 

</div>

</body>
</html>