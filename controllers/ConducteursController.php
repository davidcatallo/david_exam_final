<?php
class ConducteursController {
    public function indexAdd() {
        $abonnes = Conducteur::findAll();
        view('conducteurs.index', compact('conducteurs'));
    }
    public function show($id) {
        $abonne = Conducteur::findOne($id);
        view('conducteurs.show', compact('conducteur'));
    }

    public function save() {
        $abonne = new Conducteur($_POST['prenom'], $_POST['nom'], $_POST['id_conducteur']);
        $abonne->save();
        Header('Location: '. url('conducteurs'));
        exit();
    }
    public function edit($id) {
        $abonne = Conducteur::findOne($id);
        view('conducteurs.index', compact('conducteurs'));
    }
    public function delete($id) {
        $abonne = Conducteur::findOne($id);
        $abonne->delete();
        Header('Location: '. url('conducteurs'));
    }   
}