<?php ob_start(); ?>

<a href="<?= url('abonnes') ?>">Retour</a>

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
            <a href="<?= url('abonnes/' . $abonne->id())?>">
                <?= $abonne->id() ?>
            </a>
        </td>
        <td><?= $abonne->prenom() ?></td>
        <td><?= $abonne->nom() ?></td>
        <td>
            <a href="<?= url('abonnes/' . $abonne->id() . '/edit')?>">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </td>
        <td>
            <a href="<?= url('abonnes/' . $abonne->id() . '/delete')?>" class="delete">
                <i class="fas fa-trash-alt"></i>
            </a>
        </td>
    </tr>
</table>

<a href="<?= url('abonnes') ?>">Retour</a>


<form action="<?= url('abonnes/save') ?>" method="post">

    <input type="hidden" name="id"     value="<?= (isset($abonne)) ? $abonne->id() : '' ?>">
    <input type="text"   name="prenom" value="<?= (isset($abonne)) ? $abonne->prenom() : '' ?>" placeholder="Prenom" class="form-control">
    <input type="text"   name="nom"    value="<?= (isset($abonne)) ? $abonne->nom() : '' ?>"    placeholder="Nom"    class="form-control">

    <button type="submit" class="btn btn-<?= (isset($abonne)) ? 'warning' : 'success' ?>">
        <?= (isset($abonne)) ? 'Editer' : 'Créer' ?> un abonné
    </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>