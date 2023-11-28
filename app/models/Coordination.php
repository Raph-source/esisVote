<?php
class Coordination extends Model{
    private $matricule;
    private $password;

    public function setAttribut($matricule, $password):void{
        $this->matricule = $matricule;
        $this->password = $password;
    }
    //véfirifier l'authentification
    public function authentification():bool{
        return $this->checkAuthentification(
            'coordination',
            ['matricule', 'pwd'],
            [$this->matricule, $this->password]);
    }

    public function getNom():string{
        $requete = $this->bdd->prepare('SELECT matricule FROM coordination WHERE matricule = ? AND pwd = ?');
        $requete->execute([$this->matricule, $this->password]);

        $trouver = $requete->fetch();

        return $trouver['matricule'];
    }

    public function getIdPromotion():int{
        $requete = $this->bdd->prepare('SELECT idPromotion FROM coordination 
        WHERE matricule = :matricule AND pwd = :password');

        $requete->bindParam(':matricule', $this->matricule);
        $requete->bindParam(':password', $this->password);

        $requete->execute();

        $trouver = $requete->fetch();

        return $trouver['idPromotion'];
    }
   
    public function getId():int{
        $requete = $this->bdd->prepare('SELECT id FROM coordination 
        WHERE matricule = :matricule AND pwd = :password');

        $requete->bindParam(':matricule', $this->matricule);
        $requete->bindParam(':password', $this->password);
        $requete->execute();

        $trouver = $requete->fetch();

        return $trouver['id'];
    }
}