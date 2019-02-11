<?php


class Divers extends Db {
    // Afficher le nombre de conducteur.
    public static function nombreConducteur() {
        $req = 'SELECT COUNT(*)
                FROM conducteur';
        return Db::dbQuery($req);
    }
    // Afficher le nombre de vehicules.
    public static function nombreVehicule() {
        $req = 'SELECT COUNT(*)
                FROM conducteur';
        return Db::dbQuery($req);
    }
    // Afficher le nombre d'associations.
    public static function nombreAssociation() {
        $req = 'SELECT COUNT(*)
                FROM association_vehicule_conducteur';
        return Db::dbQuery($req);
    }
    // Afficher les véhicules n'ayant pas de conducteur.
    public static function vehiculePasConducteur() {
        $req = 'SELECT *
                FROM vehicule
                LEFT JOIN association_vehicule_conducteur ON association_vehicule_conducteur.id_vehicule = vehicule.id
                WHERE id_conducteur IS NULL';
        return Db::dbQuery($req);
    }

    // Afficher les conducteurs n'ayant pas de véhicules.
    public static function ConducteurPasVehicule() {
        $req = 'SELECT *
                FROM conducteur
                LEFT JOIN association_vehicule_conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id
                WHERE id_vehicule IS NULL';
        return Db::dbQuery($req);
    }
    // Afficher les véhicules pour un conducteur.
    public static function VehiculeUnConducteur() {
        $req = 'SELECT *
                FROM conducteur
                INNER JOIN association_vehicule_conducteur on association_vehicule_conducteur.id_conducteur = conducteur.id
                INNER JOIN association_vehicule_conducteur on association_vehicule_conducteur.id_vehicule = vehicule.id
                where prenom = "Philippe" AND nom = "Pandre"';
        return Db::dbQuery($req);
    }
    // Tous les conducteurs et vehicules
    public static function tousLesConducteursPlusVehicules() {
        $req = 'SELECT *
                FROM conducteur
                LEFT JOIN association_vehicule_conducteur ON conducteur.id = association_vehicule_conducteur.id_conducteur
                LEFT JOIN vehicule ON vehicule.id = association_vehicule_conducteur.id_vehicule';
        return Db::dbQuery($req);
    }
    //Tous les véhicules et conducteurs
    public static function tousLesVehiculesPlusConducteurs() {
        $req = 'SELECT *
                FROM conducteur
                RIGHT JOIN association_vehicule_conducteur ON conducteur.id = association_vehicule_conducteur.id_conducteur
                RIGHT JOIN vehicule ON vehicule.id = association_vehicule_conducteur.id_vehicule';
        return Db::dbQuery($req);
    }


}

