<?php

class Conducteur extends Db {

    protected $id_conducteur;
    protected $prenom;
    protected $nom;

    const TABLE_NAME = 'conducteur';
    public function __construct($prenom, $nom, $id_conducteur = null) {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setIdConducteur($id_conducteur);
    }



    /**
     * Get the value of id_conducteur
     */ 
    public function id_conducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Get the value of prenom
     */ 
    public function prenom()
    {
        return $this->prenom;
    }

    /**
     * Get the value of nom
     */ 
    public function nom()
    {
        return $this->nom;
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

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }



    /**
     * CRUD Methods
     */
    public static function findOne(int $id_conducteur) {
        $data = Db::dbFind(self::TABLE_NAME, [
            ['id_conducteur', '=', $id_conducteur]
        ]);
        
        if(count($data) > 0) $data = $data[0];
        else return;
        $conducteur = new Conducteur($data['prenom'], $data['nom'], $data['id_conducteur']);
        return $conducteur;
    }
    public static function findAll() {
        $datas = Db::dbFind(self::TABLE_NAME);
        $conducteurs = [];
        foreach($datas as $data) {
            $conducteurs[] = new Conducteur($data['prenom'], $data['nom'], $data['id_conducteur']);
        }
        return $conducteurs;
    }
    public function save() {
        $data = [
            "prenom"        => $this->prenom(),
            "nom"           => $this->nom(),
        ];
        if ($this->id_conducteur() > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }
    public function update() {
        if ($this->id_conducteur > 0) {
            $data = [
                "prenom"                   => $this->prenom(),
                "nom"                       => $this->nom(),
                "id_conducteur"             => $this->id_conducteur()
            ];
            Db::dbUpdate(self::TABLE_NAME, $data, 'id_conducteur');
            return $this;
        }
        return;
    }
    public function delete() {
        $data = [
            'id_conducteur' => $this->id_conducteur(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);
        // On supprime aussi tous les emprunts !
        Db::dbDelete(Association::TABLE_NAME, [
            'id_association' => $this->id_association()
        ]);
        return;
    }
}