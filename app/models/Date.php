<?php
class Date extends Model{
    //recuperer toute les dates des elections
    public function getDateCandidatureAndVote($idPromotion):array{
        $requete = $this->bdd->prepare("SELECT * FROM date 
        WHERE idPromotion = :idPromotion");

        $requete->bindParam(":idPromotion", $idPromotion);
        $requete->execute();

        $trouver = $requete->fetchAll();

        return $trouver;
    }

    public function lancerCandidature($dateDebut, $dateFin, $idPromotion):void{
        if(Date::checkLancementCandidature($idPromotion)){
            $requete = $this->bdd->prepare('UPDATE date 
            SET debutCandidature = :debutCandidature, finCandidature = :finCandidature
            WHERE idPromotion = :idPromotion');

            $requete->bindParam(':debutCandidature', $dateDebut);
            $requete->bindParam(':finCandidature', $dateFin);
            $requete->bindParam(':idPromotion', $idPromotion);

            $requete->execute();
        }
        else{	
            $requete = $this->bdd->prepare('INSERT INTO date(debutCandidature, finCandidature, idPromotion)
            VALUES(:debutCandidature, :finCandidature, :idPromotion)');
            
            $requete->bindParam(':debutCandidature', $dateDebut);
            $requete->bindParam(':finCandidature', $dateFin);
            $requete->bindParam(':idPromotion', $idPromotion);
    
            $requete->execute();
        }
    }

    /*  cette methode vérifie si les candidatures d'une promotion sont lancées afin
    de savoir si il faut faire un UPDATE ou un INSERT
    */
    public function checkLancementCandidature($idPromotion):bool{
        $requete = $this->bdd->prepare('SELECT * FROM date 
        WHERE idPromotion = :idPromotion');
        $requete->bindParam(':idPromotion', $idPromotion);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
        
    }

    public function lancerVote($dateDebut, $dateFin, $idPromotion):bool{
        if(Date::checkLancementCandidature($idPromotion)){
            $requete = $this->bdd->prepare('UPDATE date 
            SET debutVote = :debutVote, finVote = :finVote
            WHERE idPromotion = :idPromotion');

            $requete->bindParam(':debutVote', $dateDebut);
            $requete->bindParam(':finVote', $dateFin);
            $requete->bindParam(':idPromotion', $idPromotion);

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
    public function checkLancementVote($idPromotion):bool{
        $requete = $this->bdd->prepare('SELECT * FROM date 
        WHERE debutVote IS NOT NULL
        AND finVote IS NOT NULL
        AND idPromotion = :idPromotion');
        $requete->bindParam(':idPromotion', $idPromotion);

        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
        
    }
    public function getAll($idPromotion):array{
        $requete = $this->bdd->prepare('SELECT * FROM date
        WHERE idPromotion = :idPromotion');
        $requete->bindParam(':idPromotion', $idPromotion);

        $requete->execute();

        return $requete->fetch();
    }

    public function getFinVote($idPromotion){
        $requete = $this->bdd->prepare('SELECT finVote FROM date
        WHERE idPromotion = :idPromotion');

        $requete->bindParam('idPromotion', $idPromotion);
        $requete->execute();
        return $requete->fetch();
    }

    public function delete($idPromotion):void{
        $requete = $this->bdd->prepare('DELETE FROM date
        WHERE idPromotion = :idPromotion');
        $requete->bindParam(':idPromotion', $idPromotion);
        $requete->execute();
    }
}