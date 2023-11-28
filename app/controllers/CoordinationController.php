<?php
class CoordinationController{
    private $superGlobal;
    private $model;
    public function __construct(){
        $this->superGlobal = new SuperGlobal();
        $this->model = new Coordination();

    }

    public function getAuth():void{
        require_once VIEW.'coordination/authentification.php';
    }
    public function authentification():void{
        if(!isset($_SESSION)){
            session_start();
        }
        //véfication des champs
        if($this->superGlobal->noEmptyPost(['matricule', 'password'])){  
            $matricule = $this->superGlobal->post['matricule'];
            $password = $this->superGlobal->post['password'];
            
            //$coordination : l'instance d'une coordination
            $this->model->setAttribut($matricule, $password);

            //tester l'authentification
            if($this->model->authentification()){
                $idPromotion = $this->model->getIdPromotion();
                $_SESSION['idPromotion'] = $idPromotion;
                $_SESSION['idCoord'] = $this->model->getId();
                $_SESSION['matCoord'] = $this->model->getNom();
            
                require_once VIEW.'coordination/option.php';
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

    public function getDashboard():void{
        if(!isset($_SESSION)){
            session_start();
        }

        $trouver = $this->model->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);
        require_once VIEW.'coordination/dashboard.php';
    }

    public function validerCandiature():void{
        //verifer le paramètre
        if($this->superGlobal->noEmptyGet(['idCandidature'])){
            $idCandidature = intval($this->superGlobal->get['idCandidature']);
            
            $this->model->validerCandidat($idCandidature);

            if(!isset($_SESSION)){
                session_start();
            }
    
            $trouver = $this->model->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

            $notif = 'cadidature validée avec succès';
            require_once VIEW.'coordination/dashboard.php';
        }
        else{
            header('Location: _lock');
        }
    }

    public function supprimerCandiature():void{
        //verifer le paramètre
        if($this->superGlobal->noEmptyGet(['idCandidature'])){
            $idCandidature = intval($this->superGlobal->get['idCandidature']);
            
            $this->model->supprimerCandidat($idCandidature);

            if(!isset($_SESSION)){
                session_start();
            }
    
            $trouver = $this->model->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

            $notif = 'cadidature suprimée avec succès';
            require_once VIEW.'coordination/dashboard.php';
        }
        else{
            header('Location: _lock');
        }
    }
}