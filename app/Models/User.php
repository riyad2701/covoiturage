<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class User {
    public static function getAll() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM utilisateurs ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByEmail($email) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateRole($id, $role) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE utilisateurs SET role = ? WHERE id = ?");
        return $stmt->execute([$role, $id]);
    }
}