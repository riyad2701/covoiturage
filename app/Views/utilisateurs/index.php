<?php
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: var(--gris-ardoise);">Gestion des Utilisateurs</h2>
</div>

<div class="card p-4 bg-white shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: var(--gris-ardoise); color: white;">
                <tr>
                    <th class="py-3 ps-3">#</th>
                    <th class="py-3">Nom & Prénom</th>
                    <th class="py-3">Email</th>
                    <th class="py-3">Rôle actuel</th>
                    <th class="py-3 text-end pe-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($utilisateurs)): ?>
                    <?php foreach ($utilisateurs as $u): ?>
                        <tr>
                            <td class="ps-3">#<?= htmlspecialchars($u['id']) ?></td>
                            <td class="fw-bold"><?= htmlspecialchars($u['nom'] . ' ' . ($u['prenom'] ?? '')) ?></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                            <td>
                                <span class="badge <?= $u['role'] === 'admin' ? 'bg-danger' : 'bg-success' ?>">
                                    <?= htmlspecialchars($u['role']) ?>
                                </span>
                            </td>
                            <td class="text-end pe-3">
                                <form action="/covoiturage/public/utilisateurs/update" method="POST" class="d-inline-flex gap-2 align-items-center justify-content-end">
                                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                    <select name="role" class="form-select form-select-sm" style="width: 120px;">
                                        <option value="user" <?= $u['role'] === 'user' ? 'selected' : '' ?>>user</option>
                                        <option value="admin" <?= $u['role'] === 'admin' ? 'selected' : '' ?>>admin</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Modifier</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Aucun utilisateur enregistré.</td>
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