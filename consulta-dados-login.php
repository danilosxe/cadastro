<?php session_start();

header("Content-Type: application/json; charset=UTF-8");
$localhost="mysql:host=localhost;dbname=dbcadastro";
$userName="root";
$password="";
$iduser;
$erro;
@$dadosJson= json_decode($_POST['x']);

try{
$pdo = new PDO($localhost, $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$consultarDados = $pdo->prepare('SELECT id FROM cadastrodeusuarios WHERE email=:email AND senha=:senha');
$consultarDados->bindValue(':email', $dadosJson->email);
$consultarDados->bindValue(':senha', sha1($dadosJson->senha));
$consultarDados->execute();



if($consultarDados->rowCount() == 1){
@$erro= 1;
$row = $consultarDados->fetch(PDO::FETCH_OBJ);
$iduser = $row->id;   
$_SESSION['logado'] = $iduser;
}else{
 @$erro = 0; 
 $iduser = "nao foi possivel" ;
session_destroy();    
 }

$resposta = array($erro, $iduser);
echo json_encode($resposta);
}catch(PDOException $ex){
echo 'erro: '.$ex->getMenssage();  
}

$pdo = null;