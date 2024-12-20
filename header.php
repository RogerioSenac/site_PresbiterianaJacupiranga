<?php
$rooturl = '/Projetos%20Git/site_PresbiterianaJacupiranga/';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'Assets/db/conexao.php';

// // Defina o caminho base dinamicamente, subindo quantas pastas forem necessárias
// $base_url = ($_SERVER['REQUEST_URI'] == '/') ? '' : '/';

// Verificar se o usuário está logado
$usuario = null;

if (isset($_SESSION['usuario_id'])) {
    // $stmt = $pdo->conexao("SELECT nome, foto FROM usuarios WHERE id = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php'); // Redireciona para a página de login após o logout
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Igreja Presbiteriana do Brasil - Jacupiranga</title>
    <!-- Ícone Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" type='text/css' href="<?php echo $rooturl; ?>assets/css/styles.css">    
</head>

<body>    
    <!-- Cabeçalho e Navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid nav_bar">
            <a class="navbar-brand" href="index.php">
                <img src="./Assets/img/logoTipos/Igreja.png" alt="Logotipo" class="img-fluid" style="max-height: 100px;">                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'); ?>" href="../../index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'sobre.php') echo 'active'; ?>" href="./pages/sobre.php">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'pages/Eventos/eventos.php') echo 'active'; ?>" href="pages/eventos/eventos.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'pages/Galeria') echo 'active'; ?>" href="pages/Galeria">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'recursos.php') echo 'active'; ?>" href="./pages/Recursos/recursos.php">Recursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'contato.php') echo 'active'; ?>" href="contato.php">Contato</a>
                    </li>
                </ul>
                <?php if (isset($usuario)): ?>
                    <div class="user-info ms-3 d-flex align-items-center">
                        <img src="<?php echo !empty($usuario['foto']) ? htmlspecialchars($usuario['foto']) : 'https://via.placeholder.com/40'; ?>" alt="Foto de Perfil" class="rounded-circle" style="width: 40px; height: 40px;">
                        <div class="dropdown ms-2">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($usuario['nome']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="?logout=1">Sair <i class="fas fa-sign-out-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

