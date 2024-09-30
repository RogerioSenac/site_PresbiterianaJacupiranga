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
    <style>
        footer {
            background-color: #f8f9fa;
            /* Cor de fundo do rodapé */
            padding: 20px 0;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Rodapé -->
    <footer>
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <!-- Venha nos visitar -->
                <!-- <div class="col-lg-4">
                    <h4>Venha nos visitar</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Rua Vinte e Três de Junho, 262 - Vila Elias, Jacupiranga, SP</li>
                        <li><i class="fas fa-envelope"></i> dioceliooa@gmail.com</li>
                    </ul>
                </div> -->

                <!-- Siga-nos nas redes sociais -->
                <!-- <div class="col-lg-4">
                    <h5>Siga-nos nas redes sociais</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/IPBJacupiranga" class="facebook" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="https://www.instagram.com/ipbjacupiranga?igsh=OXVpZTFka3hkZnY5" class="instagram" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.youtube.com/@IpbJacupiranga" class="youtube" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
                        <a href="https://www.whatsapp.com" class="whatsapp" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a>
                    </div>
                </div> -->

                <!-- Encontre-nos no Mapa -->
                <!-- <div class="col-lg-4">
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h4>Encontre-nos no Mapa</h4>
                            <div id="map" style="color:white; height: 250px; width: 100%;"></div>
                            <button id="tracarRota" class="btn btn-info mt-3">Traçar Rota</button>
                        </div>
                    </div>
                </div> -->
            <!-- </div> -->
        <!-- </div> -->

        <div class="card-group">
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h4>Venha nos visitar</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Rua Vinte e Três de Junho, 262 - Vila Elias, Jacupiranga, SP</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">
                        <li><i class="fas fa-envelope"></i> dioceliooa@gmail.com</li>
                    </small>
                </div>
            </div>
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5>Siga-nos nas redes sociais</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/IPBJacupiranga" class="facebook" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="https://www.instagram.com/ipbjacupiranga?igsh=OXVpZTFka3hkZnY5" class="instagram" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.youtube.com/@IpbJacupiranga" class="youtube" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
                        <a href="https://www.whatsapp.com" class="whatsapp" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a>
                    </div>
                </div>
                <!-- <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div> -->
            </div>
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h4>Encontre-nos no Mapa</h4>
                    <div id="map" style="color:white; height: 250px; width: 100%;"></div>
                    <button id="tracarRota" class="btn btn-info mt-3">Traçar Rota</button>
                </div>
                <!-- <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>



        <!-- <div class="col-lg-12 footer-text">
            <span>Todos os direitos reservados - Igreja Presbiteriana do Brasil - Jacupiranga</span>
        </div> -->
    </footer>

    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- JS Personalizado -->
    <script src="Assets/js/main.js"></script>

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
    </script>
</body>

</html>