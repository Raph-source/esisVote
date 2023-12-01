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

    public function lancerCandidature($dateDebut, $dateFin, $idCoordination):void{
        if(Coordination::checkLancementCandidature($idCoordination)){
            $requete = $this->bdd->prepare('UPDATE election 
            SET date_debut = :date_debut, date_fin = :date_fin
            WHERE idCoordination = :idCoordination');

            $requete->bindParam(':date_debut', $dateDebut);
            $requete->bindParam(':date_fin', $dateFin);
            $requete->bindParam(':idCoordination', $idCoordination);

            $requete->execute();
        }
        else{	
            $requete = $this->bdd->prepare('INSERT INTO election(date_debut, date_fin, idCoordination)
            VALUES(:date_debut, :date_fin, :idCoordination)');
            
            $requete->bindParam(':date_debut', $dateDebut);
            $requete->bindParam(':date_fin', $dateFin);
            $requete->bindParam(':idCoordination', $idCoordination);
    
            $requete->execute();
        }
    }

    /*  cette methode vérifie si les candidatures d'une promotion sont lancées afin
    de savoir si il faut faire un UPDATE ou un INSERT
    */
    public function checkLancementCandidature($idCoordination):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election WHERE idCoordination = :idCoordination');
        $requete->bindParam(':idCoordination', $idCoordination);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
        
    }

    public function lancerVote($dateDebut, $dateFin, $idCoordination):bool{
        if(Coordination::checkLancementCandidature($idCoordination)){
            $requete = $this->bdd->prepare('UPDATE election 
            SET dateDebutVote = :dateDebutVote, dateFinVote = :dateFinVote
            WHERE idCoordination = :idCoordination');

            $requete->bindParam(':dateDebutVote', $dateDebut);
            $requete->bindParam(':dateFinVote', $dateFin);
            $requete->bindParam(':idCoordination', $idCoordination);

            $requete->execute();

            return true;
        }
        else{	
            return false;
        }
    }
    /*cette methode vérifie si les votes d'une promotion sont lancés afin
    de savoir si il faut faire un UPDATE ou un INSERT
    */
    public function checkLancementVote($idCoordination):bool{
        $requete = $this->bdd->prepare('SELECT * FROM election 
        WHERE dateDebutVote IS NOT NULL
        AND dateFinVote IS NOT NULL
        AND idCoordination = :idCoordination');
        $requete->bindParam(':idCoordination', $idCoordination);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
        
    }

    //cette méthode retour les resultats de votes
    public function getResultatPromotion($idPromotion):array
    {
        $requete = $this->bdd->prepare('SELECT * FROM candidat AS c 
        INNER JOIN etudiant AS e
        ON c.idetudiant = e.idetudiant
        INNER JOIN promotion AS p
        ON e.idpromotion = p.idpromotion
        INNER JOIN resultat AS r
        ON c.idcandidature = r.idcandidature
        WHERE c.idpromotion = :idPormotion
        AND c.status = 1 AND c.typeCandidature = "promotionnel"
        ORDER BY r.nombreVoix DESC');
        $requete->bindParam(':idPormotion', $idPromotion);
        
        $requete->execute();
        return $requete->fetchAll();
    }

    //cette méthode met le à true la pulication des resultats
    public function setResultPublierTrue($idPromotion):void{
        $requete = $this->bdd->prepare('UPDATE promotion 
        SET resultatPublier = true
        WHERE idpromotion = :idpromotion');

        $requete->bindParam(':idpromotion', $idPromotion);
        $requete->execute();
    }

    //verifie la fin de vote
    public function getFinVote($idCoordination):array{
        $requete = $this->bdd->prepare('SELECT dateFinVote FROM election
        WHERE idCoordination = :idCoordination');
        $requete->bindParam(':idCoordination', $idCoordination);

        $requete->execute();

        return $requete->fetch();
    }

}