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
        <h1>Loja de Produtos</h1>
    </header>

    <main>
        <section class="produtos">
            <?php
            // Array de produtos
            $produtos = [
                [
                    "nome" => "Kingdom Come Deliverance",
                    "preco" => 129.00,
                    "imagem" => "img/kingdomome.jpg",
                ],
                [
                    "nome" => "Produto 2",
                    "preco" => 79.90,
                    "imagem" => "img/resident.png",
                ],
                [
                    "nome" => "Produto 3",
                    "preco" => 99.90,
                    "imagem" => "img/eldenring.png",
                ],
                [
                    "nome" => "Produto 3",
                    "preco" => 99.90,
                    "imagem" => "img/nba.png",
                ],
                [
                    "nome" => "Produto 3",
                    "preco" => 99.90,
                    "imagem" => "img/spiderman.png",
                ],
            ];

            // Exibe os produtos dinamicamente
            foreach ($produtos as $produto) {
                echo "
                <div class='produto'>
                    <img src='{$produto['imagem']}' alt='{$produto['nome']}'>
                    <h2>{$produto['nome']}</h2>
                    <p>R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>
                    <button>Comprar</button>
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
