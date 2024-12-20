<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('./Assets/db/conexao.php');
include('header.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presbiteriana do Brasil - Jacupiranga</title>
    <!-- Ícone Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="./Assets/css/styles.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>


    <main>
        <!-- Seção 1: Foto Impactante -->
        <section id="foto-impactante" class="d-flex align-items-center justify-content-center">
            <div class="overlay"></div>
            <div class="content text-center">
                <h1 class="text-white">Bem-vindo à Igreja Presbiteriana do Brasil - Jacupiranga</h1>
                <!-- <a href="#culto-online" class="btn btn-primary">Acessar Site</a> -->
            </div>
        </section>

        <!-- Seção 2: Culto Online -->
        <section id="culto-online" class="d-flex align-items-center justify-content-center">
            <div class="content text-center">
                <h2>IPB Multi - Cultos e Radio</h2>
                <a href="https://multi.ipb.org.br" class="btn btn-success" target="_blank">IPB Midias</a>
            </div>
        </section>

        <!-- Seção 3: Ministérios -->
        <section id="ministerios" class="d-flex flex-column align-items-center justify-content-center">
            <!-- <h2 class="text-center mb-4">Ministérios</h2> -->
            <div class="container card-container">
                <div class="row justify-content-center">
                    <!-- Card 1: Ministério de Casais -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <img src="assets/img/ministerios/casais.jpg" class="card-img-top"
                                alt="Imagem do Ministério de Casais">
                            <div class="card-body">
                                <h5 class="card-title">Ministério de Casais</h5>
                                <a href="pages/casais/home_casais.php" class="btn btn-primary">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Ministério da Família -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <img src="assets/img/ministerios/familia.jpg" class="card-img-top"
                                alt="Imagem do Ministério da Família">
                            <div class="card-body">
                                <h5 class="card-title">Ministério da Família</h5>
                                <a href="pages/familia/home_familia.php" class="btn btn-primary">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3: Ministério Infantil -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <img src="assets/img/ministerios/infantil.jpg" class="card-img-top"
                                alt="Imagem do Ministério Infantil">
                            <div class="card-body">
                                <h5 class="card-title">Ministério Infantil</h5>
                                <a href="pages/infantil/home_infantil.php" class="btn btn-primary">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4: Ministério dos Jovens e Adolescentes -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card">
                            <img src="assets/img/ministerios/jovens.jpg" class="card-img-top"
                                alt="Imagem do Ministério dos Jovens e Adolescentes">
                            <div class="card-body">
                                <h5 class="card-title">Ministério dos Jovens</h5>
                                <a href="pages/jovens/home_jovens.php" class="btn btn-primary">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Seção 4: Contato e Depoimentos -->
        <section id="contato" class="d-flex flex-column align-items-center">
            <div class="container">
                <div class="row">
                    <!-- Card de Depoimentos -->
                    <div class="col-md-6">
                        <h4>Depoimentos Recentes</h4>
                        <div class="list-group">
                            <?php
                            // Conexão com o banco de dados
                            include 'Assets/db/conexao.php';

                            // Consulta para buscar todos os depoimentos
                            $query = "SELECT usuarios.nome, usuarios.fotoUsuario, depoimentos.data_inclusao, depoimentos.depoimento 
                              FROM depoimentos 
                              INNER JOIN usuarios ON depoimentos.id = usuarios.id 
                              ORDER BY data_inclusao DESC LIMIT 3";
                            $result = $conexao->query($query);

                            // Verifica se há depoimentos retornados
                            if ($result && $result->rowCount() > 0) {
                                // Loop para exibir cada depoimento
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    // Caminho da foto
                                    $foto = !empty($row['foto']) ? htmlspecialchars($row['foto']) : 'Assets/img/default-user.png';
                                    echo '<div class="depoimento-item d-flex align-items-start">';
                                    echo '<img src="' . $foto . '" alt="Foto de ' . htmlspecialchars($row['nome']) . '" class="user-photo">';
                                    echo '<div class="depoimento-content">';
                                    echo '<h5 class="h5_depoimento">' . htmlspecialchars($row['nome']) . '</h5>';
                                    echo '<p class="depoimento-date">Data de Inclusão: ' . date('d/m/Y', strtotime($row['data_inclusao'])) . '</p>';
                                    echo '<p class="p_depoimento">' . htmlspecialchars($row['depoimento']) . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>Nenhum depoimento encontrado.</p>';
                            }

                            // Fechar conexão
                            $pdo = null;
                            ?>
                        </div>
                    </div>
        </section>
        <!-- Seção 5: Mapa-->
        <section id="mapa" class="d-flex flex-column align-items-center">
            <div class="content text-center">
                <!-- Card com Mapa de Geolocalização -->
                <h4>Encontre-nos no Mapa</h4>
                <div id="map" style="height: 250px; width: 100%;"></div>
                <div class="card bg-transparent border-light">
                    <div class="card-mapa">
                        <button id="tracarRota" class="btn btn-dark">Traçar Rota</button>
                    </div>
                </div>
        </section>
      
        <?php include 'footer.php'; ?>
    </main>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para rolagem suave -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const target = document.querySelector(link.getAttribute('href'));
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
    </script>

    <!-- Leaflet.js (Mapas) -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
    // Inicializar o mapa
    var map = L.map('map').setView([-24.700397865367883, -48.003950472843286], 13);

    // Adicionar a camada de mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Adicionar marcador
    L.marker([-24.700397865367883, -48.003950472843286]).addTo(map)
        .bindPopup(
            'Igreja Presbiteriana do Brasil - Jacupiranga<br>Av. 23 de Junho, 262 - Vila Elias, Jacupiranga - SP')
        .openPopup();

    // Função para traçar a rota no Google Maps
    document.getElementById('tracarRota').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                var destination = "-24.700397865367883, -48.003950472843286"; // Coordenadas da igreja
                var url =
                    `https://www.google.com/maps/dir/?api=1&origin=${lat},${lon}&destination=${destination}&travelmode=driving`;
                window.open(url, '_blank');
            }, function() {
                alert(
                    "Não foi possível acessar a localização. Verifique suas permissões de geolocalização.");
            });
        } else {
            alert("Geolocalização não é suportada pelo seu navegador.");
        }
    });
    </script>

</html>