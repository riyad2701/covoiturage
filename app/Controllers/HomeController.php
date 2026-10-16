<?php
namespace App\Controllers;

class HomeController {
    public static function index() {
        // On récupère les trajets via le contrôleur ou directement
        TrajetController::index();
    }
}