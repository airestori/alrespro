<?php
require "conexao.php";
require "Modelo\Produto.php";
require "Repositorio\ProdutoRepositorio.php";

//if (isset($_POST['cadastro'])){ ou
if ($_SERVER["REQUEST_METHOD"]=="POST"){
   $imagem = 'img/'. $_POST["imagem"];

    $produto = new Produto(null,
        $_POST["tipo"],
        $_POST["nome"],
        $_POST["descricao"],
        $imagem,
        $_POST["preco"],
    );

    $produtoRepositorio = new ProdutoRepositorio($conn);
    if ($produtoRepositorio->cadastrar($produto)){
        header("Location: cadastrar-produtos-sucesso.php");
    }else{
        header("Location: cadastrar-produtos.php?erro=1");
    }
    
}









?>