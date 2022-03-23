<html>
    <head>
        
    </head>
    <body>
        <?php
        // pegar a identificação que esta vindo da página de consulta
        $id = $_GET["id"];
        
        // chamar a conexão com o banco
        include_once 'conect.cfg';
        
        
        // montar a instrução que ira ao banco excluir o registro
        $sql = "delete from usuario where id =".$id;
        
        // igual ao gravar.
        if(mysqli_query($con, $sql)){
    $msg = "Excluido com sucesso!";    
}else{
$msg = "Erro ao gravar!";}

mysqli_close($con);
// redirecionar
echo"<script>alert('".$msg."'); location.href='index.php';</script>"
        
        
        // logica de exclusão.....
       
        ?>
    </body>
</html>