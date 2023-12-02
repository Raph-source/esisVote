<?php
class Etudiant extends Model{
    public $date;
    
    public function __construct(){
        parent::__construct();
        $this->date = new Date();
    }
    private $matricule;
    private $password;

    public function setAttribut($matricule, $password):void{
        $this->matricule = $matricule;
        $this->password = $password;
    }
    public function authentification():bool{
       return $this->checkAuthentification(
            'etudiant',
            ['matricule', 'mdp'],
            [$this->matricule, $this->password]);
    }

    //cette fonction retourne les données l'étudiant
    public function getData():array{
        $requete = $this->bdd->prepare('SELECT p.id AS idPromotion,
        e.prenom AS prenom,
        e.id AS idEtudiant,
        p.idCoordination AS idCoordination
        FROM etudiant AS e
        INNER JOIN promotion AS p
        ON e.idPromotion = p.id
        WHERE matricule = :matricule AND mdp = :password');

        $requete->bindParam(':matricule', $this->matricule);
        $requete->bindParam(':password', $this->password);

        $requete->execute();
        $trouver = $requete->fetch();

        return $trouver;
    }
}