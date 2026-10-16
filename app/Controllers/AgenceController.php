<?php
namespace App\Controllers;

use App\Models\Agence;

class AgenceController {
    public static function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /covoiturage/public/login');
            exit;
        }

        $agences = Agence::getAll();
        require_once __DIR__ . '/../Views/agences/index.php';
    }

    public static function store() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /covoiturage/public/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $adresse = trim($_POST['adresse'] ?? '');

            if (!empty($nom)) {
                Agence::create($nom, $adresse);
                $_SESSION['flash'] = "Agence ajoutée avec succès !";
            }
            header('Location: /covoiturage/public/agences');
            exit;
        }
    }

    public static function delete($id) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /covoiturage/public/login');
            exit;
        }

        Agence::delete($id);
        $_SESSION['flash'] = "Agence supprimée avec succès !";
        header('Location: /covoiturage/public/agences');
        exit;
    }
}