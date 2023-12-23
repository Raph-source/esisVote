<?php
    class SystemeController{
        private $superGlobal;
        private $coordination;
        private $etudiant;

        public function __construct(){
            $this->superGlobal = new SuperGlobal();
            $this->coordination = new CoordinationController();
            $this->etudiant = new EtudiantController();
        }
        //cette méthode permet de gérer les boutons de retour
        public function retour():void{
            if(!isset($_SESSION))
                session_start();

            if($this->superGlobal->issetGet(['vers'])){
                $vers = $this->superGlobal->get['vers'];
                if($vers == 'authentification-coordination'){
                    require_once VIEW.'coordination/authentification.php';
                }
                else if($vers == 'les-dashboard-de-la-coordination'){
                    if(isset($_SESSION['idPromotion']) && $_SESSION['idCoordination']){
                        $this->coordination->getDashboard($_SESSION['idPromotion'], '', $_SESSION['idCoordination']);
                    }
                    else{
                        $this->coordination->getAuth();
                    }
                }
                else if($vers == 'choix-groupe'){
                    require_once VIEW.'coordination/choixGroupe.php';
                }
                else if($vers == 'authentificationetudiant'){
                    require_once VIEW.'etudiant/authentification.php';
                }
                else if($vers == 'optionetudiant'){
                    if(isset($_SESSION['idPromotion'])){
                        $date = $this->etudiant->model->date->getAll($_SESSION['idPromotion']);
                        $resultatPublie = $this->etudiant->model->promotion->getResultatPublie($_SESSION['idPromotion']);
                        $resultatPublie = $resultatPublie['resultatPublie'];
                        $dateActuelle = date('Y-m-d H:i');
                        require_once VIEW.'etudiant/acceuil.php';
                    }
                    else{
                        $this->etudiant->getAuth();
                    }
                     
                }
                else if($vers == 'voirCandidatureCoordination'){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    if(isset($_SESSION['idPromotion'])){
                        $trouver = $this->coordination->model->candidature->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);
                        require_once VIEW.'coordination/candidature.php';
                    }
                    else{
                        $this->coordination->getAuth();
                    }
                }
                else if($vers = "voircandidature"){
                    $this->etudiant->getPageVoter();
                }
                else{
                    header('Location: 404');
                }

            }
        }
        //cette méthode renvoi vers une page en d'erreur 404
        public function _404():void{
            require_once VIEW.'_404.php';
        }

        //cette méthode block un user
        public function _lock():void{
            require_once VIEW.'_lock.php';
        }
    }
?>