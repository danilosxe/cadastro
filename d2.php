<?php session_start();
$_SESSION['logado'] ;
$id =$_SESSION['logado'] ;
if(!empty($_SESSION['logado']) && $_SESSION['logado'] == 1){
$LG ="logado";    

}else{
$LG = isset($_SERVER['HTTP_REFERER']) ? header('location:'.$_SERVER['HTTP_REFERER']) : header('location: login.php');
}

$localhost ='mysql:host=localhost;dbname=dbcadastro';
$userName="root";
$password="";

try{
$pdo = new PDO($localhost, $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$enviarDadosMysql=$pdo->prepare('SELECT primeironome, sobrenome, email, celular, datadenascimento, genero FROM cadastrodeusuarios WHERE id=:id ');
$enviarDadosMysql->bindValue(':id', $id);
$enviarDadosMysql->execute();

while($row = $enviarDadosMysql->fetch(PDO::FETCH_OBJ)){

 $dados = array($row->primeironome,
 $row->sobrenome,
 $row->email, 
 $row->celular,
 $row->datadenascimento,
 $row->genero);
}

}catch(PDOException $ex){
echo 'erro: '.$ex->getMenssage();    
}
?>
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