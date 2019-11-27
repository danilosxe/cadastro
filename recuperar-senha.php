<?php

$localhost='mysql:host=localhost;dbname=dbcadastro';
$userName='root';
$password='';

@$email = $_GET['recuperar-senha'];
$ms;
try{
$pdo = new PDO($localhost, $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$verificarEmail = $pdo->prepare('SELECT email FROM cadastrodeusuarios WHERE email=:email');
$verificarEmail->bindValue(':email', $email);
$verificarEmail->execute();

if ($verificarEmail->rowCount() == 1){
$ms = "email cadastrado";
    // the message
$msg = time();

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("daniloesports@gmail.com","My subject",$msg);
}else{
$ms = "email não cadastrado"; 

}
echo $ms;
}catch(PDOExeption $ex){
echo "erro:".$ex->getMenssage();    
}

/*
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("daniloesports@gmail.com","My subject",$msg);
*/
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<form method="GET">
<input type="email" name="recuperar-senha" placeholder="email" maxlength="50" required />
<button type="submit"></button>
</form>

</body>
</html>