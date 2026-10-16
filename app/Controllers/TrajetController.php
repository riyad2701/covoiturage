<?php
namespace App\Controllers;

use App\Models\Trajet;
use App\Models\Agence;

class TrajetController {
    public static function index() {
        $db = \App\Config\Database::getConnection();
        $sql = "SELECT t.*,
                       a_dep.nom AS agence_depart_nom,
                       a_arr.nom AS agence_arrivee_nom
                FROM trajets t
                LEFT JOIN agences a_dep ON t.agence_depart_id = a_dep.id
                LEFT JOIN agences a_arr ON t.agence_arrivee_id = a_arr.id
                ORDER BY t.id DESC";
        $stmt = $db->query($sql);
        $trajets = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/trajets/index.php';
    }

    public static function createForm() {
        if (!isset($_SESSION['user'])) {
            header('Location: /covoiturage/public/login');
            exit;
        }

        $agences = Agence::getAll();
        require_once __DIR__ . '/../Views/trajets/create.php';
    }

    public static function show($id) {
        if (!isset($_SESSION['user'])) {
            header('Location: /covoiturage/public/login');
            exit;
        }

        $trajet = Trajet::getById($id);
        if (!$trajet) {
            $_SESSION['flash'] = "Trajet introuvable.";
            header('Location: /covoiturage/public/');
            exit;
        }

        require_once __DIR__ . '/../Views/trajets/show.php';
    }

    public static function book($id) {
        if (!isset($_SESSION['user'])) {
            header('Location: /covoiturage/public/login');
            exit;
        }

        $trajet = Trajet::getById($id);
        if ($trajet && $trajet['nb_places_disponibles'] > 0) {
            Trajet::decrementPlaces($id);
            $_SESSION['flash'] = "Place réservée avec succès ! Bon voyage !";
        } else {
            $_SESSION['flash'] = "Désolé, plus de places disponibles.";
        }

        header('Location: /covoiturage/public/trajet/show?id=' . $id);
        exit;
    }
}