<?php
    include('cadastroc.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0 ) {
            echo "Preencha seu e-mail";
        }else if(strlen($_POST['senha']) == 0 ) {
            echo "Preencha sua senha";
        }else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysql->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade==1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['user'] = $usuario;
                
                header('location: index.php');


            } else {
                echo "Falha ao logar! e-mail ou senha incorretos";   
            }
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela de cadastro</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: gray;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: black;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        
        h2 {
            text-align: center;
        }

        h1{
            color:white;
        }
        label {
            color: white;
            display: block;
            margin-bottom: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 15px;
        }
        .submit{

        }
    </style>
</head>
<body>
    <div>
    <form action="cadastro.php" method="POST">
            <h1>Login</h1>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail"> 
            <br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <br>
            <input type="submit" name="submit" value="Confirmar Login">
        </form>
    </div>
    
</body>
</html>
