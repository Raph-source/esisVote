<?php
class Model{
    protected $bdd;

    public function __construct(){
        //connexion à la bdd mysql
        $this->bdd = new PDO("mysql:host=68.65.122.152;dbname=esislqpm_esisvote", "esislqpm_raph", "aSaB1ew__y4N");
    }

    //cette méthode permet gérer l'authentification
    public function checkAuthentification($table, $collones, $tableauValeurs):bool{
        /**
         * $table: la table qui les données cherchées
         * $collones: le tableau qui contient les champs cherchés
         * $tableauValeurs: le tableau qui contient les valeurs
        */

        $champs = " ";
        
        //mise en place des champs de la clause where
        foreach($collones as $champ){
            $champs .= ($champ.' = :'.$champ.' AND ');
        }
        
        $champs = substr($champs, 0, -5); //suppression du dernier AND

        //la requete
        $requete = $this->bdd->prepare("SELECT * FROM ".$table." WHERE".$champs);

        //lier les valeurs au champs
        $valeur = 0;
        foreach($collones as $champ){
            $requete->bindParam(':'.$champ, $tableauValeurs[$valeur]);
            
            $valeur++;
        }

        $requete->execute();
        $trouver = $requete->fetchAll();

        //retourn true si l'authentification réussi et false sinon
        if(count($trouver) != 0)
            return true;
        return false;
    }
}

