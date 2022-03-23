<?php

// Executa a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

//Recupera os dados enviados via POST
// recebe o email
$email = $_POST["email"]; 
// recebe a senha
$senha = $_POST["senha"];
// Cria uma senha utilizando a criptografia de HASH em Md5
$senha = md5($senha);


       
        //criar a instrução de atualização atraves do email recebido via POST
        $sql = "update usuario set senha = '$senha' where email = '$email' ";
                
//Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
             if (mysqli_query($con,$sql)){
                     // Caso a conexao esteja correta cria o retorno da alteracao
                $msg = "alterado com sucesso!";
                }else{
                        // Caso a conexao nao seja realizada cria o retorno do cadastro com erro
                $msg = "Erro ao alterar";
                }
        mysqli_close($con);
        // Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
               echo "<script>alert ('".$msg."');  location.href='index.php';</script>"
?>