<?php
class Coordination extends Model{
    private $pseudo;
    private $password;
    public $candidature;
    public $date;
    public $promotion;
    public $voix;
    public $vote;

    public function __construct(){
        parent::__construct();
        $this->candidature = new Candidature();
        $this->date = new Date();
        $this->promotion = new Promotion();
        $this->voix = new Voix();
        $this->vote = new Vote();
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

    public function deleteData($idPromotion):void{
        $trouver = $this->candidature->getAllCandidatureByIdPromotion($idPromotion);

        //suppression des données
        $this->voix->delete($trouver);
        $this->vote->delete($trouver);
        $this->date->delete($idPromotion);
        $this->candidature->delete($idPromotion);
        $this->promotion->setResultPublierFalse($idPromotion);
    }

    public function getNom($id):array{
        $requete = $this->bdd->prepare('SELECT pseudo FROM 
        coordination WHERE id = :id');
        $requete->bindParam(':id', $id);
        $requete->execute();

        return $requete->fetch();
    }

    public function checkPasseWord($oldMdp, $id):bool{
        $requete = $this->bdd->prepare('SELECT * FROM coordination
        WHERE mdp = :old AND id = :id');

        $requete->bindParam(':old', $oldMdp);
        $requete->bindParam(':id', $id);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) > 0)
            return true;
        return false;
    }

    public function changePasseWord($new, $idCoordination):void{
        $requete = $this->bdd->prepare('UPDATE coordination SET mdp = :new
        WHERE id = :id');

        $requete->bindParam(':new', $new);
        $requete->bindParam(':id', $idCoordination);

        $requete->execute();
    }

}