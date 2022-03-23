<html>

<head>

</head>

<body>



    <?php
    session_start(); //faz o arquivo iniciar a sessao com o browser

    // pegar dados via POST

    // Recebe o valo do email
    $email = $_POST["email"];
    // Recebe o valo do email
    $senha = $_POST["senha"];
    // COnverte a senha em um hash criptografado de MD5
    $senha = md5($senha);

    //montar a instrução para ir ao banco
    //e selecionar o usuario que tenha este email
    $sql = "select * from usuario where email = '$email' AND senha = '$senha' ";

    //abrir a conexao com o banco de dados
    include_once 'conect.cfg';
    //include_once './adm/logado.php';

    //executar conexao e roda a query sql
    $resultado = mysqli_query($con, $sql);

    if (mysqli_num_rows($resultado) == 1) {

        $row = mysqli_fetch_array($resultado);
        //enviar dados para a sessão

        $_SESSION["email"] = $row["email"];
        $_SESSION["perfil"] = $row["perfil"];
        $_SESSION["tempo"] = time();

        //econtrou
        //vou redirecionar o usuario para a pasta do sistema
        if ($_SESSION["perfil"] == "2") {
            //$logado = $conteudo_adm ;
            // Cria o formulario cadastrar e Alterar Senha
            echo '<h1>Cadastrar</h1>
                 <form action="cad_usuario.php" method="post">
                 Nome
                          <input type="text" name="nome" id="nome" required>
                 Email
                          <input type="text" name="email" id="email"  required>
                      Senha
                          <input type="password"  name="senha" id="senha"  required>
                          <span >Perfil:</span>
                          </div>					
		<select name="perfil" id="perfil" class="browser-default custom-select">
		  <option value="0" selected="selected">Aluno</option> 
		  <option value="1">Professor</option>
          <option value="2">Coordenador</option>
		  </select>
					
                        <button type="submit" >Cadastrar</button>   
                        
                    <h1>Alterar Senha</h1>
                </form>
                 
                 <form action="alt_senha.php" method="post">
                 
                 Email
                          <input type="text" name="email" id="email"   required>
                      Senha
                          <input type="password"  name="senha" id="senha"  required>
                          		
                        <button type="submit" >Alterar</button>                     
                </form>
                
                <a href="consultar.php">Consultar Usuário</a>                

                ';
        }
        // Verifica a seção de acordo com o perfíl
        if ($_SESSION["perfil"] == "1") {
            //$logado = $conteudo_prof ;
            $e = $row["email"];
            echo '<h1>Perfil de Professor</h1>
                 <form action="alt_senha.php" method="post"> 
                     Email';
            echo "<input type='text' name='email' id='email' readonly='true' value='$e'";
            echo "required>";
            echo '     Senha
                          <input type="password"  name="senha" id="senha"  required>
                          		
                        <button type="submit" >Alterar</button>                     
                </form>';
        }
        // Verifica a seção de acordo com o perfíl
        if ($_SESSION["perfil"] == "0") {
            //$logado = $conteudo_aluno ;
            $e = $row["email"];
            echo '<h1>Perfil de Aluno</h1> 
                     <form action="alt_senha.php" method="post"> 
                     Email';
            echo "<input type='text' name='email' id='email' readonly='true' value='$e'";
            echo "required>";
            echo '     Senha
                          <input type="password"  name="senha" id="senha"  required>
                          		
                        <button type="submit" >Alterar</button>                     
                </form>';
        }
    } else {
        // Cria um alerta informando que o usuário ou senha é inválido
        echo "<script>alert ('Email ou Senha Invalidos!'); location.href='index.php';</script>";
    }

    ?>

    <h1>Area de Gestão</h1>
    <?php

    echo "Seja Bem Vindo! " . $_SESSION['email'];
    echo "<p></p> <a href='logout.php'>Logout</a> </a>";

    ?>

</body>

</html>