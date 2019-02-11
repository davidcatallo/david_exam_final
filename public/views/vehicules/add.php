<?php ob_start(); ?>

<a href="<?= url('vehicules') ?>">Retour</a>


<form action="<?= url('vehicules/save') ?>" method="post">

    <input type="hidden" name="id_vehicule"     value="<?= (isset($vehicule)) ? $vehicule->id_vehicule() : '' ?>">
    <input type="text"   name="marque" value="<?= (isset($vehicule)) ? $vehicule->marque() : '' ?>" placeholder="marque" class="form-control">
    <input type="text"   name="modele"    value="<?= (isset($vehicule)) ? $vehicule->modele() : '' ?>"    placeholder="modele"    class="form-control">
    <input type="text"   name="couleur" value="<?= (isset($vehicule)) ? $vehicule->couleur() : '' ?>" placeholder="couleur" class="form-control">
    <input type="text"   name="immatriculation"    value="<?= (isset($vehicule)) ? $vehicule->immatriculation() : '' ?>"    placeholder="immatriculation"    class="form-control">
   
    <button type="submit" class="btn btn-<?= (isset($vehicule)) ? 'warning' : 'success' ?>">
        <?= (isset($vehicule)) ? 'Editer' : 'Créer' ?> un véhicule
    </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>