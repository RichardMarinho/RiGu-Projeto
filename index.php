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
                <li class="nav-item"><a href="index.php" class="nav-link">Jogos</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho</a></li>
            </ul>
        </div>
        <div class="login-button">
                <button><a href="cadastro.php">Login</a></button>
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
                </div>
                ";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date("Y"); ?> Loja de Produtos</p>
    </footer>
</body>
</html>
