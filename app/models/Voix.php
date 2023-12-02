<?php
class Voix extends Model{
    //cette méthode retour les resultats de votes
    public function getResultatPromotion($idPromotion):array{
        $requete = $this->bdd->prepare('SELECT * FROM candidature AS c 
        INNER JOIN etudiant AS e
        ON c.idEtudiant = e.id
        INNER JOIN voix AS v
        ON v.idCandidature = c.id
        WHERE c.idPromotion = :idPromotion
        AND c.status = 1
        ORDER BY v.nombre DESC');
        
        $requete->bindParam(':idPromotion', $idPromotion);
        
        $requete->execute();
        return $requete->fetchAll();
    }
}