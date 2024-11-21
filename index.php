<?php
session_start();

// Inicializa o carrinho na sessão
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adiciona o produto ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $produto = [
        "nome" => $_POST['nome'],
        "preco" => $_POST['preco'],
        "imagem" => $_POST['imagem']
    ];
    $_SESSION['carrinho'][] = $produto;
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="nav-list">
            <ul class="nav-item">
            <img src="img/logo.png" style="height: 170px;" />
                <li class="nav-item"><a href="index.php" class="nav-link"><h2>Jogos</h2></a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link"><h2>Carrinho</h2>  </a></li>
            </ul>
        </div>
    </header>

    <main>
        <section class="produtos">
            <?php
            // Array de produtos
            $produtos = [
                [
                    "nome" => "Batman: Arkham Knight",
                    "preco" => 79.20,
                    "imagem" => "img/batman.png",
                ],
                [
                    "nome" => "Outlast: Trinity",
                    "preco" => 178.20,
                    "imagem" => "img/outlast.png",
                ],
                [
                    "nome" => "Lego: Vingadores",
                    "preco" => 71.03,
                    "imagem" => "img/lego.png",
                ],
                [
                    "nome" => "Tony Hawk pro Skater 1+2",
                    "preco" => 218.40,
                    "imagem" => "img/tony.png",
                ],
                [
                    "nome" => "Minecraft",
                    "preco" => 175.00,
                    "imagem" => "img/minecraft.png",
                ],
                [
                    "nome" => "Assasin's Creed 4: Black Flag",
                    "preco" => 129.90,
                    "imagem" => "img/assasin.png",
                ],
                [
                    "nome" => "Assasin's Creed: Unity",
                    "preco" => 84.47,
                    "imagem" => "img/assasinu.png",
                ],
                [
                    "nome" => "FIFA 23",
                    "preco" => 249.90,
                    "imagem" => "img/fifa23.png",
                ],
                [
                    "nome" => "The Witcher 3: Wild Hunt",
                    "preco" => 59.99,
                    "imagem" => "img/witcher3.jpg",
                ],
                [
                    "nome" => "Cyberpunk 2077",
                    "preco" => 199.90,
                    "imagem" => "img/cyberpunk2077.jpg",
                ],
                [
                    "nome" => "Elden Ring",
                    "preco" => 299.90,
                    "imagem" => "img/eldenring.jpg",
                ],
                [
                    "nome" => "GTA V",
                    "preco" => 89.90,
                    "imagem" => "img/gtav.webp",
                ],
                [
                    "nome" => "Red Dead Redemption 2",
                    "preco" => 249.90,
                    "imagem" => "img/rdr2.jpg",
                ],
                [
                    "nome" => "Resident Evil 4 Remake",
                    "preco" => 289.90,
                    "imagem" => "img/re4remake.jpg",
                ],
                [
                    "nome" => "Hogwarts Legacy",
                    "preco" => 319.90,
                    "imagem" => "img/hogwartslegacy.webp",
                ],
                [
                    "nome" => "God of War: Ragnarok",
                    "preco" => 349.90,
                    "imagem" => "img/godofwarragnarok.jpg",
                ],
                [
                    "nome" => "Dark Souls III",
                    "preco" => 99.90,
                    "imagem" => "img/darksouls3.jpg",
                ],
                [
                    "nome" => "Far Cry 6",
                    "preco" => 229.90,
                    "imagem" => "img/farcry6.webp",
                ],
                [
                    "nome" => "Horizon Forbidden West",
                    "preco" => 299.90,
                    "imagem" => "img/horizonfw.webp",
                ],
                [
                    "nome" => "Call of Duty: Modern Warfare II",
                    "preco" => 319.90,
                    "imagem" => "img/codmw2.webp",
                ],
            ];

            // Exibe os produtos dinamicamente
            foreach ($produtos as $produto) {
                $nomeProduto = urlencode($produto['nome']); // Codifica o nome do produto para ser usado na URL
                echo "
                <div class='produto'>
                    <img src='{$produto['imagem']}' alt='{$produto['nome']}'>
                    <h2>{$produto['nome']}</h2>
                    <p>R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>
                    <button onclick=\"window.location.href='detalhes.php?produto={$nomeProduto}'\">Ver mais</button>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='nome' value='{$produto['nome']}'>
                        <input type='hidden' name='preco' value='{$produto['preco']}'>
                        <input type='hidden' name='imagem' value='{$produto['imagem']}'>
                        <button class='addcart' type='submit' name='adicionar'>Adicionar ao Carrinho</button>
                    </form>
                </div>
                ";
            }
            ?>
        </section>
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
