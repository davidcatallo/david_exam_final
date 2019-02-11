<?php ob_start(); ?>

<a href="<?= url('associations/add') ?>">Ajouter une association</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Conducteur</th>
        <th>Véhicule</th>
        <th></th>
    </tr>

    <?php foreach($associations as $association) : ?>
        <tr>
            <td><?= $association->id_association() ?></td>
            <td><?= $association->conducteur() ?></td>
            <td><?= $association->vehicule() ?></td>
            <td>
                <a href="<?= url('associations/' . $association->id_association() . '/delete')?>" class="delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>