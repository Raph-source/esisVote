<?php
    class SystemeController{
        private $superGlobal;

        public function __construct(){
            $this->superGlobal = new SuperGlobal();
        }
        //cette méthode permet de gérer les boutons de retour
        public function retour():void{
            if($this->superGlobal->issetGet(['url'])){
                $vers = $this->superGlobal->get['url'];

                if($vers == 'trouver1'){
                    require_once VIEW.'destination1.php';
                }
                else if($vers == 'trouver2'){
                    require_once VIEW.'destination2.php';
                }

            }
        }
        //cette méthode renvoi vers une page en d'erreur 404
        public function _404():void{
            require_once VIEW.'_404.php';
        }
    }
?>