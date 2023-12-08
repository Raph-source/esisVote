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
                
                //recuperation des dates et du status de publication des resultats
                $date = $this->model->date->getAll($data['idPromotion']);
                $resultatPublie = $this->model->promotion->getResultatPublie($data['idPromotion']);
                $resultatPublie = $resultatPublie['resultatPublie'];
                
                $dateActuelle = date('Y-m-d H:i');

                require_once VIEW.'etudiant/accueil.php';
            }
            else{
                $notif = "matricule ou mot de passe incorrect";
                require_once VIEW.'etudiant/authentification.php';
            }
        }
        else{
            $notif = "Pas des champ vide svp !!!";
            require_once VIEW.'etudiant/authentification.php';
        }
    }

    public function getFormPostuler(){
        if(!isset($_SESSION['idPromotion'])){
            $date = $this->model->date->getAll($_SESSION['idPromotion']);
            $dateActuelle = date('Y-m-d H:i');

            if($dateActuelle >= $date['debutCandidature'] && $dateActuelle <= $date['finCandidature']){
                require_once VIEW.'etudiant/postuler.php';
            }
            else{
                header('Location: _lock');
            }
        }
        else{
            EtudiantController::getAuth();
        }
    }
}