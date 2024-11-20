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
    <title>Detalhes do Produto</title>
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
            text-align: center;
            padding: 20px 0;
        }
        main {
            padding: 40px;
            display: flex;
            justify-content: flex-start;
        }
        .produto-detalhe {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 40px;
            width: 100%; /* Expande para o máximo possível */
            display: flex;
            align-items: flex-start;
            gap: 40px;
            box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.15);
        }
        .produto-detalhe img {
            max-width: 400px;
            height: auto;
            border-radius: 10px;
        }

        .produto-detalhe .informacao {
            font-size: 17px;
        }

        .produto-detalhe .detalhes {
            flex: 1; /* Permite que os textos ocupem o restante do espaço */
            text-align: left;
        }
        .produto-detalhe h2 {
            font-size: 42px;
            color: #333;
        }
        .produto-detalhe p {
            font-size: 22px;
            color: #666;
        }
        .produto-detalhe .preco {
            font-size: 28px;
            font-weight: bold;
            color: #28a745;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<header>
        <h1 class="header-h1">Loja de Produtos</h1>
        <div class="nav-list">
            <ul class="nav-item">
                <li class="nav-item"><a href="index.php" class="nav-link">Jogos</a></li>
                <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho</a></li>
            </ul>
        </div>
    </header>
    <main>
        <?php
 
        // Lista de produtos
        $produtos = [
            "Batman: Arkham Knight" => ["preco" => 79.20, "imagem" => "img/batman.png", "info" => "Em Batman Arkham Knight, sendo o último jogo da franquia a empresa decide inovar com uma jogabilidade sandbox inovadora, em um mapa aberto e com a opção de utilizar o Batmóvel e outros veículos por toda a Gotham City. Na nova aventura Batman se arrisca para salvar a cidade que tanto lutou para defender, confrontando o Espantalho e sua horda de criminosos. O jogo agora possui muito mais maneiras de derrotar os inimigos, sejam elas por atropelamento, combate corpo a corpo ou a distância. O jogo implementou vários movimentos corporais novos, dando mais vida ao ´´Morcegão´´ e dando mais naturalidade aos seus movimentos. O jogo também teve seu modo stealth reformulado, oque faz com que na escuridão, Batman se torna praticamente indetectável."],

            "Outlast: Trinity" => ["preco" => 178.20, "imagem" => "img/outlast.png", "info" => "Outlast Trinity, é uma coletânea que contará com Outlast, o primeiro jogo da série, Outlast: Whistleblower, um spin-off que conta os eventos que aconteceram antes do game original, e o novo Outlast 2. Ou seja, muito terror em um só game. Outlast é um jogo de terror em primeira pessoa, onde você deve fugir de todos os perigos e procurar recursos, principalmente baterias para sua câmera, para tentar escapar.Outlast 2 a sequência de Outlast e Outlast: Whistleblower, traz gráficos realistas e texturas surpreendentes, além de continuar com aquela trilha sonora que já traz medo só de lembrar. O jogo se passa em um misterioso vilarejo, repleto de sombras, vultos e “monstros”."],

            "Lego: Vingadores" => ["preco" => 71.03, "imagem" => "img/lego.png", "info" => "Avante, Vingadores. A franquia campeã de vendas Lego Marvel volta com uma nova aventura de super-heróis repleta de ação. Junte-se aos Lego Marvel Avengers e vivencie o primeiro jogo com personagens e histórias do filme da Marvel - aclamado pela crítica - Os Vingadores, a sequência de sucesso Vingadores: Era de Ultron e mais. Desenvolvido pela TT Games, para Playstation 4, jogue na pele dos mais poderosos super-heróis em sua jornada para salvar o mundo. Com um elenco diversificado, com personagens dos Vingadores da Marvel, jogue e desbloqueie mais de 100 personagens novos e conhecidos com uma variedade de habilidades, incluindo prediletos dos fãs como Hulk, Homem de Ferro, Capitão América e Thor e mais. Novos e melhores poderes e habilidades, novas maneiras de lutar com poderes e habilidades aprimorados dos personagens. Junte-se aos Vingadores para executar combos incríveis. Jogabilidade com movimentação livre, divirta-se com a abordagem única do mundo aberto de Lego Avengers enquanto assume o papel dos heróis mais poderosos da Terra para coletar blocos de ouro, botões e desbloquear personagens adicionais. Visite locais icônicos do universo cinemático da Marvel espalhados pelo mundo. Vivencie o melhor da ação dos filmes dos Vingadores, relembre os principais momentos dos Vingadores, Vingadores: Era de Ultron e mais, com uma pitada do clássico humor do Lego."],

            "Tony Hawk pro Skater 1+2" => ["preco" => 218.40, "imagem" => "img/tony.png", "info" => "Rompa os limites do skate, mostre seu próprio estilo e faça parte da próxima geração de skatistas e criadores com Tony Hawk´s Pro Skater 1+2 Patine como o lendário Tony Hawk e a lista Pro original, além de novos profissionais Faça combos de truques insanos com o manuseio icônico da série de skatistas Tony Hawk´s Pro Jogue todos os modos de jogo originais e enfrente os modos locais de 2 jogadores Todos os skatistas profissionais, níveis e truques estão de volta e totalmente remasterizados, e muito mais."],

            "Minecraft" => ["preco" => 175.00, "imagem" => "img/minecraft.png", "info" => "Minecraft é um título que conta com uma proposta peculiar. Aqui, o jogador encontra um mundo 3D em estilo pixelizado, dando a impressão de que estamos vivendo dentro de um clássico da era 8-bits. O principal objetivo do jogo é simplesmente construir. Você conta com uma série de ferramentas diferentes, que podem ser utilizadas tanto para coletar materiais quanto como armas. Ao coletar os blocos, o jogador tem a chance de utilizar seus recursos para construir o que bem entender. Entretanto, há uma construção essencial em Minecraft: sua casa."],

            "Assasin's Creed 4: Black Flag" => ["preco" => 129.90, "imagem" => "img/assasin.png", "info" => "Assassin’s Creed IV Black Flag - PlayStation 4 · Em 1715, quando os piratas estabeleceram uma república sem lei no Caribe e governaram a terra e os mares. · Esses bandidos paralisaram as marinhas, interromperam o comércio internacional e saquearam vastas fortunas. · Eles ameaçaram as estruturas de poder que governaram a Europa, inspiraram a imaginação de milhões e deixaram seu legado. · Entre esses bandidos está um jovem capitão chamado Edward Kenway, onde suas façanhas o levam a uma guerra ao possível fim dos piratas. · Vivendo num mundo aberto com vastas localizações para explorar, o jogo tem três cidades principais: Havana, Kingston e Nassau. · O combate do Black Flag foi atualizado para incluir o direcionamento livre, onde os jogadores são capazes de mirar e atirar, similarmente aos atiradores de terceira pessoa. · Vivencie toda a guerra entre ingleses e espanhóis, descobrindo tudo o que acontece entre os Assassinos e os Templários nesta aventura da pele de Edward Kenway."],

            "Assasin's Creed: Unity" => ["preco" => 84.47, "imagem" => "img/assasinu.png", "info" => "Em Assassin's Creed: Unity, experimente a Revolução Francesa como nunca antes e ajude a mudar completamente o destino do povo da França. · Enquanto a nação é destruída, você controla um jovem chamado Arno, que embarca em uma jornada extraordinária para expor os reais poderes por trás da Revolução. · Lute no meio de uma batalha cruel pelo destino de uma nação e se transforme em um verdadeiro mestre Assassino. · A sua jogabilidade furtiva foi melhorada, incluindo um novo modo de invisibilidade, sistema de cobertura e técnicas de manipulação de multidões, que permite que você fique oculto, persiga a sua presa e ataque sem aviso. · Um sistema de combate reinventado proporciona uma experiência mais autêntica durante suas batalhas, baseada em habilidade, tempo e fluxo."],

        ];

        // Obtém o produto da URL
        $nomeProduto = $_GET['produto'] ?? null;

        // Verifica se o produto existe
        if ($nomeProduto && isset($produtos[$nomeProduto])) {
            $produto = $produtos[$nomeProduto];
            echo "
            <div class='produto-detalhe'>
                <img src='{$produto['imagem']}' alt='{$nomeProduto}'>
                <div class='detalhes'>
                    <h2>{$nomeProduto}</h2>
                    <p class='informacao'>{$produto['info']}</p>
                    <p class='preco'>R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>
                    <button class='addcart' type='submit' name='adicionar'>Adicionar ao Carrinho</button>

                </div>
            </div>
            ";
        } else {
            echo "<p>Produto não encontrado.</p>";
        }
        ?>
    </main>
</body>
</html>
