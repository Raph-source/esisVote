<?php
    class SystemeController{
        private $superGlobal;

        public function __construct(){
            $this->superGlobal = new SuperGlobal();
        }
        //cette méthode permet de gérer les boutons de retour
        public function retour():void{
            if($this->superGlobal->issetGet(['vers'])){
                $vers = $this->superGlobal->get['vers'];

                if($vers == 'authentification-coordination'){
                    require_once VIEW.'coordination/authentification.php';
                }
                else if($vers == 'les-dashboard-de-la-coordination'){
                    require_once VIEW.'coordination/dashboard.php';
                }
                else if($vers == 'choix-groupe'){
                    require_once VIEW.'coordination/choixGroupe.php';
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