<?php
include("../../Assets/db/conexao.php");

// Número de registros por página
$limit = 10;

// Obtenha o número da página atual a partir da URL ou defina como 1 se não tiver definido
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calcule o offset
$offset = ($page - 1) * $limit;

// Conta o total de arquivos de áudio na galeria
$totalStmt = $conexao->query("SELECT COUNT(*) as total FROM audios");
$total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($total / $limit);

// Busca os arquivos de áudio na galeria
$stmt = $conexao->prepare("SELECT * FROM audios LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

// Exibir os registros de arquivos
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Áudios</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Áudios</h1>
        <?php if ($files): ?>
            <ul>
                <?php foreach ($files as $file): ?>
                    <li>
                        <!-- <?= htmlspecialchars($file['nomearquivo']) ?> -->
                        <audio controls>
                            <source src="../Galeria/uploadsAudios/<?= htmlspecialchars($file['nomearquivo']) ?>" type="<?= htmlspecialchars($file['tipo']) ?>">
                            Seu navegador não suporta o elemento de áudio.
                        </audio>
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
