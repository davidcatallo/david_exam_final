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
        $this->setCouleur($couleur);
        $this->setImmatriculation($immatriculation);
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
        if (strlen($marque) == 0) {
            throw new Exception('La marque ne doit pas être nul.');
        }
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
        if (strlen($modele) == 0) {
            throw new Exception('Le modele ne doit pas être nul.');
        }
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
        if (strlen($couleur) == 0) {
            throw new Exception('La couleur ne doit pas être nul.');
        }
    
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
        if (strlen($immatriculation) == 0) {
            throw new Exception('L\'immatriculation ne doit pas être nul.');
        }
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
        $vehicules = [];
        foreach($datas as $data) {
            $vehicules[] = new Vehicule($data['marque'], $data['modele'], $data['couleur'], $data['immatriculation'], $data['id_vehicule']);
        }
        return $vehicules;
    }
    public function save() {
        $data = [
            "marque"                    => $this->marque(),
            "modele"                    => $this->modele(),
            "couleur"                   => $this->couleur(),
            "immatriculation"           => $this->immatriculation()
        ];
        if ($this->id_vehicule() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setIdVehicule($nouvelId);
        return $this;
    }
    public function update() {
        if ($this->id_vehicule > 0) {
            $data = [
                "marque"                    => $this->marque(),
                "modele"                    => $this->modele(),
                "couleur"                   => $this->couleur(),
                "immatriculation"           => $this->immatriculation(),
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
        // On supprime aussi tous les locations !
        Db::dbDelete(Association::TABLE_NAME, [
            'id_association' => $this->id_association()
        ]);
        return;
    }
}