<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
include 'menu.php';
include 'conexao.php';
include 'Modelo\Produto.php';
include 'Repositorio\ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);
$almocos = $produtosRepositorio->listarAlmocos();

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>The Alres - Cardápio</title>
</head>

<body>
    <main>
            <div>
                <img src="img/food.png" class="container-banner" alt="logo">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>

            </div>
            <div class="container-almoco-produtos">
                <?php
                foreach ($almocos as $almoco) : ?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $almoco->getImagem() ?>">
                        </div>
                        <p><?= $almoco->getNome() ?></p>
                        <p><?= $almoco->getDescricao() ?></p>
                        <p><?= "R$ " . number_format($almoco->getPreco(), 2) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </section>
    </main>
</body>

</html>