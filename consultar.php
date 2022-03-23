<html>

<head>
    <meta charset="UTF-8">
    <title>Consultar Alunos</title>

    <!-- Funcao excluir pelo javascript -->
    <script>
        // Passa o id do usuário para a exclusão
        function excluir(id) {
            if (confirm('deseja realmente excluir este Usuário ?')) {
                location.href = 'excluir.php?id=' + id;
                // irá para a lógica de excluir Aluno
            } // fecha o if

        } // termina a função excluir
    </script>
</head>

<body>

    <a href="index.php">Login</a>

    <a href="consultar.php">Consultar Usuários</a>

    <h3 class="page-header">Consultar Usuários</h3>

    <form action="consultar.php" method="get">

        Nome: <input type="text" required name="nome" />
        <input type="submit" value="Buscar" />
        <input type="reset" value="Limpar Campos" />
    </form>

    <?php
    //pegar o nome
    if (isset($_GET["nome"])) {
        if ($_GET["nome"] != "") {
            $nome = $_GET["nome"];

            // abrir a conexao com o banco de dados

            include_once 'conect.cfg';

            // instrucao sql para selecionar somente aquele registro       
            $sql = "select * from  usuario where nome like '" . $nome . "%'";

            //"select * from  usuario
            // mysqli_query() --> executa o mysqli no banco

            $resultado = mysqli_query($con, $sql);

            // Verifica Se existe algum registro
            if (mysqli_num_rows($resultado) > 0) {
                // echo "encontrei";
    ?>
                <br><br>
                <table >
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Perfil</th>

                    </tr>
                    <?php
                    // Enquanto encontrar uma linha no banco recarrega o conteúdo.
                    while ($row = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo $row["nome"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <?php
                            // Verifica o perfil do usuario 0 Aluno, 1 Professor e 2 Coordenador
                            switch ($row["perfil"]) {
                                case 2:
                                    $p = "Coordenador";
                                    break;
                                case 1:
                                    $p = "Professor";
                                    break;
                                case 0:
                                    $p = "Aluno";
                                    break;
                            }
                            ?>

                            <td><?php echo $p; ?></td>
                            <td>
                            <td>
                                <a href="#" onclick="excluir(<?php echo $row["id"]; ?>)">
                                    <button>Excluir</button></a>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </table>

    <?php
            } else {
                echo "Nenhum registro encontrado";
            }
            // Fecha a conexao com o banco
            mysqli_close($con);
        }
    }
    ?>

    </div> <!-- fecha a divisão do container -->
</body>

</html>