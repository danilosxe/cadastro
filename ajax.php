<html>
<head>
<title></title>
<meta charset="UTF-8" />
<style>
.mask-jogos{
display: none;    
}
</style>
</head>
<body>
<?php
$url = 'http://www.palmeiras.com.br/home/';

$dados = file_get_contents($url); 
$var1 = explode('<section id="calendario">', $dados);
$var2 = explode('</section>', $var1[1]);
print($var2[0]);
?>

</body>
</html>