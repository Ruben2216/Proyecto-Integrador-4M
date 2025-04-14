// Lista de veterinarias: agrega aquí con los campos, A FUTURO ESTO IRA EN LA BASE DE DATOS, ES PARA PRUEBAS DE FUNCIONALIDAD
const veterinarias = [
    { nombre: "Clínica veterinaria Blue Vet", lat: 16.767979077333926, lon: -93.18430823771625, URL: "https://maps.app.goo.gl/cVaVwdtt9NhVQvqKA", telefono: "9611234567", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Bonds and Care", lat: 16.76228557023935, lon: -93.17444103253929, URL: "https://maps.app.goo.gl/JxS9BfpfYJ8Za7Hm9", telefono: "9612345678", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Hospital Veterinario Pet´s", lat: 16.769100942623158, lon: -93.17603717638282, URL: "https://maps.app.goo.gl/rzHcu4TjN2PaWdwm6", telefono: "9613456789", horarioAbierto: "10:00 am", horarioCerrado: "09:00 pm" },
    { nombre: "Clínica Veterinaria Pet Help", lat: 16.771372679150463, lon: -93.18086874706154, URL: "https://maps.app.goo.gl/unQyNCkCv8kff8hL7", telefono: "9614567890", horarioAbierto: "07:00 am", horarioCerrado: "05:00 pm" },
    { nombre: "Can Bull Clínica Veterinaria", lat: 16.754137831366865, lon: -93.17794470701703, URL: "https://maps.app.goo.gl/fjGwzzzFd624YQhS8", telefono: "9615678901", horarioAbierto: "10:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "GOVET Veterinaria & Grooming", lat: 16.7535690011741, lon: -93.16723844039971, URL: "https://maps.app.goo.gl/ErWfQYX63QP1ctP27", telefono: "9616789012", horarioAbierto: "09:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "ZooMedics", lat: 16.774515958005836, lon: -93.16232907848466, URL: "https://maps.app.goo.gl/bGyQ6ePWBCwCnPwt7", telefono: "9617890123", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Pets Life", lat: 16.763750280637776, lon: -93.12344777676628, URL: "https://maps.app.goo.gl/s3VEerVLPcDwcpxw5", telefono: "9618901234", horarioAbierto: "07:30 am", horarioCerrado: "05:30 pm" },
    { nombre: "VET-NOVA", lat: 16.74829923632251, lon: -93.12301862296037, URL: "https://maps.app.goo.gl/cU2KDmCcYhyHsVCR8", telefono: "9619012345", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "VeterClin", lat: 16.744271896363212, lon: -93.11331975525671, URL: "https://maps.app.goo.gl/Y7DpZR5xEp9YsLiN7", telefono: "9610123456", horarioAbierto: "08:30 am", horarioCerrado: "06:30 pm" },
    { nombre: "Servicio Veterinario Scrappy Dog", lat: 16.74164175085894, lon: -93.09349286659553, URL: "https://maps.app.goo.gl/EGtjhbKa5jkiUeDbA", telefono: "9611234568", horarioAbierto: "10:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "Rincón Canino", lat: 16.742305470057097, lon: -93.11844562897534, URL: "https://maps.app.goo.gl/S4j7nULELGC9BjZC7", telefono: "9612345679", horarioAbierto: "09:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Fauna Clínica-Veterinaria", lat: 16.743899237870544, lon: -93.10031022433796, URL: "https://maps.app.goo.gl/eusjdLs9Wjhv2Zid8", telefono: "9613456780", horarioAbierto: "08:00 am", horarioCerrado: "05:00 pm" },
    { nombre: "Clínica Médica Veterinaria Dr. Mendoza", lat: 16.759391992618074, lon: -93.12822206140484, URL: "https://maps.app.goo.gl/wJgfJ7RPpPfkCWPV7", telefono: "9614567891", horarioAbierto: "07:00 am", horarioCerrado: "04:00 pm" },
    { nombre: "Clínica Veterinaria Zoomundo", lat: 16.751107827713163, lon: -93.1310834402336, URL: "https://maps.app.goo.gl/aJ7Kuts3qbwBap378", telefono: "9615678902", horarioAbierto: "09:30 am", horarioCerrado: "07:30 pm" },
    { nombre: "Clínica Veterinaria StarPet's", lat: 16.754448804151885, lon: -93.11122316730328, URL: "https://maps.app.goo.gl/oiGEb94ry3GDdBJM6", telefono: "9616789013", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Animal Vet Clínica Veterinaria", lat: 16.749774781904712, lon: -93.10812614551213, URL: "https://maps.app.goo.gl/iFmEFfgAFeS5P8q3A", telefono: "9617890124", horarioAbierto: "10:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Clínica para Perros y Gatos", lat: 16.752514739878844, lon: -93.11920136485305, URL: "https://maps.app.goo.gl/jGRCAkcmGyDSwqAX6", telefono: "9618901235", horarioAbierto: "09:00 am", horarioCerrado: "05:00 pm" },
    { nombre: "Pet's Life", lat: 16.755382108576974, lon: -93.10376441784776, URL: "https://maps.app.goo.gl/2i6rN6zUKmwAiiW4A", telefono: "9619012346", horarioAbierto: "08:30 am", horarioCerrado: "06:30 pm" },
    { nombre: "Cli Vet Mi Pequeño Dragón", lat: 16.745131394353347, lon: -93.09134266710723, URL: "https://maps.app.goo.gl/RDQz5GNeXaVw6iCs5", telefono: "9610123457", horarioAbierto: "07:00 am", horarioCerrado: "05:00 pm" },
    { nombre: "Veterinaria Doc & Dog", lat: 16.746663205040768, lon: -93.08612995941213, URL: "https://maps.app.goo.gl/GmFdXDbX6cKm8EuXA", telefono: "9611234569", horarioAbierto: "09:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "Clínica Veterinaria Zoo Hospital", lat: 16.740342359213162, lon: -93.07268002463945, URL: "https://maps.app.goo.gl/AVFVnxzsMKmLuvLr5", telefono: "9612345670", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: ".-CACHORROS VETERINARIA.-", lat: 16.745313362122452, lon: -93.10685608024131, URL: "https://maps.app.goo.gl/RXnYfRk9SmTCEu8t9", telefono: "9613456781", horarioAbierto: "10:00 am", horarioCerrado: "08:00 pm" },
    { nombre: "Consultorio Médico Veterinario", lat: 16.74695912372168, lon: -93.10322776939611, URL: "https://maps.app.goo.gl/rJvPGvs8Jj1sAaD76", telefono: "9614567892", horarioAbierto: "09:00 am", horarioCerrado: "07:00 pm" },
    { nombre: "Canes", lat: 16.762752928999024, lon: -93.11706564546024, URL: "https://maps.app.goo.gl/xwtcc6cYYV6fMj4JA", telefono: "9615678903", horarioAbierto: "08:00 am", horarioCerrado: "06:00 pm" },
    { nombre: "Medical Vet", lat: 16.773789547096708, lon: -93.10988585287198, URL: "https://maps.app.goo.gl/3wLmPxyADTpcPRVz7", telefono: "9616789014", horarioAbierto: "07:30 am", horarioCerrado: "05:30 pm" },
    { nombre: "Clínica Dr. Levet", lat: 16.76309099885011, lon: -93.12615290868489, URL: "https://maps.app.goo.gl/tsSLMMRcES3L5gky5", telefono: "9617890125", horarioAbierto: "09:00 am", horarioCerrado: "08:00 pm" }
];

//LA IDEA DEL BLOQUE DE ABAJO ES MOSTRAR EN VERDE SI ESTA ABIERTO O NO, PERO NO FUNCIONA


// // Función para obtener la hora exacta en ejeculion
// function obtenerHoraExacta() {
//     const fecha = new Date();
//     const horas = fecha.getHours().toString().padStart(2, '0');
//     const minutos = fecha.getMinutes().toString().padStart(2, '0');
//     let hora= parseFloat(horas + '.' + minutos); // Convertir a formato decimal
//     return hora;
// }
// function estaAbierto(hora, horarioAbierto, horarioCerrado) {
//     if (hora > horarioAbierto && hora < horarioCerrado) {
//         return true; // Veterinaria  esta abierta   
//     } else {
//         return false;
//     }

// }
// console.log("Hora exacta:", obtenerHoraExacta());
// console.log(estaAbierto());

navigator.geolocation.getCurrentPosition(function(pos) {
    const lat = pos.coords.latitude;
    const lon = pos.coords.longitude;

    const map = L.map('map').setView([lat, lon], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([lat, lon]).addTo(map).bindPopup("<span style='color: red; font-weight: bold;'>" + "¡Estás aquí humano pendejo!" + "</span>").openPopup();

    veterinarias.forEach(function(vet) {
        const marker = L.marker([vet.lat, vet.lon]).addTo(map);

        // Evento de click simple -- muestra nombre
        marker.on('click', function() {
            marker.bindPopup(
                "<strong style='text-align: center;'>" + vet.nombre + "</strong><br>" //INTENTE ALINAE PERO NO NOTO DIFERENCIAS, LO DEJO ASI PORSI SE ALINEA EN MOBILES
                + "<span><strong>Teléfono:</strong> " + vet.telefono + "</span><br>" 
                + "<span style='color: green;'><strong>Abre</strong>: " + vet.horarioAbierto + "</span><br>" 
                +"<span style='color: red;'><strong>Cierra:</strong> " + vet.horarioCerrado + "</span>"
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