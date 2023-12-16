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

    public function checkVote($idEtudiant):bool{
        $requete = $this->bdd->prepare('SELECT * FROM vote
        WHERE idEtudiant = :idEtudiant');

        $requete->bindParam(':idEtudiant', $idEtudiant);
        $requete->execute();
        $trouver = $requete->fetchAll();

        if(count($trouver) == 0)
            return true;
        return false;
    }

    public function setVote($idEtudiant, $idCandidature):void{
        $requete = $this->bdd->prepare('INSERT INTO vote(idEtudiant, idCandidature)
        VALUES(:idEtudiant, :idCandidature)');
        $requete->bindParam(':idEtudiant', $idEtudiant);
        $requete->bindParam(':idCandidature', $idCandidature);
        $requete->execute();
    }
}