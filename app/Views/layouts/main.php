<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Touche pas au klaxon</title>
    <!-- Intégration de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-page: #f1f8fc;
            --blue-vif: #0074c7;
            --blue-fonce: #00497c;
            --gris-ardoise: #384050;
            --rouge-accent: #cd2c2e;
            --vert-accent: #82b864;
        }

        body {
            background-color: var(--bg-page);
            color: var(--gris-ardoise);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-custom {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        /* Boutons personnalisés avec la couleur #00497c ou #0074c7 */
        .btn-custom {
            background-color: var(--blue-fonce);
            color: white;
            border-radius: 6px;
            transition: background-color 0.2s;
        }
        .btn-custom:hover {
            background-color: var(--blue-vif);
            color: white;
        }

        /* En-têtes de tableaux avec la couleur #384050 ou #00497c */
        .table-custom thead {
            background-color: var(--gris-ardoise);
            color: white;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        footer {
            color: var(--gris-ardoise);
            font-size: 0.9rem;
        }
    </style>

</head>
<body class="container py-4">

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-custom px-4 py-3 mb-4 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-dark" href="/covoiturage/public/">Touche pas au klaxon</a>
           
            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['user'])): ?>
                    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a href="/covoiturage/public/utilisateurs" class="btn btn-sm btn-secondary">Utilisateurs</a>
                    <a href="/covoiturage/public/agences" class="btn btn-sm btn-secondary">Agences</a>
                    <a href="/covoiturage/public/" class="btn btn-sm btn-secondary">Trajets</a>
                    <?php else: ?>
                    <a href="/covoiturage/public/trajet/create" class="btn btn-custom btn-sm">Proposer un trajet</a>
                    <?php endif; ?>

                    <span class="ms-3 fw-semibold">Bonjour <?= htmlspecialchars($_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']) ?></span>
                    <a href="/covoiturage/public/logout" class="btn btn-dark btn-sm rounded-pill px-3">Déconnexion</a>
                <?php else: ?>
                    <a href="/covoiturage/public/login" class="btn btn-dark btn-sm rounded-pill px-3">Connexion</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- MESSAGE FLASH -->
    <?php if (isset($_SESSION['flash'])): ?>
        <div class="alert alert-secondary text-center py-2 mb-4" role="alert">
            <?= $_SESSION['flash']; unset($_SESSION['flash']); ?>
        </div>
    <?php endif; ?>

    <!-- CONTENU -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-4 mt-5">
        <p class="mb-0">&copy; 2026 - CENEF - MVC PHP</p>
    </footer>

</body>
</html>