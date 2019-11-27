<?php session_start();
$id = $_GET['id'];
if(!empty($_GET['id']) && $_SESSION['logado'] == $_GET['id']){
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