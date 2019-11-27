<?php

@$nome = $_POST['primeiro-nome'];
@$sobrenome = $_POST['sobrenome'];
@$email = $_POST['email'];
@$senha = $_POST['senha'];
@$celular =$_POST['celular'];
@$dataDeNascimento = $_POST['data-de-nascimento'];
@$genero = $_POST['genero'];

echo 'seu nome: '.$nome.'<br/>sobrenome: '.$sobrenome.'<br/>email: '.$email.'<br/>senha: '.sha1($senha).'<br>celular:'.$celular.'<br/>data de nascimento: '.$dataDeNascimento.'<br/>genero: '.$genero;

$localhost ='mysql:host=localhost;dbname=dbcadastro';
$userName="root";
$password="";

try{
$pdo = new PDO($localhost, $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo '<br/>conectado com sucesso';

//preparando cadastro. 
$enviarDadosMysql=$pdo->prepare('INSERT INTO cadastrodeusuarios (primeironome, sobrenome, email, senha, celular, datadenascimento, genero) VALUES (:primeironome, :sobrenome, :email, :senha, :celular, :datadenascimento, :genero)');
$enviarDadosMysql->bindValue(':primeironome', $nome);
$enviarDadosMysql->bindValue(':sobrenome', $sobrenome);
$enviarDadosMysql->bindValue(':email', $email);
$enviarDadosMysql->bindValue(':senha', sha1($senha));
$enviarDadosMysql->bindValue(':celular', $celular);
$enviarDadosMysql->bindValue(':datadenascimento', $dataDeNascimento);
$enviarDadosMysql->bindValue(':genero', $genero);

//validndo cadastro. verificando se o email já existe no banco de dados.
$consultarDados = $pdo->prepare('SELECT email FROM cadastrodeusuarios WHERE email=:email');
$consultarDados->bindValue(':email', $email);
$consultarDados->execute();

if($consultarDados->rowCount() == 0){
$enviarDadosMysql->execute(); //se a condição for true, o cadastro sera realizado.   
}else{ echo 'o email já existe';}

}catch(PDOException $ex){
echo 'erro: '.$ex->getMenssage();    
}
$pdo = null;
header('Location: login.php');