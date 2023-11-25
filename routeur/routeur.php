<?php
    class Routeur{
        private $request;//l'url demandé

        //le tableau des URLs, controleurs et leurs méthodes
        private $allRequest;
       
        public function __construct($request){
            $this->request = $request;
            $this->allRequest = [
                'controllers' => [
                    'url' => 'methode'
                ],

                'SystemeController' => [
                    '404' => '_404',
                    'retour' => 'retour'
                ]
            ];
        }
        //cette fonction renvoi au controleur demandé
        public function goToController(){
            //inclusion des controleurs
            require_once CONTROLLER.'SystemeController.php';

            //inclusion des models
            require_once MODEL.'model.php';


            //instantiation du controleur et déclanchement de la méthode
            $_404 = false;
            foreach($this->allRequest as $controller => $url_controller){
                if(key_exists($this->request, $url_controller)){
                    $methode = $url_controller[$this->request];
                    $classeController = new $controller();//instantiation du controleur
                    $classeController->$methode();//déclanchement de la méthode
                    $_404 = true;

                    break;
                }
            }

            if(!$_404)
                header('Location: 404');
        }   
    }