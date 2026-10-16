<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Touche pas au klaxon</title>
    <!-- Intégration correcte de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f1f8fc; color: #384050; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); width: 100%; max-width: 400px; padding: 20px; background: white; }
        .btn-custom { background-color: #384050; color: white; }
        .btn-custom:hover { background-color: #00497c; color: white; }
    </style>
</head>
<body>

    <div class="card">
        <h3 class="text-center mb-4 fw-bold">Connexion</h3>
       
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert alert-danger text-center py-2" role="alert">
                <?= $_SESSION['flash']; unset($_SESSION['flash']); ?>
            </div>
        <?php endif; ?>

        <form action="/covoiturage/public/login-process" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="ex: alexandre.martin@email.fr">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-custom w-100 py-2">Se connecter</button>
        </form>
       
        <div class="text-center mt-3">
            <a href="/covoiturage/public/" class="text-decoration-none text-muted small">Retour à l'accueil</a>
        </div>
       
        <div class="mt-4 p-3 bg-light rounded small text-muted">
            <strong>Astuce test :</strong><br>
            Admin : <code>alexandre.martin@email.fr</code><br>
            Mot de passe : <code>password123</code>
        </div>
    </div>

</body>
</html>