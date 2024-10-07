<?php
include("../../Assets/db/conexao.php");

// Número de registros por página
$limit = 10;

// Obtenha o número da página atual a partir da URL ou defina como 1 se não tiver definido
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calcule o offset
$offset = ($page - 1) * $limit;

// Conta o total de arquivos de vídeo na galeria
$totalStmt = $conexao->query("SELECT COUNT(*) as total FROM videos");
$total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($total / $limit);

// Busca os arquivos de vídeo na galeria
$stmt = $conexao->prepare("SELECT * FROM videos LIMIT :limit OFFSET :offset");
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
    <title>Lista de Vídeos</title>
    <style>
        /* Estilo do modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }
        .modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 80%;
            max-width: 300px;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 25px;
            color: white;
            font-size: 35px;
            font-weight: bold;
        }
        video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Vídeos</h1>
        <?php if ($files): ?>
            <ul>
                <?php foreach ($files as $file): ?>
                    <li>
                        <?= htmlspecialchars($file['nomearquivo']) ?>
                        <video controls style="max-width: 200px;" onclick="openModal('<?= htmlspecialchars($file['nomearquivo']) ?>', '<?= htmlspecialchars($file['tipo']) ?>')">
                            <source src="../Galeria/uploadsVideos/<?= htmlspecialchars($file['nomearquivo']) ?>" type="<?= htmlspecialchars($file['tipo']) ?>">
                            Seu navegador não suporta o elemento de vídeo.
                        </video>
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

    <!-- Modal -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            <video id="modalVideo" controls>
                <source id="modalSource" src="" type="">
                Seu navegador não suporta o elemento de vídeo.
            </video>
        </div>
    </div>

    <script>
        function openModal(videoFile, videoType) {
            document.getElementById('modalVideo').style.display = 'block';
            document.getElementById('modalSource').src = '../Galeria/uploadsVideos/' + videoFile;
            document.getElementById('modalSource').type = videoType;
            document.getElementById('modalVideo').load();
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
            document.getElementById('modalVideo').pause();
        }
    </script>
</body>
</html>
