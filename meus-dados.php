<!DOCTYPE html>
<html>
<head>
<title></title> 
<meta charset="UTF-8"/>   

<style>
table{
display: block;
width: 30%;
margin: 0px auto;   
border: 1px solid rgb(100,100,100); 
border-spacing: 0px;
}

td{
width:40%;

border-bottom: 1px solid rgb(100,100,100);
margin: 0px;   
}  

td.dados{
text-align: left;    
}
h1{
text-align: center;    
}  
</style>    
</head>    
<body>
<?php include 'meus-dados-conexao.php'?>

<h1>Meus dados</h1>
<table>
<tr><td><a href="d2.php">teste</a></td></tr>
<tr>
<td>nome</td>    
<td class="dados"><?php echo $dados[0]; ?></td>
</tr>  

<tr>
<td>sobrenome</td>
<td class="dados"><?php echo $dados[1]; ?></td>    
</tr>

<tr>
<td>email</td>
<td class="dados"><?php echo $dados[2]; ?></td>    
</tr>

<tr>
<td>celular</td>
<td class="dados"><?php echo $dados[3]; ?></td>    
</tr>

<tr>
<td>data de aniversario</td>
<td class="dados"><?php echo $dados[4]; ?></td>    
</tr>

<tr>
<td>genero</td>
<td class="dados"><?php echo $dados[5]; ?></td>    
</tr>
</table>    
</body> 
</html>