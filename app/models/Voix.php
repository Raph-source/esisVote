<?php
class Voix extends Model{
    //cette méthode retour les resultats de votes
    public function getResultatPromotion($idPromotion):array{
        $requete = $this->bdd->prepare('SELECT * FROM candidature AS c 
        INNER JOIN etudiant AS e
        ON c.idEtudiant = e.id
        INNER JOIN voix AS v
        ON v.idCandidature = c.id
        WHERE e.idPromotion = :idPromotion
        AND c.status = 1
        ORDER BY v.nombre DESC');
        
        $requete->bindParam(':idPromotion', $idPromotion);
        
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getNumberVoix($idPromotion):int{
        $requete = $this->bdd->prepare("SELECT * FROM voix AS v
        INNER JOIN candidature AS c
        ON v.idCandidature = c.id
        INNER JOIN etudiant AS e
        ON e.id = c.idEtudiant
        INNER JOIN promotion AS p
        ON p.id = e.idPromotion
        WHERE p.id = :idPromotion");

        $requete->bindParam(":idPromotion", $idPromotion);
        $requete->execute();
        $trouver = $requete->fetchAll();

        return count($trouver);
    }

    public function getVoixGagnant($idPromotion){
        $requete = $this->bdd->prepare("SELECT nombre FROM voix AS v
        INNER JOIN candidature AS c
        ON v.idCandidature = c.id
        INNER JOIN etudiant AS e
        ON e.id = c.idEtudiant
        INNER JOIN promotion AS p
        ON p.id = e.idPromotion
        WHERE p.id = :idPromotion
        ORDER BY nombre DESC");

        $requete->bindParam(":idPromotion", $idPromotion);
        $requete->execute();

        return $requete->fetch();
    }
}