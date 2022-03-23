<?php

//passo1 - resgatar os dados da tela vi POST
// recebe o Nome
$nome = $_POST["nome"];
// recebe o Email
$email = $_POST["email"];
// recebe a senha Digitada
$senha = $_POST["senha"];
// Cria uma senha utilizando a criptografia de HASH em Md5
$senha = md5($senha);
// recebe o perfil do usuario
$perfil = $_POST["perfil"];

//passo2 montar a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

//passo3 montar o sql de gravação
$sql = "insert into usuario values (null,'$nome','$email','$senha','$perfil')";

//passo4 mandar esses comandos para o mysql.
if (mysqli_query($con, $sql)){
    $msg = "Cadastrado com sucesso!";
}else{
    $msg = "Erro ao Cadastrar";
}
// ENcerra a conexão com o banco
mysqli_close($con);
//Cria um alerta e redireciona
echo "<script>alert ('".$msg."'); location.href='index.php';</script>"
        

?>