<?php
include("../../Assets/db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>IPBJAC</title>

</head>

<body>
    <div class="navbar_menu">
        <img src="..\Assets\images\aeronaves\logo.png" alt="Logo ">
    </div>
    <div class="etiqueta">
        <h1>Controle da Galeria de Fotos e Videos</h1>
    </div>

    <div class="container">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-sharp fa-solid fa-photo-film"></i>
                        <h5 class="card-title">Incluir Midia</h5>
                        <!-- <p class="card-text">Incluir registro.</p> -->
                        <a href="../Galeria/incluir.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-folder-open"></i>
                        <h5 class="card-title">Consultar Imagens</h5>
                        <!-- <p class="card-text">Atualizar registro.</p> -->
                        <a href="../Galeria/list.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-trash"></i>
                        <h5 class="card-title">Excluir Imagem</h5>
                        <!-- <p class="card-text">Consulta registros.</p> -->
                        <a href="../Galeria/delete.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="../../index.php" class="btn btn-secondary">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-..." crossorigin="anonymous"></script>

</body>

</html>