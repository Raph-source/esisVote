<?php
class CoordinationController{
    private $superGlobal;

    public function __construct(){
        $this->superGlobal = new SuperGlobal();
    }

    public function getAuth():void{
        require_once VIEW.'coordination/authentification.php';
    }
    public function authentification():void{

        //véfication des champs
        if($this->superGlobal->noEmptyPost(['matricule', 'password'])){  
            $matricule = $this->superGlobal->post['matricule'];
            $password = $this->superGlobal->post['password'];
            
            //$coordination : l'instance d'une coordination
            $coordination = new Coordination();
            $coordination->setAttribut($matricule, $password);

            //tester l'authentification
            if($coordination->authentification()){
                $_SESSION['idPromo'] = $coordination->getIdPromotion();
                $_SESSION['idCoord'] = $coordination->getId();
                $_SESSION['matCoord'] = $coordination->getNom();

                require_once VIEW.'coordination/dashboard.php';
            }
            else{
                $notif = "matricule ou mot de passe incorrect";
                require_once VIEW.'coordination/authentification.php';
            }
        }
        else{
            $notif = "pas champ vide svp !!!";
            require_once VIEW.'coordination/authentification.php';
        }
            }
}