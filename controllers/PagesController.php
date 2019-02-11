<?php

class PagesController {

    public function home() {

        view('pages.home');

    }


public function Divers() {
        echo "<hr>Afficher le nombre de conducteur.";
        var_dump(Divers::nombreConducteur());
        echo "<hr>Afficher le nombre de vehicules.";
        var_dump(Divers::nombreVehicule());
        echo "<hr>Afficher le nombre d'associations.";
        var_dump(Divers::nombreAssociation());
        echo "<hr>Afficher les véhicules n'ayant pas de conducteur.";
        var_dump(Divers::vehiculePasConducteur());
        echo "<hr>Afficher les conducteurs n'ayant pas de véhicules.";
        var_dump(Divers::ConducteurPasVehicule());
        echo "<hr>Afficher les véhicules d'un conducteur";
        var_dump(Divers::VehiculeUnConducteur());
        echo "<hr>Tous les conducteurs et vehicules";
        var_dump(Divers::tousLesConducteursPlusVehicules());
        echo "<hr>Tous les véhicules et conducteurs";
        var_dump(Divers::tousLesVehiculesPlusConducteurs());
    }
}