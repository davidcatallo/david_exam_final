<?php ob_start(); ?>
<a href="<?= url('associations') ?>">Retour</a>

<form action="<?= url('associations/save') ?>" method="post">

    <select name="id_conducteur" class="form-control">
        <?php foreach ($conducateurs as $conducteur): ?>
            <option value="<?= $conducteur->id_conducteur()?>"><?= $conducteur?></option>
        <?php endforeach; ?>
    </select>

    <select name="id_vehicule" class="form-control">
        <?php foreach ($vehicules as $vehicule): ?>
            <option value="<?= $vehicule->id_vehicule()?>"><?= $vehicule?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn btn-success">Ajouter un emprunt</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>