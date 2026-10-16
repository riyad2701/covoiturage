<?php
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: var(--gris-ardoise);">Gestion des Agences</h2>
</div>

<div class="row">
    <!-- Formulaire d'ajout -->
    <div class="col-md-4 mb-4">
        <div class="card p-4 bg-white shadow-sm">
            <h4 class="fw-bold mb-3" style="color: var(--gris-ardoise);">Ajouter une agence</h4>
            <form action="/covoiturage/public/agences/store" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nom de l'agence</label>
                    <input type="text" name="nom" class="form-control" required placeholder="Ex: Paris Central">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Adresse</label>
                    <textarea name="adresse" class="form-control" rows="2" placeholder="Adresse complète..."></textarea>
                </div>
                <button type="submit" class="btn btn-custom w-100">Ajouter l'agence</button>
            </form>
        </div>
    </div>

    <!-- Liste des agences -->
    <div class="col-md-8">
        <div class="card p-4 bg-white shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: var(--gris-ardoise); color: white;">
                        <tr>
                            <th class="py-3 ps-3">#</th>
                            <th class="py-3">Nom</th>
                            <th class="py-3">Adresse</th>
                            <th class="py-3 text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($agences)): ?>
                            <?php foreach ($agences as $agence): ?>
                                <tr>
                                    <td class="ps-3">#<?= htmlspecialchars($agence['id']) ?></td>
                                    <td class="fw-bold"><?= htmlspecialchars($agence['nom']) ?></td>
                                    <td><?= htmlspecialchars($agence['adresse'] ?? '-') ?></td>
                                    <td class="text-end pe-3">
                                        <a href="/covoiturage/public/agences/delete?id=<?= $agence['id'] ?>"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Confirmer la suppression ?');">
                                           Supprimer
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Aucune agence enregistrée.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>