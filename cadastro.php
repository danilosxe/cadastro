<!DOCTYPE html>
<html>
<head>
<title>cadastro</title>
<meta charset="utf8" />
<style>
body{
background-image: url('http://cdn.vs.com.br/webedia-temp/1546893527232-esports.jpg'); 
background-color: rgb(50,50,50);
margin: 0px;
padding: 0px;    
}    
form#formulario-de-cadastro{
width: 30%;
height: auto;
margin: 0px auto; 
overflow: hidden;  
padding: 1%;  
background-color: rgba(50,50,50,0.9);
border-radius: 5px;
}

input#primeiro-nome{
width: 48%;
float: left;
} 
input#sobrenome{
width: 48%; 
float: right;
}
input#email, input#senha, input#celular{
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
}
button#formulario-botao:hover{
background-image: linear-gradient(to bottom, rgb(0,150,255)0%, rgb(0,110,240)50% );
padding: 1px 0px;
}
fieldset{
border:none;   
margin: 0px;
padding: 0px;
color: rgb(200,200,200);
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
}
span#termos-de-uso{
color: rgb(200,200,200);
}

a.termos-de-uso-link{
text-decoration: none;
color: rgb(0,150,255);    
}
label.label-genero{
color: rgb(200,200,200);    
}
figure#emblema-da-kabum{
width: 30%;
margin: 0px auto;
padding: 0px;     
}
figure#emblema-da-kabum img{
width: 100%;   
}
span#chamada-login{
color: rgb(200,200,200);
font-size: 20px;
}
a#link-login{
text-decoration: none;
color: rgb(0,150,255);    
}
span#menssagen-de-erro{
color: rgb(213,18,29);    
}
</style>    
</head>
<body>
<h1>cadastro</h1>

<form id="formulario-de-cadastro" method="POST" >

<input type="text" id="primeiro-nome" class="input-style" name="primeiro-nome" placeholder="nome" maxlength="20" pattern="[A-Za-z]{3,20}" title="somente letras de A-Z a-z" required/>
<input type="text" id="sobrenome" class="input-style" name="sobrenome" placeholder="sobrenome" maxlength="20" pattern="[A-Za-z]{3,20}" title="somente letras de A-Z a-z" required/>
<input onBlur="change_myselect()" type="email" id="email" class="input-style" name="email" placeholder="email" maxlength="50" required/>
<span id="menssagen-de-erro"></span>
<input type="password" id="senha" class="input-style" name="senha" placeholder="senha" maxlength="30" autocomplete="foo" pattern="[0-9a-zA-Z]{6,30}" title="não é permitido caracteres especiais'$-@=#' ou espaços em branco"required/>
<input type="tel" id="celular" class="input-style" name="celular" placeholder="celular" maxlength="11" pattern="[0-9]{2}[0-9]{9}" required/>
<fieldset>
<legend>DATA DE NASCIMENTO</legend>
<input type="date" id="data-de-nascimento" class="input-style" name="data-de-nascimento" max="2019-01-01" required/>
</fieldset>
<span><label class="label-genero" for="genero-masculino">masculino</label>
<input type="radio" id="genero-masculino" calss="input-style" name="genero" value="masculino" required/></span>
<span><label class="label-genero" for="genero-feminino">feminino</label>
<input type="radio" id="genero-feminino" class="input-style" name="genero" value="feminino" required/></span><br/><br/>
<span id="termos-de-uso">Ao clicar em cadastrar, você concorda com nossos <a class="termos-de-uso-link" href="#">Termos, Política de Dados</a> e <a class="termos-de-uso-link" href="#">Política de Cookies.</a></span>
<button id="formulario-botao" type="submit" >cadastrar</button>
<span id="chamada-login">já tenho conta: <a id="link-login" href="login.php">Login</a></span>
</form>
<figure id="emblema-da-kabum">
<img src="https://lolstatic-a.akamaihd.net/esports-assets/production/team/kabum-orange-1eqysahl.png" />
</figure>
<script>
var pegarEmail = document.getElementById('email');

function change_myselect() {
  var obj, dbParam,myObj, xmlhttp, x;
  obj = { email: pegarEmail.value};
  console.log(obj);
  dbParam = JSON.stringify(obj);
  console.log(dbParam);
  xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        console.log(myObj[0]); 
        if(myObj[0] == 0){
          console.log(myObj); 
          var tpid = document.getElementById('formulario-de-cadastro');
          var tp = document.createAttribute('action');
          tp.value="conexao-mysql.php";
          tpid.setAttributeNode(tp);
          document.getElementById('menssagen-de-erro').innerHTML = '';
          } else{
          var tpid = document.getElementById('formulario-de-cadastro');
          var tp = document.createAttribute('action');
          tp.value="?aviso=email já esta em uso";
          tpid.setAttributeNode(tp);
          document.getElementById('menssagen-de-erro').innerHTML = 'email já esta em uso';
      
         }  
    } 
    
      
  };

  xmlhttp.open("POST", "consulta-dados-cadastro.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("x=" + dbParam);
  
}
/*
var ts = change_myselect();
    console.log(ts); 

function ValidarEmail(){
enviar = 1;
event.preventDefault();
if(enviar == 0){
document.getElementById('formulario-botao').type = 'submit';

}else{
document.getElementById('formulario-botao').type = 'reset';
document.getElementById('menssagen-de-erro').innerHTML = 'email já esta em uso';
}
}
*/
</script>
</body>
</html>
