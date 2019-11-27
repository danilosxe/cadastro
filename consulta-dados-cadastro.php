<?php 

header("Content-Type: application/json; charset=UTF-8");
$email= json_decode($_POST['x']);
$resposta;
$localhost ='mysql:host=localhost;dbname=dbcadastro';
$userName="root";
$password="";
try{
$pdo = new PDO($localhost, $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//validndo cadastro. verificando se o email já existe no banco de dados.
$consultarDados = $pdo->prepare('SELECT email FROM cadastrodeusuarios WHERE email=:email');
$consultarDados->bindValue(':email', $email->email);
$consultarDados->execute();


if($consultarDados->rowCount() == 0){

$resposta = 0;
}else{ 

$resposta = '1';
}

$resultado= array($resposta);

echo json_encode($resultado);


}catch(PDOException $ex){
echo 'erro: '.$ex->getMenssage();    
}

//header("Cache-Control: no-cache");

$pdo = null;
