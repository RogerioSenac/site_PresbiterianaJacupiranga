<?php
include("../../Assets/db/conexao.php");

// Verifica se o ID do arquivo foi passado
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Busca o arquivo na base de dados
    $stmt = $pdo->prepare("SELECT filename FROM galeria WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($file) {
        // Define o caminho do arquivo
        $filePath = 'uploads/' . $file['filename'];

        // Deleta o arquivo do sistema de arquivos
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Deleta o registro do banco de dados
        $stmt = $pdo->prepare("DELETE FROM galeria WHERE id = :id");
        $stmt->execute(['id' => $id]);

        echo "Arquivo deletado com sucesso.";
    } else {
        echo "Arquivo não encontrado.";
    }
} else {
    echo "ID do arquivo não especificado.";
}

// Redireciona de volta para a página principal
header('Location: index.php');
exit;
?>
