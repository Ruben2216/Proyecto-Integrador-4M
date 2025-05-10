// Lista de veterinarias: agrega aquí con los campos, A FUTURO ESTO IRA EN LA BASE DE DATOS, ES PARA PRUEBAS DE FUNCIONALIDAD
const veterinarias = [
    { nombre: "Clínica veterinaria Blue Vet", lat: 16.767643171346688, lon: -93.18353335877217,  URL: "https://maps.app.goo.gl/QwVXrkeZDnxjUq8b7", Direccion: "Av. Chihuahua 32, Plan de Ayala, 29020 Tuxtla Gutiérrez, Chis." , telefono: "9611790906", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Bonds and Care", lat: 16.761797406572207,  lon:-93.17527882755448, URL: "https://maps.app.goo.gl/JxS9BfpfYJ8Za7Hm9", Direccion: "Esc.Prim.Federal Prof, Cjon. Raúl Isidro Burgos 90, Plan de Ayala, 29020 Tuxtla Gutiérrez, Chis." , telefono: "9611258125", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Hospital Veterinario Pet´s", lat: 16.76852844805711,lon: -93.17785947103819, URL: "https://maps.app.goo.gl/rzHcu4TjN2PaWdwm6", Direccion: "Calz. Juan Crispin No. 938, Plan de Ayala, 29020 Tuxtla Gutiérrez, Chis." ,telefono: "9613456789", horarioAbierto: "10:00 am", horarioCerrado: "09:00 pm" },
    { nombre: "Clínica Veterinaria Pet Help", lat: 16.770444522642777, lon:  -93.18231426345487, URL: "https://maps.app.goo.gl/unQyNCkCv8kff8hL7",Direccion: "29110, C. Nuevo León 200, Plan de Ayala, 29020 Tuxtla Gutiérrez, Chis." , telefono: "9611277961", horarioAbierto: "10:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "Can Bull Clínica Veterinaria", lat: 16.75411447192594,  lon: -93.17805653772243, URL: "https://maps.app.goo.gl/fjGwzzzFd624YQhS8", Direccion: "Rosario Sabinal, Terán, 29057 Tuxtla Gutiérrez, Chis." ,telefono: "9616903094", horarioAbierto: "09:00 am", horarioCerrado: "05:30 pm" },
    { nombre: "GOVET Veterinaria & Grooming", lat: 16.75469950761847,  lon:  -93.16581705632031, URL: "https://maps.app.goo.gl/ErWfQYX63QP1ctP27",Direccion: "Av 3a norte y 1a poniente, Terán, 29050 Tuxtla Gutiérrez, Chis." , telefono: "9614710810", horarioAbierto: "09:00 am", horarioCerrado: "05:00 pm" },
    { nombre: "ZooMedics", lat: 16.77207846476205, lon: -93.16264126450477, URL: "https://maps.app.goo.gl/bGyQ6ePWBCwCnPwt7",Direccion: "Sureste 250, Bonampak, 29027 Tuxtla Gutiérrez, Chis." , telefono: "5516607663", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Pets Life", lat: 16.762741534813678, lon:-93.12349697026791, URL: "https://maps.app.goo.gl/s3VEerVLPcDwcpxw5",Direccion: "C. 10a. Pte. Nte. 955, Vista Hermosa, 29030 Tuxtla Gutiérrez, Chis." , telefono: "9616496502", horarioAbierto: "07:30 am", horarioCerrado: "05:30 pm" },
    { nombre: "VET-NOVA", lat: 16.746385611734254, lon: -93.12263026968314, URL: "https://maps.app.goo.gl/cU2KDmCcYhyHsVCR8", Direccion: "Calle Sexta Pte. Sur 1057, San Francisco, 29066 Tuxtla Gutiérrez, Chis." ,telefono: "9611556558", horarioAbierto: "Las 24 horas" },
    { nombre: "VeterClin", lat:16.742701725769813, lon: -93.11331975525671, URL: "https://maps.app.goo.gl/Y7DpZR5xEp9YsLiN7",Direccion: "29080, Carr. Villaflores 1405, Obrera, Tuxtla Gutiérrez, Chis." , telefono: "9610123456", horarioAbierto: "08:30 am", horarioCerrado: "06:30 pm" },
    { nombre: "Servicio Veterinario Scrappy Dog", lat: 16.74078307564525,  lon: -93.09731645366553, URL: "https://maps.app.goo.gl/x4ymfQjGgeTTwE1F8",Direccion: "9a. Sur Ote. 2549, entre Pino Suárez y 15 de Mayo, Bienestar Soc, 29077 Tuxtla Gutiérrez, Chis." , telefono: "9612555977", horarioAbierto: "Las 24 horas" },
    { nombre: "Rincón Canino", lat: 16.741891640700615, lon: -93.11821664725788, URL: "https://maps.app.goo.gl/S4j7nULELGC9BjZC7",Direccion: "C. Central-Sur 1515, San Francisco, 29066 Tuxtla Gutiérrez, Chis." , telefono: "9616135400", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Fauna Clínica-Veterinaria", lat: 16.74303593875838, lon: -93.10159014173686,  URL: "https://maps.app.goo.gl/mPxEk7praLJjNq3M6", Direccion: "Calz Samuel León Brindis 174, Mexicanidad Chiapaneca, 29076 Tuxtla Gutiérrez, Chis." ,telefono: "9611523316", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Clínica Médica Veterinaria Dr. Mendoza", lat:16.75903742202426,  lon: -93.1299195554296, URL: "https://maps.app.goo.gl/wJgfJ7RPpPfkCWPV7", Direccion: "3a. Nte. Pte. 1580, Moctezuma, 29030 Tuxtla Gutiérrez, Chis." ,telefono: "9616541843", horarioAbierto: "08:00 am", horarioCerrado: "09:00 pm" },
    { nombre: "Clínica Veterinaria Zoomundo", lat:16.750457710464303,  lon: -93.13196880643925, URL: "https://maps.app.goo.gl/aJ7Kuts3qbwBap378",Direccion: "Calle 15a. Pte Sur 689, Xamaipak, 29000 Tuxtla Gutiérrez, Chis." , telefono: "9616028790", horarioAbierto: "08:00 am", horarioCerrado: "10:00 pm" },
    { nombre: "Clínica Veterinaria StarPet's", lat: 16.753812565005422, lon: -93.11216130211167,  URL: "https://maps.app.goo.gl/oiGEb94ry3GDdBJM6", Direccion: "Calle 1a norte, Av. 1a Nte. Ote. 557a, 29000 Tuxtla Gutiérrez, Chis." ,telefono: "9611571947", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Animal Vet Clínica Veterinaria", lat: 16.749219620804954, lon: -93.10891120821967 ,URL: "https://maps.app.goo.gl/ZxVXpgtc1EnUsH9X9",Direccion: "Av. 4a. Sur Ote. s/n, San Roque, 29066 Tuxtla Gutiérrez, Chis." , telefono: "9616001493", horarioAbierto: "Las 24 horas" },
    { nombre: "Clínica Para Perros y Gatos", lat: 16.752401927186018, lon: -93.12085714931726,  URL: "https://maps.app.goo.gl/7Yx99iAcz2Ma6FNB6", Direccion: "Av 2a. Sur Pte 615, El Cerrito, 29000 Tuxtla Gutiérrez, Chis." ,telefono: "9616110528", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Clínica Veterinaria Medipet's", lat: 16.7663962832574, lon: -93.16334861796291, URL: "https://maps.app.goo.gl/n31kEjpnqxQbF14j7",Direccion: "Av. Poco Vinic Casa16, San José Yeguiste, 29025 Tuxtla Gutiérrez, Chis." , telefono: "9612122662", horarioAbierto: "Las 24 horas" },
    { nombre: "Cli Vet Mi Pequeño Dragón", lat: 16.74445250687501, lon: -93.09229946355201,  URL: "https://maps.app.goo.gl/RDQz5GNeXaVw6iCs5",Direccion: "Av Miguel Hidalgo 1046, Bienestar Soc, 29077 Tuxtla Gutiérrez, Chis." , telefono: "9616025662", horarioAbierto: "09:30 am", horarioCerrado: "10:00 pm" },
    { nombre: "Veterinaria Doc & Dog", lat: 16.746313358765857, lon:  -93.0865693737262,  URL: "https://maps.app.goo.gl/HMwWHWfuRbGkfChV9",Direccion: "Blvd. la Salle 280, La Salle 2, 29070 Tuxtla Gutiérrez, Chis." , telefono: "9612439873", horarioAbierto: "10:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "Clínica Veterinaria Zoo Hospital", lat:16.739935913382013,  lon: -93.07369078679584, URL: "https://maps.app.goo.gl/AVFVnxzsMKmLuvLr5",Direccion: "Cto. las Casas Pte. s/n, La Misión, 29096 Tuxtla Gutiérrez, Chis." , telefono: "9611588181", horarioAbierto: "11:00 am", horarioCerrado: "09:00 pm" },
    { nombre: ".-CACHORROS VETERINARIA.-", lat: 16.744994057104904,  lon: -93.10637315555982, URL: "https://maps.app.goo.gl/5fL9bisgJ2K2seEq9",Direccion: "Calle 13a Ote Sur 915, Col. Centro, Santa Cruz, 29073 Tuxtla Gutiérrez, Chis." , telefono: "9611776883", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Consultorio Médico Veterinario", lat: 16.74695912372168, lon: -93.10322776939611, URL: "https://maps.app.goo.gl/rJvPGvs8Jj1sAaD76", Direccion: "" ,telefono: "9614567892", horarioAbierto: "09:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "Canes", lat:16.76203194818488, lon:-93.11701658206265, URL: "https://maps.app.goo.gl/xwtcc6cYYV6fMj4JA", Direccion: "Av. Novena Nte. Pte. 347-A, Niño de Atocha, 29037 Tuxtla Gutiérrez, Chis." ,telefono: "9616135781", horarioAbierto: "09:20 am", horarioCerrado: "08:00 pm" },
    { nombre: "Medical Vet", lat: 16.773073221332726, lon:  -93.11244239245609, URL: "https://maps.app.goo.gl/jXDYKdAM65xDy4BQ8",Direccion: "Central Nte. 2237, Pedregal San Antonio, 29014 Tuxtla Gutiérrez, Chis." , telefono: "9611253867", horarioAbierto: "07:30 am", horarioCerrado: "05:30 pm" },
    { nombre: "Clínica Dr. Levet", lat: 16.76309099885011, lon: -93.12615290868489, URL: "https://maps.app.goo.gl/tsSLMMRcES3L5gky5", Direccion: "Av 8ᵃ Nte Pte, Juy Juy, 29038 Tuxtla Gutiérrez, Chis." ,telefono: "9616182406", horarioAbierto: "10:30 am", horarioCerrado: "08:00 pm" },
    { nombre: "Kopek", lat: 16.760314926523943,  lon: -93.1605374907951, URL: "https://maps.app.goo.gl/w3nPohC69bPTbcof6", Direccion: "Av Juan Sabines G. 8-A, Jardín Corona Fovissste II, 29020 Tuxtla Gutiérrez, Chis.",  telefono: "9617890861", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "VILLARREAL-Veterinaria & Estética Canina", lat:16.754541977919416,  lon: -93.16389239782806 , URL: "https://maps.app.goo.gl/o5KHfAVvNQ9WhATe7", Direccion: "Tercera Avenida Nte. Ote. 170, Terán, 29050 Tuxtla Gutiérrez, Chis.",  telefono: "9614514157", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Veterinaria Schnauzer", lat: 16.748762842742927,   lon:-93.16357725480667, URL: "https://maps.app.goo.gl/shrt9ERxAWJyxdVo7", Direccion: "Segunda Ote. Sur 577, Terán, 29050 Tuxtla Gutiérrez, Chis.",  telefono: "9611745611", horarioAbierto: "09:00 am ", horarioCerrado: "06:30 pm" },
    { nombre: "Tivu", lat: 16.751883470975333,   lon:-93.15520698625537, URL: "https://maps.app.goo.gl/Rv5zdoynpYfPmX8N6", Direccion: "29059 Avenida Golondrinas, Av. Golondrinas 725, Buenos Aíres, 29059 Tuxtla Gutiérrez, Chis.",  telefono: "9616881272", horarioAbierto: "09:00 am", horarioCerrado: "04:00 pm" },
    { nombre: "Clínica veterinaria huellitaxs", lat: 16.744920155288565,   lon: -93.15937511490252, URL: "https://maps.app.goo.gl/PwYnjkxDKGfUrfVt7", Direccion: "8 oriente sur#1051, Terán, 29059 Tuxtla Gutiérrez, Chis.",  telefono: "9611944562", horarioAbierto: "09:00 am", horarioCerrado: "=8:00 pm" },
    { nombre: "Veterinaria San Jorge", lat: 16.750608344945874,  lon:  -93.16318047076209, URL: "https://maps.app.goo.gl/GezV9dk29WmfNUvU9", Direccion: "2A. Oriente Sur 312, Terán, 29050 Tuxtla Gutiérrez, Chis.",  telefono: "9616716098", horarioAbierto: "08:00 am", horarioCerrado: "10:00 pm" },
    { nombre: "Dalmatas", lat: 16.7628383691379,   lon: -93.18564284278351, URL: "https://maps.app.goo.gl/wbXMPPw5KM56MRTu6", Direccion: "Aguascalientes s/n, Plan de Ayala, Tuxtla Gutiérrez, Chis.",  telefono: "9616715626", horarioAbierto: "09:00 am", horarioCerrado: "10:00 pm" },
    { nombre: "Clinica Veterinaria PETLAND", lat: 16.74583425617839,  lon:-93.12939829124205, URL: "https://maps.app.goo.gl/jpDSgPGCGxniH32E8", Direccion: "Av. Doceava Sur Pte. 1514, Popular Xamaipak, 29060 Tuxtla Gutiérrez, Chis.",  telefono: "9611215217", horarioAbierto: "09:00 am", horarioCerrado: "04:00 pm" },
    { nombre: "Jaen Pet veterinaria", lat: 16.762346595121794, lon:  -93.12294423011596, URL: "https://maps.app.goo.gl/u4XvPyaxk64JvpV47", Direccion: "Av 8ᵃ Nte Pte 1016, Colón, 29000 Tuxtla Gutiérrez, Chis.",  telefono: "9612325783", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "CLÍNICA VETERINARIA NUTRYFARM", lat:16.762454327465328,  lon:-93.11753669505674 , URL: "https://maps.app.goo.gl/QxvJsHcwvB1SgtCm6", Direccion: "Av. Novena Nte. Pte. 402, Niño de Atocha, 29037 Tuxtla Gutiérrez, Chis.",  telefono: "9616181602", horarioAbierto: "09:00 am", horarioCerrado: "10:00 pm" },
    { nombre: "The Happy Pet", lat:16.78279426068736,  lon: -93.10437987749177, URL: "https://maps.app.goo.gl/LFuCMKcP14vkrwLq8", Direccion: "Calz. Al Sumidero s/n Int. 1, Albania Baja, 29010 Tuxtla Gutiérrez",  telefono: "9611293099", horarioAbierto: "09:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "centro veterinario chiapas", lat: 16.760473089964993,  lon:  -93.11739708956442, URL: "https://maps.app.goo.gl/2ouzqDdbAvSwgcjS9", Direccion: "Sauce 36, Albania Baja, 29010 Tuxtla Gutiérrez, Chis.",  telefono: "+529611707956", horarioAbierto: "08:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Salud Animal del Sureste", lat:16.749653509688244,  lon:-93.11882920899505 ,  URL: "https://maps.app.goo.gl/S41o4ZfTauQ99c6b6", Direccion: "Av. Quinta Sur Pte. 313 C, El Calvario, 29000 Tuxtla Gutiérrez, Chis.",  telefono: "v", horarioAbierto: "09:00 am", horarioCerrado: "08:00" },
    { nombre: "Hospital Clínica Mundopet", lat: 16.736128468951158, lon: -93.12055567106286, URL: "https://maps.app.goo.gl/qMFDW4VED2Nfy1hh7", Direccion: "Libramiento Sur 156B, San Francisco, Tuxtla Gutiérrez, Chis.",  telefono: "+529611413574", horarioAbierto: "09:00 am", horarioCerrado: "04:00 pm" },
    { nombre: "VET&GUAU", lat:16.741781082134995, lon:  -93.1248072010496 , URL: "https://maps.app.goo.gl/RLpxDKHirWkv7tDr6", Direccion: "16 sur poniente #854-A, entre 7 y 8 pte, San Francisco, 29066 Tuxtla Gutiérrez, Chis.",  telefono: "9613938766", horarioAbierto: "09:00 am", horarioCerrado: "10:00 pm" },
    { nombre: "Pek-mitsu Veterinaria", lat: 16.760992014766938, lon:  -93.1069218987698, URL: "https://maps.app.goo.gl/vTaK3gcToBeNq5o19", Direccion: "Calle, 9a. Ote. Nte. 1070, Nte, Brasilia, 29010 Tuxtla Gutiérrez, Chis.",  telefono: "9611547410", horarioAbierto: "08:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Perrioni Veterinaria", lat: 16.74657566226088,  lon: -93.1193390492452, URL: "https://maps.app.goo.gl/EtcVwavBi1uwTQYq9", Direccion: "Calle Segunda Pte. Sur 962, El Calvario, 29000 Tuxtla Gutiérrez, Chis.",  telefono: "9616145653", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Animal's Medic", lat: 16.730645149998338,  lon:-93.10408687533254, URL: "https://maps.app.goo.gl/KWVuhsFcerAqBw7g7", Direccion: "Calz. Samuel León Brindis 1050, Calz Samuel León Brindis 87, Francisco I. Madero, 29090 Tuxtla Gutiérrez, Chis.",  telefono: "9616387769", horarioAbierto: "Las 24 horas" },
    { nombre: "Clínica Veterinaria Peludogs", lat:16.754286440034477,   lon: -93.11340813706576 , URL: "https://maps.app.goo.gl/ry9Mk5FRo92GsR7d8", Direccion: "Calle Tercera Ote. Nte. 240, San Marcos, 29000 Tuxtla Gutiérrez, Chis.",  telefono: "9616122543", horarioAbierto: "Las 24 horas" },
    { nombre: "Veterinaria Cachorros Vip´s", lat:16.705393084340365,  lon:-93.17115236923186 ,URL: "https://maps.app.goo.gl/dxRf3sNFsyrmbi1R6", Direccion: "Av del Tule 616, Real del Bosque, 29055 Tuxtla Gutiérrez, Chis.",  telefono: "617013318", horarioAbierto: "09:00 am", horarioCerrado: "06:00 pm" } 

    
];



navigator.geolocation.getCurrentPosition(function(pos) {
    const lat = pos.coords.latitude;
    const lon = pos.coords.longitude;

    const map = L.map('map').setView([lat, lon], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

     // Crear ícono rojo para la ubicación actual
     const redIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    // Usar el icono rojo en tu ubicación
    L.marker([lat, lon], { icon: redIcon })
        .addTo(map)
        .bindPopup("<span style='color: red; font-weight: bold;'>¡Estás aquí!</span>")
        .openPopup();


   

    veterinarias.forEach(function(vet) {
        const marker = L.marker([vet.lat, vet.lon]).addTo(map);
        

        // Evento de click simple -- muestra nombre
        marker.on('click', function() {
            marker.bindPopup(
                "<strong style='text-align: center;'>" + vet.nombre + "</strong><br>"
                + "<span><strong>Dirección:</strong> " + (vet.Direccion || "No disponible") + "</span><br>"
                + "<span><strong>Teléfono:</strong> " + vet.telefono + "</span><br>"
                + "<span style='color: green;'><strong>Abre:</strong> " + vet.horarioAbierto + "</span><br>"
                + "<span style='color: red;'><strong>Cierra:</strong> " + vet.horarioCerrado + "</span>"
            ).openPopup(); 
        });

        // Evento de doble click -- abre Google Maps
        marker.on('dblclick', function() {
            if (vet.URL) {
                window.open(vet.URL, '_blank');
            } else {
                alert("No hay URL disponible para esta veterinaria.");
            }
        });
    });
});