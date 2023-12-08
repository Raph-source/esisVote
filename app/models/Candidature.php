<?php
class Candidature extends Model{
        //cette méthode retourne toute les candidature d'une promotion 
        public function getAllCandidatureByIdPromotion($idPromotion):array{
            $requete = $this->bdd->prepare("SELECT * FROM candidature AS c 
                INNER JOIN etudiant AS e ON c.idEtudiant = e.id
                WHERE e.idPromotion = :idPromotion");
            
            $requete->bindParam(":idPromotion", $idPromotion);
            
            $requete->execute();
    
            $trouver = $requete->fetchAll();
    
            return $trouver;
        }
        
        //cette méthode valide un candidat
        public function validerCandidat($idCandidature):void{
            $requete = $this->bdd->prepare("UPDATE candidature SET status = 1 
            WHERE id = :idCandidature");
            $requete->bindParam(":idCandidature", $idCandidature);
            $requete->execute();
    
            $requete = $this->bdd->prepare("INSERT voix(idCandidature) 
            VALUES(:idCandidature)");
            $requete->bindParam(":idCandidature", $idCandidature);
    
            $requete->execute();
        }
    
        //cette méthode supprime un candidat
        public function supprimerCandidat($idCandidature):void{
            $requete = $this->bdd->prepare("DELETE FROM vote 
            WHERE idCandidature = :idCandidature");
            $requete->bindParam(":idCandidature", $idCandidature);
            $requete->execute();
    
            $requete = $this->bdd->prepare("DELETE FROM voix 
            WHERE idCandidature = :idCandidature");
            $requete->bindParam(":idCandidature", $idCandidature);
            $requete->execute();
    
            $requete = $this->bdd->prepare("DELETE FROM candidature 
            WHERE id = :idCandidature");
            $requete->bindParam(":idCandidature", $idCandidature);
            $requete->execute();
        }

        public function getNumberCandidature($idPromotion):int{
            $requete = $this->bdd->prepare("SELECT * FROM cadidature AS c
            INNER JOIN etudiant AS e
            ON e.id = c.idEtudiant
            WHERE e.idPromotion = :idPromotion");

            $requete->bindParam(":idPromotion", $idPromotion);
            
            $trouver = $requete->fetchAll();

            return count($trouver);
        }
    
}