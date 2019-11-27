<?php session_start();
@$_SESSION['logado'];
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8" />

<style>
body{
background-image: url('http://cdn.vs.com.br/webedia-temp/1546893527232-esports.jpg'); 
background-color: rgb(50,50,50);
margin: 0px;
padding: 0px;    
}    
form#formulario-de-login{
width: 30%;
height: auto;
margin: 0px auto; 
overflow: hidden;  
padding: 1%;  
background-color: rgba(50,50,50,0.9);
border-radius: 5px;
}

input#login-email, input#login-senha{
width: 98%;
}

input.input-style{ 
font-size: 20px;
margin: 5px 0px;
padding: 0.7%;  
box-shadow: none;
border: none;
border-radius: 10px;
}

button#formulario-botao{
width: 100%;  
transition: 1s; 
background-image: linear-gradient(to bottom, rgb(0,128,255)0%, rgb(0,110,240)50% );
font-size: 3vw;
box-shadow: none;
border: none;
padding: 0px;
margin: 10px 0px;
}
button#formulario-botao:hover{
background-image: linear-gradient(to bottom, rgb(0,150,255)0%, rgb(0,110,240)50% );
padding: 1px 0px;
}

h1{
width: 30%;
padding: 0px;  
margin: 0px auto;    
font-size: 5vw;
text-align: center;
color: rgb(174,132,26);
text-transform: uppercase;
text-shadow: 5px 10px 5px rgb(0,0,0);
transition: 1s;
}

span#chamada-cadastro{
color: rgb(200,200,200);
font-size: 20px;
}

a#link-cadastrar{
text-decoration: none;
color: rgb(0,150,255);    
}
figure#emblema-da-kabum{
width: 30%;
margin: 0px auto;
padding: 0px;     
}
figure#emblema-da-kabum img{
width: 100%;   
}
span#menssagen-de-erro{
color: rgb(213,18,29);    
}
</style>    
</head>

<body>

<h1>login</h1>

<form id="formulario-de-login" method="post">
<input  type="email" id="login-email" class="input-style" name="email" placeholder="email" maxlength="50" required />
<input  type="password" id="login-senha" class="input-style" name="senha" placeholder="senha" maxlength="30" required />
<span id="menssagen-de-erro"></span>
<button onClick="change_myselect()" id="formulario-botao" type="button">login</button>
<span id="chamada-cadastro">Ainda não tenho conta: <a id="link-cadastrar" href="cadastro.php">casdastre-se</a></span>
</form>

<!-- -->
<figure id="emblema-da-kabum">
<img src="https://lolstatic-a.akamaihd.net/esports-assets/production/team/kabum-orange-1eqysahl.png" />
</figure>


<script>
var pegarEmail = document.getElementById('login-email');
var pegarSenha = document.getElementById('login-senha');
function change_myselect() {
 var obj, dbParam,myObj, xmlhttp, x;
 obj = { email: pegarEmail.value, senha: pegarSenha.value};
 console.log(obj);
 dbParam = JSON.stringify(obj);
 console.log(dbParam);
 xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
 if (this.readyState == 4 && this.status == 200) {
 myObj = JSON.parse(this.responseText);

 if(myObj[0] == 1){
 document.getElementById('menssagen-de-erro').innerHTML = '';
 window.location.replace("meus-dados.php?id=" + myObj[1]);
 }else{
 document.getElementById('menssagen-de-erro').innerHTML = 'email ou senha invallido';
 }  
 } 
 };

xmlhttp.open("POST", "consulta-dados-login.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam); 
}

</script>

</body>
</html>
