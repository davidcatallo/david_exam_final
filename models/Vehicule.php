<?php

class Vehicule extends Db {

    protected $id_vehicule;
    protected $marque;
    protected $modele;
    protected $couleur;
    protected $immatriculation;

    const TABLE_NAME = 'vehicule';

    public function __construct($marque, $modele, $couleur, $immatriculation, $id_vehicule = null) {
        $this->setMarque($marque);
        $this->setModele($modele);
        $this->setCouleur($modele);
        $this->setImmatriculation($modele);
        $this->setIdVehicule($id_vehicule);
    }


    /**
     * Get the value of id_vehicule
     */ 
    public function id_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Get the value of marque
     */ 
    public function marque()
    {
        return $this->marque;
    }

    /**
     * Get the value of modele
     */ 
    public function modele()
    {
        return $this->modele;
    }

    /**
     * Get the value of couleur
     */ 
    public function couleur()
    {
        return $this->couleur;
    }

    /**
     * Get the value of immatriculation
     */ 
    public function immatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * Set the value of id_vehicule
     *
     * @return  self
     */ 
    public function setIdVehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Set the value of modele
     *
     * @return  self
     */ 
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */ 
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Set the value of immatriculation
     *
     * @return  self
     */ 
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }


    /**
     * CRUD Methods
     */
    public static function findOne(int $id_vehicule) {
        $data = Db::dbFind(self::TABLE_NAME, [
            ['id_vehicule', '=', $id_vehicule]
        ]);
        
        if(count($data) > 0) $data = $data[0];
        else return;
        $vehicule = new Vehicule($data['marque'], $data['modele'], $data['couleur'], $data['immatriculation'], $data['id_vehicule']);
        return $vehicule;
    }
    public static function findAll() {
        $datas = Db::dbFind(self::TABLE_NAME);
        $vehicule = [];
        foreach($datas as $data) {
            $vehicule[] = new Vehicule($data['marque'], $data['modele'], $data['couleur'], $data['immatriculation'], $data['id_vehicule']);
        }
        return $vehicule;
    }
    public function save() {
        $data = [
            "prenom"        => $this->prenom(),
            "nom"           => $this->nom(),
        ];
        if ($this->id_vehicule() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }
    public function update() {
        if ($this->id_vehicule > 0) {
            $data = [
                "prenom"                    => $this->prenom(),
                "nom"                       => $this->nom(),
                "id_vehicule"               => $this->id_vehicule()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data, 'id_vehicule');
            return $this;
        }
        return;
    }
    public function delete() {
        $data = [
            'id_vehicule' => $this->id_vehicule(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);
        // On supprime aussi tous les emprunts !
        Db::dbDelete(Association::TABLE_NAME, [
            'id_association' => $this->id_association()
        ]);
        return;
    }
}