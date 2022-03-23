<html>

<head>

</head>

<body>
    <?php

    // Executa a conexao com o mysql e selecionar a base
    include_once 'conect.cfg';

    // pegar a identificação que esta vindo da página de consulta
    $id = $_GET["id"];

    // montar a instrução que ira ao banco excluir o registro
    $sql = "delete from usuario where id =" . $id;


    //Faz a conexao e executa a instrucao carregada na varivael $sql e os envia para o banco mysql.
    if (mysqli_query($con, $sql)) {
        // Caso a conexao esteja correta cria o retorno da exclusao
        $msg = "Excluido com sucesso!";
    } else {

        // Caso a conexao nao seja realizada cria o retorno da exclusao com erro
        $msg = "Erro ao gravar!";
    }

    mysqli_close($con);
    // Cria um alert javascript carrega o conteúdo da variável $msg e redireciona para o index
    echo "<script>alert('" . $msg . "'); location.href='index.php';</script>"

    ?>
</body>

</html>