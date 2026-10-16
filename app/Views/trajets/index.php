<?php
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: var(--gris-ardoise);">Trajets proposés</h2>
</div>

<div class="card p-4 bg-white shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: var(--gris-ardoise); color: white;">
                <tr>
                    <th class="py-3 ps-3">Agence Départ</th>
                    <th class="py-3">Date & Heure Départ</th>
                    <th class="py-3">Agence Arrivée</th>
                    <th class="py-3">Date & Heure Arrivée</th>
                    <th class="py-3">Places dispo.</th>
                    <th class="py-3 text-end pe-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($trajets)): ?>
                    <?php foreach ($trajets as $t): ?>
                        <tr>
                            <td class="ps-3"><?= htmlspecialchars($t['agence_depart_nom'] ?? $t['agence_depart_id']) ?></td>
                            <td><?= htmlspecialchars($t['date_heure_depart']) ?></td>
                            <td><?= htmlspecialchars($t['agence_arrivee_nom'] ?? $t['agence_arrivee_id']) ?></td>
                            <td><?= htmlspecialchars($t['date_heure_arrivee']) ?></td>
                            <td>
                                <span class="badge" style="background-color: var(--vert-accent);">
                                    <?= htmlspecialchars($t['nb_places_disponibles']) ?> / <?= htmlspecialchars($t['nb_places_total']) ?>
                                </span>
                            </td>
                            <td class="text-end pe-3">
                                <a href="/covoiturage/public/trajet/show?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-primary">Détails</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Aucun trajet disponible pour le moment.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>