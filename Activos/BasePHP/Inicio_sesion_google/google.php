<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

// Cargar el .env por las claves
use Dotenv\Dotenv;

// Ruta al directorio archivo .env
$dotenv = Dotenv::createImmutable('c:/xampp/htdocs/Proyecto-Integrador-4M/');
$dotenv->load();

// Obtener las claves de Google desde las variables de entorno
$clientID = $_ENV['GOOGLE_CLIENT_ID'];
$clientSecret = $_ENV['GOOGLE_CLIENT_SECRET'];
$redirectUri = $_ENV['GOOGLE_REDIRECT'];

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Obtener información del perfil del usuario
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email_google = $google_account_info->email;
    $name_google = $google_account_info->name;

    session_start();
    // Guardar los datos en variables de sesión para usarlos en guardar_usuario.php
    $_SESSION['user_name'] = $name_google;
    $_SESSION['email_email'] = $email_google;
    // Redirigir a la lógica centralizada de guardado de usuario
    header('Location: /Proyecto-Integrador-4M/Activos/BasePHP/guardar_usuario.php');
    exit();
} else {
    // URL para acceder a la autenticación automáticamente
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit();
}