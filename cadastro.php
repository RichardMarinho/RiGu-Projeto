<?php
 if(isset($_POST['submit']))
 {
    //print_r('Nome: ' . $_POST['email']);
   //print_r('<br>');
   //print_r('Senha: ' . $_POST['senha']);

        include_once('cadastroc.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conn, "INSERT INTO usuarios(email, senha)
        VALUES ('$email', '$senha')");

        header('location: ');

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
            <h1>Cadastro</h1>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail"> 
            <br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <br>
            <input type="submit" name="submit" value="Cadastrar">
        </form>
    </div>
    
</body>
</html>
