<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presbiteriana Jacupiranga</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS (para ícones) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="Assets/css/styles.css">
    <!-- <style>
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
        }

        .card-body-1,
        .card-body-2 {
            padding: 10px; /* Padding de 10px */
            text-align: left; /* Alinhamento à esquerda */
        }

        /* .card-body-3 {
            padding: 10px; /* Padding de 10px */
            /*text-align: right; /* Alinhamento à direita */
        } */

        .card-group {
            display: flex;
            justify-content: space-between; /* Espaço entre os cards */
        }

        .card {
            flex: 1; /* Cada card ocupa a mesma largura */
            margin: 0 10px; /* Margem horizontal para espaçamento */
        }
    </style> -->
</head>

<body>
    <!-- Rodapé -->
    <footer>
        <div class="card-group">
            <div class="card">
                <div class="card-body-1">
                    <h3>Venha nos visitar.</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Rua Vinte e Três de Junho, 262 - Vila Elias, Jacupiranga, SP</li>
                        <li><i class="fas fa-envelope"></i> dioceliooa@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body-2">
                    <h3>Siga-nos nas redes sociais</h3>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/IPBJacupiranga" class="facebook" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="https://www.instagram.com/ipbjacupiranga?igsh=OXVpZTFka3hkZnY5" class="instagram" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.youtube.com/@IpbJacupiranga" class="youtube" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
                        <a href="https://www.whatsapp.com" class="whatsapp" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a>
                        <a href="mailto:dioceliooa@gmail.com" class="email" target="_blank"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body-3">
                    <h3>Encontre-nos no Mapa</h3>
                    <div id="map" style="color:white; height: 250px; width: 100%;"></div>
                    <button id="tracarRota" class="btn btn-info mt-3">Traçar Rota</button>
                </div>
            </div> -->
        </div>
    </footer>

    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- JS Personalizado -->
    <script src="Assets/js/main.js"></script>

    <!-- Leaflet.js (Mapas) -->
    <!-- <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Inicializar o mapa
        var map = L.map('map').setView([-24.700397865367883, -48.003950472843286], 13);

        // Adicionar a camada de mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Adicionar marcador
        L.marker([-24.700397865367883, -48.003950472843286]).addTo(map)
            .bindPopup('Igreja Presbiteriana do Brasil - Jacupiranga<br>Av. 23 de Junho, 262 - Vila Elias, Jacupiranga - SP')
            .openPopup();

        // Função para traçar a rota no Google Maps
        document.getElementById('tracarRota').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;
                    var destination = "-24.700397865367883, -48.003950472843286"; // Coordenadas da igreja
                    var url = `https://www.google.com/maps/dir/?api=1&origin=${lat},${lon}&destination=${destination}&travelmode=driving`;
                    window.open(url, '_blank');
                }, function() {
                    alert("Não foi possível acessar a localização. Verifique suas permissões de geolocalização.");
                });
            } else {
                alert("Geolocalização não é suportada pelo seu navegador.");
            }
        });
    </script> -->
</body>

</html>
