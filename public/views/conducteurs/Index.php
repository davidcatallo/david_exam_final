<?php ob_start(); ?>

<a href="<?= url('conducteurs') ?>">Retour</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Edition</th>
        <th>Suppression</th>
    </tr>
    <?php foreach($conducteurs as $conducteur) : ?>
        <tr>
            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id_conducteur())?>">
                    <?= $conducteur->id_conducteur() ?>
                </a>
            </td>
            <td><?= $conducteur->prenom() ?></td>
            <td><?= $conducteur->nom() ?></td>
            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id_conducteur() . '/edit')?>">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
            <td>
                <a href="<?= url('conducteurs/' . $conducteur->id_conducteur() . '/delete')?>" class="delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr> 
    <?php endforeach; ?>  
</table>



<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>