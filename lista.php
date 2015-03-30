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
<?php error_reporting(E_ERROR); ?>
<div id="all">

	<div id="topo" class="clearfix">
		<div class="esq"><img src="images/logo.gif"></div>
		<div class="dir">
      

	
<form action="">
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



<div id="contents" class="clearfix">
<!-- colunas -->
<?
include "config.php";
$procurar=@$_REQUEST['procurar'];
$sql="select * from filmes";
if ($procurar) $sql.= " where nome like '%$procurar%' OR realizador like '%$procurar%' OR ano like '%$procurar%' OR actores like '%$procurar%'";
//echo $sql;


$result = mysql_query($sql);

while ($row=mysql_fetch_array($result)){
?>
<div class="coluna alta">
		<a href="filme.php?idFilme=<?=@$row['idFilme']?>"><img src="<?=@$row['imagem']?>" width="130"  class="curved"></a>
		<br>
		<form style="display:none" title="Average Rating: <?=@$row['votos']?>" class="rating" action="rate.php">
    <input type="hidden" name="valor" value="1" />
    <select id="r1">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</form>
		<br>
		<h1><?=$row['nome']?></h1>
		<p><?=$row['sinopse']?> <p>
  </div>
  <? } ?>
	
	





<!-- fim colunas -->
	
	<div id="nav">
		<a href="#"><img src="images/back.gif"></a>
		<a href="#"><img src="images/nav_off.gif"></a>
		<a href="#"><img src="images/nav_on.gif"></a>
		<a href="#"><img src="images/next.gif"></a>
	</div>

</div>


	<div id="copy">&copy; Isla/AR/VF/All Rights Reserved</div> 

</div>

</body>
</html>