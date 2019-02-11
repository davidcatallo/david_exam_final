<?php
class AssociationsController {
    public function index() {
        $associations = Association::findAll();
        view('Associations.index', compact('Associations'));
    }
    public function add() {
        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicule::findAll();
        view('Associations.add', compact('conducteurs', 'vehicules'));
    }
    public function save() {
        $association = new Association($_POST['id_conducteur'], $_POST['id_vehicule'], $_POST['id_association']);
        $association->save();
        Header('Location: '. url('associations'));
        exit();
    }
}