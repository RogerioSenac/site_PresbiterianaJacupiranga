<?php
include("../../Assets/db/conexao.php");

// Número de registros por página
$limit = 10;

// Obtenha o número da página atual a partir da URL ou defina como 1 se não tiver definido
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calcule o offset
$offset = ($page - 1) * $limit;

// Conta o total de arquivos na galeria
$totalStmt = $pdo->query("SELECT COUNT(*) as total FROM galeria");
$total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($total / $limit);

// Busca os arquivos da galeria
$stmt = $pdo->prepare("SELECT * FROM galeria LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

// Exibir os registros de arquivos
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = $_POST["nomeArquivo"];
    
    $novoArquivo = $pdo->prepare("INSERT INTO galeria (filename) VALUES (?)");
    $novoArquivo->execute([$fileName]);
    
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Mídia</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Imagens e Vídeos</h1>
        <?php if ($files): ?>
            <ul>
                <?php foreach ($files as $file): ?>
                    <li>
                        <?= htmlspecialchars($file['filename']) ?> 
                        <?php
                        // Verifica a extensão do arquivo para determinar o tipo de exibição
                        $ext = pathinfo($file['filename'], PATHINFO_EXTENSION);
                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                            <img src="uploads/<?= htmlspecialchars($file['filename']) ?>" alt="Imagem" style="max-width: 200px; max-height: 200px;">
                        <?php elseif (in_array($ext, ['mp4', 'webm', 'ogg'])): ?>
                            <video controls style="max-width: 200px; max-height: 200px;">
                                <source src="uploads/<?= htmlspecialchars($file['filename']) ?>" type="video/<?= $ext ?>">
                                Seu navegador não suporta o elemento de vídeo.
                            </video>
                        <?php else: ?>
                            <p>Arquivo não suportado.</p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">Anterior</a>
                <?php endif; ?>

                <span>Página <?= $page ?> de <?= $totalPages ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>">Próximo</a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Nenhum arquivo encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
