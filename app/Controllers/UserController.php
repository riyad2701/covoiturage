<?php
namespace App\Controllers;

use App\Models\User;

class UserController {
    public static function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /covoiturage/public/login');
            exit;
        }

        $utilisateurs = User::getAll();
        require_once __DIR__ . '/../Views/utilisateurs/index.php';
    }

    public static function update() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /covoiturage/public/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id'] ?? 0);
            $role = trim($_POST['role'] ?? 'user');

            User::updateRole($id, $role);
            $_SESSION['flash'] = "Rôle de l'utilisateur mis à jour avec succès !";
            header('Location: /covoiturage/public/utilisateurs');
            exit;
        }
    }
}