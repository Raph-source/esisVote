<?php
class SuperGlobal{
    public $post = [];
    public $get = [];

    /*cette méthode permet vérifier que les clés de la super global post exsites*/
    public function issetPost($arrayOfKeys):bool{
        $trouver = 0;
        $lenArray = count($arrayOfKeys);

        foreach($arrayOfKeys as $key){
            if(isset($_POST[$key])){
                $this->post[$key] = escapeshellcmd(htmlspecialchars($_POST[$key]));
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }
    /*cette méthode permet vérifier que les clés de la super global get exsites*/
    public function issetGet($arrayOfKeys):bool{
        $trouver = 0;
        $lenArray = count($arrayOfKeys);

        foreach($arrayOfKeys as $key){
            if(isset($_GET[$key])){
                $this->get[$key] = escapeshellcmd(htmlspecialchars($_GET[$key]));
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }

    /*cette méthode permet vérifier que les clés de la super global post ne soient pas vides*/
    public function noEmptyPost($arrayOfKeys):bool{
        $trouver = 0;
        $lenArray = count($arrayOfKeys);

        foreach($arrayOfKeys as $key){
            if(!empty($_POST[$key])){
                $this->post[$key] = escapeshellcmd(htmlspecialchars($_POST[$key]));
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }

    /*cette méthode permet vérifier que les clés de la super global get ne soient pas vides*/
    public function noEmptyGet($arrayOfKeys):bool{
        $trouver = 0;
        $lenArray = count($arrayOfKeys);

        foreach($arrayOfKeys as $key){
            if(!empty($_GET[$key])){
                $this->get[$key] = escapeshellcmd(htmlspecialchars($_GET[$key]));
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }
}
?>