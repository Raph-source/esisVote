<?php
class Candidature extends Model{
    private $idEtudiant;
    private $projet;
    private $photo;
    private $video;

    public function setAttribut($idEtudiant, $projet, $photo, $video){
        $this->idEtudiant = $idEtudiant;
        $this->projet = $projet;
        $this->photo = $photo;
        $this->video = $video;
    }
    //cette méthode retourne toute les candidature d'une promotion 
    public function getAllCandidatureByIdPromotion($idPromotion):array{
        $requete = $this->bdd->prepare("SELECT e.nom AS nom, 
        e.postNom AS postNom,
        e.prenom AS prenom,
        e.idPromotion AS idPromotion,
        c.id AS idCandidature,
        c.idEtudiant AS idEtudiant,
        c.video AS video,
        c.photo AS photo,
        c.projet AS projet        
        FROM candidature AS c 
        INNER JOIN etudiant AS e ON c.idEtudiant = e.id
        WHERE e.idPromotion = :idPromotion");
        
        $requete->bindParam(":idPromotion", $idPromotion);
        
        $requete->execute();

        $trouver = $requete->fetchAll();

        return $trouver;
    }

    public function getAllCandidatureValidateByIdPromotion($idPromotion):array{
        $requete = $this->bdd->prepare("SELECT e.nom AS nom, 
        e.postNom AS postNom,
        e.prenom AS prenom,
        e.idPromotion AS idPromotion,
        c.id AS idCandidature,
        c.idEtudiant AS idEtudiant,
        c.video AS video,
        c.photo AS photo,
        c.projet AS projet        
        FROM candidature AS c 
        INNER JOIN etudiant AS e ON c.idEtudiant = e.id
        WHERE e.idPromotion = :idPromotion AND status = 1");
        
        $requete->bindParam(":idPromotion", $idPromotion);
        
        $requete->execute();

        $trouver = $requete->fetchAll();

        return $trouver;
    }
    public function getNombreCandidature($idPromotion):int{
        $requete = $this->bdd->prepare("SELECT * FROM candidature AS c
        INNER JOIN etudiant AS e
        ON c.idEtudiant = e.id
        WHERE e.idPromotion = :idPromotion");
        $requete->bindParam(":idPromotion", $idPromotion);
        $requete->execute();
        $trouver = $requete->fetchAll();

        return count($trouver);
    }

    public function getNombreValidateCandidature($idPromotion):int{
        $requete = $this->bdd->prepare("SELECT * FROM candidature AS c
        INNER JOIN etudiant AS e
        ON c.idEtudiant = e.id
        WHERE e.idPromotion = :idPromotion AND status = 1");
        $requete->bindParam(":idPromotion", $idPromotion);
        $requete->execute();
        $trouver = $requete->fetchAll();

        return count($trouver);
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
        $requete = $this->bdd->prepare("SELECT video, photo FROM candidature
        WHERE id = :idCandidature");
        
        $requete->bindParam(":idCandidature", $idCandidature);
        $requete->execute();
        $trouver = $requete->fetch();
        
        //suppression des fichier du dossier
      
        $pathVideo = str_replace(UPLOADS_LINK, UPLOADS_PATH, $trouver["video"]);
        $pathPhoto = str_replace(UPLOADS_LINK, UPLOADS_PATH, $trouver["photo"]);
        unlink($pathVideo);
        unlink($pathPhoto);

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
        $requete = $this->bdd->prepare("SELECT * FROM candidature AS c
        INNER JOIN etudiant AS e
        ON c.idEtudiant = e.id
        WHERE e.idPromotion = :idPromotion");

        $requete->bindParam(":idPromotion", $idPromotion);
        
        $trouver = $requete->fetchAll();

        return count($trouver);
    }
    
    public function delete($idPromotion):void{
    
        $trouver = Candidature::getAllCandidatureByIdPromotion($idPromotion);

        foreach($trouver as $candidature){
            $requete = $this->bdd->prepare("DELETE FROM candidature
            WHERE idEtudiant = :idEtudiant");
            $requete->bindParam(":idEtudiant", $candidature['idEtudiant']);
            $requete->execute();
        }
    }

    public function checkExistance():bool{
        $requete = $this->bdd->prepare('SELECT * FROM candidature
        WHERE idEtudiant = :idEtudiant');
        $requete->bindParam(':idEtudiant', $this->idEtudiant);
        $requete->execute();
        $trouver = $requete->fetchAll();

        if(count($trouver) != 0)
            return true;
        return false;
    }

    public function save():void{

        $requete = $this->bdd->prepare('INSERT INTO candidature
        (idEtudiant, projet, photo, video)
        VALUES(:idEtudiant, :projet, :photo, :video)');

        $requete->bindParam(':idEtudiant', $this->idEtudiant);
        $requete->bindParam(':projet', $this->projet);
        $requete->bindParam(':photo', $this->photo);
        $requete->bindParam(':video', $this->video);
        
        $requete->execute();
    }
}