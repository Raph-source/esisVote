<?php
class Etudiant extends Model{
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
        $requete = $this->bdd->prepare('SELECT * FROM etudiant 
        WHERE matricule = :matricule AND mdp = :password');

        $requete->bindParam(':matricule', $this->matricule);
        $requete->bindParam(':password', $this->password);
        $requete->execute();

        return $requete->fetch();
    }
    public function getIdCoord():int{
        $requete = $this->bdd->prepare('SELECT idpromotion FROM etudiant 
        WHERE matricule = :matricule AND mdp = :password');

        $requete->bindParam(':matricule', $this->matricule);
        $requete->bindParam(':password', $this->password);

        $requete->execute();
        $trouver = $requete->fetch();

        $idPromotion = $trouver['idpromotion'];

        $requete = $this->bdd->prepare('SELECT id FROM coordination WHERE idPromotion = :idPromotion');
        $requete->bindParam(':idPromotion', $idPromotion);

        $requete->execute();
        $trouver = $requete->fetch();

        $idCoordination = $trouver['id'];

        return $idCoordination;
    }
}