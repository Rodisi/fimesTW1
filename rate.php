<?
include "config.php";
print_r($_REQUEST);
print_r($_FILES);

$rate = explode('#',$_POST['rating']);
$r = $rate[1];

$SQL = " UPDATE registro 
			SET votos = votos + 1, 
				pontos = pontos + ".$r." 
		  WHERE idFilme = ".$_POST['idFilme'];
		  
mysql_query($SQL);
?>