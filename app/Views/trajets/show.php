<?php
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4 bg-white shadow-sm">
            <h2 class="fw-bold mb-4" style="color: var(--gris-ardoise);">Détails du Trajet #<?= htmlspecialchars($trajet['id']) ?></h2>

            <div class="mb-3">
                <span class="fw-bold">Agence de départ :</span>
                <span class="text-secondary"><?= htmlspecialchars($trajet['agence_depart_nom'] ?? 'Agence #'.$trajet['agence_depart_id']) ?></span>
            </div>

            <div class="mb-3">
                <span class="fw-bold">Date & Heure de départ :</span>
                <span class="text-secondary"><?= htmlspecialchars($trajet['date_heure_depart']) ?></span>
            </div>

            <div class="mb-3">
                <span class="fw-bold">Agence d'arrivée :</span>
                <span class="text-secondary"><?= htmlspecialchars($trajet['agence_arrivee_nom'] ?? 'Agence #'.$trajet['agence_arrivee_id']) ?></span>
            </div>

            <div class="mb-3">
                <span class="fw-bold">Date & Heure d'arrivée :</span>
                <span class="text-secondary"><?= htmlspecialchars($trajet['date_heure_arrivee']) ?></span>
            </div>

            <div class="mb-3">
                <span class="fw-bold">Conducteur :</span>
                <span class="text-secondary"><?= htmlspecialchars(($trajet['conducteur_prenom'] ?? '') . ' ' . ($trajet['conducteur_nom'] ?? 'Inconnu')) ?></span>
            </div>

            <div class="mb-4">
                <span class="fw-bold">Places disponibles :</span>
                <span class="badge" style="background-color: var(--vert-accent); font-size: 1rem;">
                    <?= htmlspecialchars($trajet['nb_places_disponibles']) ?> / <?= htmlspecialchars($trajet['nb_places_total']) ?>
                </span>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="/covoiturage/public/" class="btn btn-outline-secondary">Retour à l'accueil</a>
               
                <?php if ($trajet['nb_places_disponibles'] > 0): ?>
                    <a href="/covoiturage/public/trajet/book?id=<?= $trajet['id'] ?>" class="btn btn-custom px-4">Réserver une place</a>
                <?php else: ?>
                    <button class="btn btn-secondary px-4" disabled>Complet</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>