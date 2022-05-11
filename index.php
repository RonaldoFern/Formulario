<?php 
include('conexao.php');

if (isset($_POST['email']) ||isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "preencha seu email";
    }elseif(strlen($_POST['senha']) == 0){
        echo "preencha o campo senha!";
    }else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $sql_code = "SELECT * FROM usuarios_table WHERE email ='$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code)  or die("falha na execucao" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario;
            

            header("Location: administrar.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
</head>
<body>
    <main class="login">
         <div class="login_container">
             <h1 class="login_title">Página de Login</h1>
             <form  class="login__form" method="POST">
                 <input class="login_input" name="email" type="email" placeholder="E-mail">
                 <span class="login_input-border"></span>
                 <input class="login_input" name="senha" type="password"  placeholder="Senha">
                 <span class="login_input-border"></span>
                 <button class="login_submit">Login</button>
                 <a class="login_reset" href="a">Esqueci a senha</a>
                </form>
         </div>
    </main>
    
</body>
</html>