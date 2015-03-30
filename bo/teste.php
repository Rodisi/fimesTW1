<?
echo "Hello World";
include "../config.php";
print "queijo";
$sql="select nome from filmes where idFilme=1";
$result = mysql_query($sql);
echo $result;
$teste="queijo";
echo $teste;
echo "teste";
print $teste;

?>