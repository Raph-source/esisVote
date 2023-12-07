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
                    $this->coordination->getDashboard($_SESSION['idPromotion'], '');
                }
                else if($vers == 'choix-groupe'){
                    require_once VIEW.'coordination/choixGroupe.php';
                }
                else if($vers == 'authentification etudiant'){
                    require_once VIEW.'etudiant/authentification.php';
                }
                else if($vers == 'option etuddiant'){
                    $date = $this->etudiant->model->date->getAll($_SESSION['idPromotion']);
                    $dateActuelle = date('Y-m-d H:i');

                    require_once VIEW.'etudiant/accueil.php'; 
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