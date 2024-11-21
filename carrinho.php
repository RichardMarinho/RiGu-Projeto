<?php
session_start();

// Remove um item do carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover'])) {
    unset($_SESSION['carrinho'][$_POST['index']]);
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reorganiza índices
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}
header {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
}
header a {
    color: #fff;
    text-decoration: none;
    margin-left: 20px;
}
.produtos {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}
.produto {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px;
    background: #fff;
    width: 250px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.produto img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}
.produto h2 {
    font-size: 18px;
    margin-bottom: 10px;
}
.produto p {
    font-size: 16px;
    margin-bottom: 10px;
}
button {
   
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #218838;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
}
table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}
table th {
    background-color: #333;
    color: white;
}

header h1 {
    text-align:center;
    margin: 70;
    width: 89%;
}


    </style>
</head>
<body>
    <header>
    <button><a href="index.php"><h3>Voltar à Loja</h3></a></button>
    
        <h1>Seu Carrinho</h1>
    </header>
    <main>
        <?php if (!empty($_SESSION['carrinho'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrinho'] as $index => $item): ?>
                        <tr>
                            <td><img src="<?= $item['imagem'] ?>" alt="<?= $item['nome'] ?>" width="80"></td>
                            <td><?= $item['nome'] ?></td>
                            <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit" name="">Comprar</button>
                                    <button type="submit" name="remover">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="">Comprar todos </button>
        <?php else: ?>
            <p>Seu carrinho está vazio.</p>
        <?php endif; ?>
    </main>
    <footer>
    <div class="footer-content">
        <p>&copy; <?= date("Y"); ?> Nossa loja de Jogos ou para os mais próximos GuRi.<p>
        <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="carrinho.php">Carrinho</a></li>
            <li><a href="sobre.php">Sobre Nós</a></li>
            <li><a href="contato.php">Contato</a></li>  
          
            
        </ul>
        <h4>Veja nossas redes sociais</h4>
        <div class="footer-socials">
            <a href="https://facebook.com" target="_blank">Facebook</a> |
            <a href="https://twitter.com" target="_blank">Twitter</a> |
            <a href="https://instagram.com" target="_blank">Instagram</a>
        </div>
    </div>
</footer>
</body>
</html>
    
