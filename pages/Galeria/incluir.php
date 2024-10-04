<?php
include("../../Assets/db/conexao.php");
require_once ('../../header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foto = $_FILES['fotoAluno']; // Use $_FILES para o upload de arquivos

}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upload de Fotos e Vídeos</title>
</head>
<body>
    <div class="container">
        <h1>Upload de Fotos e Vídeos</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="files[]" accept="image/*,video/*" multiple required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
