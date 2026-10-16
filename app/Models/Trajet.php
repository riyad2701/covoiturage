<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Trajet {
    // ... (garde tes méthodes existantes getAll et create) ...

    public static function getById($id) {
        $db = Database::getConnection();
        $sql = "SELECT t.*,
                       a_dep.nom AS agence_depart_nom,
                       a_arr.nom AS agence_arrivee_nom,
                       u.nom AS conducteur_nom, u.prenom AS conducteur_prenom
                FROM trajets t
                LEFT JOIN agences a_dep ON t.agence_depart_id = a_dep.id
                LEFT JOIN agences a_arr ON t.agence_arrivee_id = a_arr.id
                LEFT JOIN utilisateurs u ON t.conducteur_id = u.id
                WHERE t.id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function decrementPlaces($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE trajets SET nb_places_disponibles = nb_places_disponibles - 1 WHERE id = ? AND nb_places_disponibles > 0");
        return $stmt->execute([$id]);
    }
}