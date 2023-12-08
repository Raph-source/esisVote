<?php
class Vote extends Model{
    public function delete($trouver):void{
        foreach($trouver as $voix){
            $requete = $this->bdd->prepare("DELETE FROM vote
            WHERE idEtudiant = :idEtudiant");
            $requete->bindParam(":idEtudiant", $voix['idEtudiant']);
            $requete->execute();
        }
    }
}