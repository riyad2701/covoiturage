<?php
session_start();

// Inclusion directe des fichiers de configuration, modèles et contrôleurs
require_once __DIR__ . '/../app/Config/Database.php';
require_once __DIR__ . '/../app/Models/User.php';
require_once __DIR__ . '/../app/Models/Trajet.php';
require_once __DIR__ . '/../app/Models/Agence.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/TrajetController.php';
require_once __DIR__ . '/../app/Controllers/AgenceController.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\TrajetController;
use App\Controllers\AgenceController;
use App\Controllers\UserController;

// Récupération de l'URL demandée
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/covoiturage/public', '', $uri);

// Routage simple
switch ($uri) {
    case '/':
    case '':
        HomeController::index();
        break;

    case '/login':
        AuthController::showLogin();
        break;

    case '/login-process':
        AuthController::login();
        break;

    case '/logout':
        AuthController::logout();
        break;

    case '/trajet/create':
        TrajetController::createForm();
        break;

    case '/trajet/store':
        TrajetController::store();
        break;

    // Routes Agences
    case '/agences':
    case '/agences/':
        AgenceController::index();
        break;

    case '/agences/store':
        AgenceController::store();
        break;

    case '/agences/delete':
        $id = $_GET['id'] ?? null;
        AgenceController::delete($id);
        break;

    // Routes Utilisateurs
    case '/utilisateurs':
    case '/utilisateurs/':
        UserController::index();
        break;

    case '/utilisateurs/update':
        UserController::update();
        break;

    case '/trajet/show':
        $id = $_GET['id'] ?? null;
        TrajetController::show($id);
        break;

    case '/trajet/book':
        $id = $_GET['id'] ?? null;
        TrajetController::book($id);
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Page non trouvée</h1>";
        break;
}