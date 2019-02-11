<?php

class Association extends Db {

    protected $id_association;
    protected $id_vehicule;
    protected $id_conducteur;

    const TABLE_NAME = 'association_vehicule_conducteur';
    public function __construct($id_vehicule, $id_conducteur, $id_association = null) {
        $this->setIdVehicule($id_vehicule);
        $this->setIdConducteur($id_conducteur);
        $this->setIdAssociation($id_association);
    }

    /**
     * Get the value of id_association
     */ 
    public function id_association()
    {
        return $this->id_association;
    }

    /**
     * Get the value of id_vehicule
     */ 
    public function id_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Get the value of id_conducteur
     */ 
    public function id_conducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Set the value of id_association
     *
     * @return  self
     */ 
    public function setIdAssociation($id_association)
    {
        $this->id_association = $id_association;

        return $this;
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
     * Set the value of id_conducteur
     *
     * @return  self
     */ 
    public function setIdConducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }

    
    public static function findOne(int $id) {
        $data = Db::dbFind(self::TABLE_NAME, [
            ['id_association' => $id]
        ]);
        if(count($data) > 0) $data = $data[0];
        else return;
        $association = new Association($data['id_vehicule'], $data['id_conducteur'], $data['id_association']);
        return $association;
    }
    public static function findAll() {
        $datas = Db::dbFind(self::TABLE_NAME);
        $association = [];
        foreach($datas as $data) {
            $association[] = new Association($data['id_vehicule'], $data['id_conducteur'], $data['id_association']);
        }
        return $association;
    }
    public function save() {
        $data = [
            "id_vehicule"     => $this->id_vehicule(),
            "id_conducteur"    => $this->id_conducteur(),
        ];
        if ($this->id_association() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }
    public function update() {
        if ($this->id_association > 0) {
            $data = [
                "id_vehicule"           => $this->id_vehicule(),
                "id_conducteur"         => $this->id_conducteur(),
                "id_association"        => $this->id_association()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data, 'id_association');
            return $this;
        }
        return;
    }
    public function delete() {
        $data = [
            'id_association' => $this->id_association(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);
        // On supprime aussi toute les associations !
        Db::dbDelete(Association::TABLE_NAME, [
            'id_conducteur' => $this->id_conducteur()
        ]);
        return;
    }
    public function conducteur() {
        return Conducteur::findOne($this->id_conducteur());
    }
    public function vehicule() {
        return Vehicule::findOne($this->id_vehicule());
    }
}