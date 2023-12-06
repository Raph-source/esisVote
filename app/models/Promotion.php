<?php
class Promotion extends Model{
    //cette méthode met le à true la pulication des resultats
    public function setResultPublierTrue($idPromotion):void{
        $requete = $this->bdd->prepare('UPDATE promotion 
        SET resultatPublie = true
        WHERE idpromotion = :idpromotion');

        $requete->bindParam(':idpromotion', $idPromotion);
        $requete->execute();
    }

    public function getIdPromotion($nom):array{
        $requete = $this->bdd->prepare('SELECT id FROM promotion
        WHERE nom = :nom');
        $requete->bindParam(':nom', $nom);
        $requete->execute();    

        return $requete->fetch();
    }

    public function getResultatPublie($idPromotion):array{
        $requete = $this->bdd->prepare('SELECT resultatPublie FROM promotion
        WHERE id = :idPromotion');
        $requete->bindParam(':idPromotion', $idPromotion);
        $requete->execute();    

        return $requete->fetch();
    }
}