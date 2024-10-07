<?php
// Configurações do banco de dados
include("../../Assets/db/conexao.php");
include('../../header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arquivo = $_FILES['nomearquivo'];
    $tipoArquivo = $arquivo['type'];

    // Definir diretórios de upload
    if (strpos($tipoArquivo, 'image/') === 0) {
        $uploadDir = '../galeria/uploadsFotos/';
        $tabela = 'fotos';
    } elseif (strpos($tipoArquivo, 'video/') === 0) {
        $uploadDir = '../galeria/uploadsVideos/';
        $tabela = 'videos';
    } elseif (strpos($tipoArquivo, 'audio/') === 0) {
        $uploadDir = '../galeria/uploadsAudios/';
        $tabela = 'audios';
    } else {
        // Tipo de arquivo não suportado
        header("Location: galeria.php?message=Tipo de arquivo não suportado.");
        exit();
    }

    // Gera um nome único para o arquivo
    $nomeArquivo = uniqid() . '-' . basename($arquivo['name']);
    $caminhoArquivo = $uploadDir . $nomeArquivo;

    // Verifica se o arquivo foi enviado
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo)) {
        // Prepara e executa a consulta SQL para inserir os dados
        $smt = $conexao->prepare("INSERT INTO   $tabela(nomearquivo, caminho, tipo, tamanho) VALUES(?, ?, ?, ?)");
        $smt->execute([$nomeArquivo, $caminhoArquivo, $tipoArquivo, $arquivo['size']]);

        // Redirecionar para a página de cadastro com uma mensagem de sucesso
        $ID = $conexao->lastInsertId();
        header("Location: galeria.php?id=$ID&message=Arquivo incluído com sucesso!");
        exit();
    } else {
        // Redireciona para a página de cadastro com uma mensagem de erro
        header("Location: galeria.php?message=Erro ao fazer upload do arquivo.");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/styles.css">
    <title>Projeto IPBJac</title>
</head>

<body>
    <section id="transferencia" class="d-flex align-items-center justify-content-center">
        <div class="content text-center">
            <form method="POST" enctype="multipart/form-data">
                <div class="row justify-content-md-center">
                    <div class="arquivo col col-lg-8">
                        <label for="nomearquivo" class="form-label">Arquivo :</label>
                        <input type="file" class="form-control" id="nomearquivo" name="nomearquivo"
                            accept="image/*,video/*,audio/*" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">Gravar Registro</button>
                        <a href="galeria.php" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>