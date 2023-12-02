<?php
class Coordination extends Model{
    private $pseudo;
    private $password;
    public $candidature;
    public $date;
    public $promotion;

    public function __construct(){
        parent::__construct();
        $this->candidature = new Candidature();
        $this->date = new Date();
        $this->promotion = new Promotion();
    }
    public function setAttribut($pseudo, $password):void{
        $this->pseudo = $pseudo;
        $this->password = $password;
    }
    //véfirifier l'authentification
    public function authentification():bool{
        return $this->checkAuthentification(
            'coordination',
            ['pseudo', 'mdp'],
            [$this->pseudo, $this->password]);
    }

    public function getData():array{
        $requete = $this->bdd->prepare('SELECT p.id AS idPromotion,
        c.id AS idCoordination,
        c.pseudo AS pseudo
        FROM coordination AS c
        INNER JOIN promotion AS p
        ON c.id = p.idCoordination
        WHERE c.pseudo = :pseudo AND c.mdp = :password');

        $requete->bindParam(':pseudo', $this->pseudo);
        $requete->bindParam(':password', $this->password);

        $requete->execute();

        $trouver = $requete->fetch();

        return $trouver;
    }

}