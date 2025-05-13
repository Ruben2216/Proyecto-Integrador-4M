document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map').setView([16.75, -93.13], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const redIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    navigator.geolocation.getCurrentPosition(function (pos) {
        const lat = pos.coords.latitude;
        const lon = pos.coords.longitude;

        L.marker([lat, lon], { icon: redIcon }).addTo(map)
            .bindPopup("<span style='color: red; font-weight: bold;'>¡Estás aquí!</span>")
            .openPopup();

        fetch('./Activos/BasePHP/obtener_veterinarias.php')
            .then(response => response.json())
            .then(veterinarias => {
                const grupoMarcadores = L.featureGroup();

                veterinarias.forEach(vet => {
                    const marker = L.marker([parseFloat(vet.lat), parseFloat(vet.lon)]).addTo(map);

                    marker.on('click', function () {
                        marker.bindPopup(`
                            <strong>${vet.nombre}</strong><br>
                            <strong>Dirección:</strong> ${vet.direccion || 'No disponible'}<br>
                            <strong>Teléfono:</strong> ${vet.telefono}<br>
                            <span style="color: green;"><strong>Abre:</strong> ${vet.horario_abierto}</span><br>
                            <span style="color: red;"><strong>Cierra:</strong> ${vet.horario_cerrado}</span>
                        `).openPopup();
                    });

                    marker.on('dblclick', function () {
                        if (vet.url) {
                            window.open(vet.url, '_blank');
                        } else {
                            alert("No hay URL disponible para esta veterinaria.");
                        }
                    });

                    grupoMarcadores.addLayer(marker);
                });

                // if (grupoMarcadores.getLayers().length > 0) {
                //     map.fitBounds(grupoMarcadores.getBounds());
                // }
            })
            .catch(error => {
                console.error("Error al cargar veterinarias:", error);
            });
    });
});
