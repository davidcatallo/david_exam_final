<?php ob_start(); ?>

<a href="<?= url('vehicules') ?>">Retour</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Edition</th>
        <th>Suppression</th>
    </tr>

    <tr>
        <td>
            <a href="<?= url('vehicules/' . $vehicule->id_vehicule())?>">
                <?= $vehicule->id_vehicule() ?>
            </a>
        </td>
        <td><?= $vehicule->marque() ?></td>
        <td><?= $vehicule->modele() ?></td>
        <td><?= $vehicule->couleur() ?></td>
        <td><?= $vehicule->immatriculation() ?></td>
        <td><?= $vehicule->id_vehicule() ?></td>
        <td>
            <a href="<?= url('vehicules/' . $vehicule->id_vehicule() . '/edit')?>">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </td>
        <td>
            <a href="<?= url('vehicules/' . $vehicule->id_vehicule() . '/delete')?>" class="delete">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>