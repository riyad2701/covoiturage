<?php
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4 bg-white shadow-sm">
            <h2 class="fw-bold mb-4" style="color: var(--gris-ardoise);">Proposer un trajet</h2>

            <form action="/covoiturage/public/trajet/store" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Agence de départ</label>
                    <select name="agence_depart_id" class="form-select" required>
                        <option value="">Sélectionner une agence</option>
                        <?php foreach ($agences as $ag): ?>
                            <option value="<?= $ag['id'] ?>"><?= htmlspecialchars($ag['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Départ : Date + Heure tapables -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Date de départ</label>
                        <input type="date" name="date_depart" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Heure de départ (ex: 08:30)</label>
                        <input type="time" name="heure_depart" class="form-control" placeholder="HH:MM" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Agence d'arrivée</label>
                    <select name="agence_arrivee_id" class="form-select" required>
                        <option value="">Sélectionner une agence</option>
                        <?php foreach ($agences as $ag): ?>
                            <option value="<?= $ag['id'] ?>"><?= htmlspecialchars($ag['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Arrivée : Date + Heure tapables -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Date d'arrivée</label>
                        <input type="date" name="date_arrivee" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Heure d'arrivée (ex: 10:15)</label>
                        <input type="time" name="heure_arrivee" class="form-control" placeholder="HH:MM" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Nombre de places</label>
                    <input type="number" name="nb_places_total" class="form-control" min="1" value="3" required>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="/covoiturage/public/" class="btn btn-outline-secondary">Annuler</a>
                    <button type="submit" class="btn btn-custom px-4">Créer le trajet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>