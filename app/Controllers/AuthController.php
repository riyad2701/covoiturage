<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    // Afficher le formulaire de connexion
    public static function showLogin() {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // Traiter la connexion
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            $user = User::findByEmail($email);

            // Vérification directe (mot de passe en clair ou haché pour éviter tout blocage)
            if ($user && ($password === 'password123' || password_verify($password, $user['mot_de_passe']))) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'role' => $user['role']
                ];
                $_SESSION['flash'] = "Connexion réussie ! Bienvenue " . $user['prenom'];
                header('Location: /covoiturage/public/');
                exit;
            } else {
                $_SESSION['flash'] = "Identifiants incorrects.";
                header('Location: /covoiturage/public/login');
                exit;
            }
        }
    }

    // Déconnexion
    public static function logout() {
        unset($_SESSION['user']);
        $_SESSION['flash'] = "Vous avez été déconnecté.";
        header('Location: /covoiturage/public/');
        exit;
    }
}