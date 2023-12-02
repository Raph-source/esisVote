<?php
class EtudiantController{
    private $superGlobal;
    private $model;

    public function __construct(){
        $this->superGlobal = new SuperGlobal();
        $this->model = new Etudiant();
    }
    public function getAuth(){
        require_once VIEW.'etudiant/authentification.php';
    }

    public function authentification(){
        if($this->superGlobal->noEmptyPost(['matricule', 'password'])){  
            $matricule = $this->superGlobal->post['matricule'];
            $password = $this->superGlobal->post['password'];
            
            $this->model->setAttribut($matricule, $password);

            //verification de l'authentification de l'étudiant
            if ($this->model->authentification()){

                $data = $this->model->getData();

                //mise de données en session 
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['idEtudiant'] = $data['idEtudiant'];
                $_SESSION['idPromotion'] = $data['idPromotion'];      
                $_SESSION['idCoordination'] = $data['idCoordination'];    
                
                //recuperation des dates
                $date = $this->model->date->getAll($data['idPromotion']);
                
                require_once VIEW.'etudiant/accueil.php';
            }
            else
            {
                $notif = "matricule ou mot de passe incorrect";
                require_once VIEW.'etudiant/authentification.php';
            }
        }
        else{
            $notif = "Pas des champ vide svp !!!";
            require_once VIEW.'etudiant/authentification.php';
        }
    }
}