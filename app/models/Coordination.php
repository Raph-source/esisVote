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

    //cette méthode retourne toute les candidature d'une promotion 
    public function getAllCandidatureByIdPromotion($idPromotion):array{
        $requete = $this->bdd->prepare("SELECT * FROM candidat AS c 
            INNER JOIN etudiant AS e ON c.idetudiant = e.idetudiant
            INNER JOIN promotion AS p ON c.idpromotion = p.idpromotion
            WHERE c.idpromotion = :idpromotion AND c.typeCandidature = 'promotionnel'");
        
        $requete->bindParam(":idpromotion", $idPromotion);
        
        $requete->execute();

        $trouver = $requete->fetchAll();

        return $trouver;
    }
    
    //cette méthode valide un candidat
    public function validerCandidat($idCandidature):void{
        $requete = $this->bdd->prepare("UPDATE candidat SET status = 1 
        WHERE idcandidature = :idcandidature");
        $requete->bindParam(":idcandidature", $idCandidature);
        $requete->execute();

        $requete = $this->bdd->prepare("INSERT resultat(idcandidature) 
        VALUES(:idcandidature)");
        $requete->bindParam(":idcandidature", $idCandidature);

        $requete->execute();
    }

    //cette méthode supprime un candidat
    public function supprimerCandidat($idCandidature):void{
        $requete = $this->bdd->prepare("DELETE FROM vote 
        WHERE idCandidature = :idCandidature");
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();

        $requete = $this->bdd->prepare("DELETE FROM resultat 
        WHERE idcandidature = :idCandidature");
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();

        $requete = $this->bdd->prepare("DELETE FROM candidat 
        WHERE idcandidature = :idCandidature");
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();
    }

    //recuperer toute les dates des elections
    public function getDateCandidatureAndVote($idCoordination):array{
        $requete = $this->bdd->prepare("SELECT * FROM election 
        WHERE idCoordination = :idCoordination");

        $requete->bindParam(":idCoordination", $idCoordination);
        $requete->execute();

        $trouver = $requete->fetchAll();
        return $trouver;
    }
}