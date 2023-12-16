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
        AND c.status = 1 ORDER BY v.nombre DESC
        ');
        
        $requete->bindParam(':idPromotion', $idPromotion);
        
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getNumberVoix($idPromotion){
        $requete = $this->bdd->prepare("SELECT v.nombre AS nombre FROM voix AS v
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
        
        return $trouver;
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

    public function delete($trouver):void{
        foreach($trouver as $voix){
            $requete = $this->bdd->prepare("DELETE FROM voix
            WHERE idCandidature = :idCandidature");
            $requete->bindParam(":idCandidature", $voix['idCandidature']);
            $requete->execute();
        }
    }

    public function checkValidation($idCandidature):bool{
        $requete = $this->bdd->prepare("SELECT * FROM voix
        WHERE idCandidature = :idCandidature");
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();
        $trouver = $requete->fetchAll();

        if(count($trouver) > 0)
            return true;
        return false;
    }

    public function setVoix($idCandidature):void{
        $requete = $this->bdd->prepare("SELECT nombre FROM voix
        WHERE idCandidature = :idCandidature");
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();
        $trouver = $requete->fetch();

        $nombre = $trouver['nombre'];
        $nombre++;
        
        $requete = $this->bdd->prepare("UPDATE voix SET nombre = :nombre
        WHERE idCandidature = :idCandidature");
        $requete->bindParam(":nombre", $nombre);
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();
    }
}