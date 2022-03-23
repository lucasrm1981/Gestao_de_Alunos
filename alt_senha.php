<?php

//pegar os dados da tela
$email = $_POST["email"]; 
$senha = $_POST["senha"];

//passo2 montar a conexao com o mysql e selecionar a base
include_once 'conect.cfg';

       
        //criar a instrução de atualização
        $sql = "update usuario set senha = '".md5($senha)."' where email = '".$email."' ";
                
             if (mysqli_query($con,$sql)){
                $msg = "alterado com sucesso!";
                }else{
                $msg = "Erro ao alterar";
                }
        mysqli_close($con);
                //redirecionar
               echo "<script>alert ('".$msg."');  location.href='index.php';</script>"
        ?>

