<?php



$email    = trim($_POST['email']);
$assinatura          = $_POST['assinatura'];
$comentario          = $_POST['comentario'];
 
 

$mensagemHTML = '<P>FORMULARIO PREENCHIDO NO SITE WWW.filmes.pt</P>
<p><b>Email:</b> '.$email.'
<p><b>Assinatura:</b> '.$assinatura.'
<p><b>Comentario:</b> '.$comentario.'</p>
<hr>';



$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $email\r\n";
$envio = mail($email, $assinatura, $comentarioHTML, $headers); 
 
 if($envio)
echo "<script>location.href='sucesso2.html'</script>"; 

?>