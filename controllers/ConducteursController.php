<?php
class ConducteursController {
    public function indexAdd() {
        $conducteurs = Conducteur::findAll();
        view('conducteurs.indexAdd', compact('conducteurs'));
    }
    public function show($id) {
        $conducteur = Conducteur::findOne($id);
        view('conducteurs.show', compact('conducteur'));
    }

    public function save() {
        $conducteur = new Conducteur($_POST['prenom'], $_POST['nom'], $_POST['id_conducteur']);
        $conducteur->save();
        Header('Location: '. url('conducteurs'));
        exit();
    }
    public function edit($id) {
        $conducteur = Conducteur::findOne($id);
        view('conducteurs.indexAdd', compact('conducteurs'));
    }
    public function delete($id) {
        $conducteur = Conducteur::findOne($id);
        $conducteur->delete();
        Header('Location: '. url('conducteurs'));
    }   
}