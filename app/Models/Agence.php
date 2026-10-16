<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Agence {
    public static function getAll() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM agences ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nom, $adresse) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO agences (nom, adresse) VALUES (?, ?)");
        return $stmt->execute([$nom, $adresse]);
    }

    public static function delete($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM agences WHERE id = ?");
        return $stmt->execute([$id]);
    }
}