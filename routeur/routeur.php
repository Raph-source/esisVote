<?php
    class Routeur{
        private $request;//l'url demandé

        //le tableau des URLs, controleurs et leurs méthodes
        private $allRequest;
       
        public function __construct($request){
            $this->request = $request;
            $this->allRequest = [
                'EtudiantController' => [
                    'index' => 'getAuth',
                    'autentification-etudiant'=> 'authentification',
                    'postuler' => 'getFormPostuler',
                    'candidatureetudiant' => 'postuler',
                    'voter' => 'getPageVoter',
                    'voixetudiant' => 'voter',
                    'voirResultat' => 'resultat',
                    'voirvideoetudiant' => 'voirVideo',
                    'voirprojet' => 'voirProjet'
                ],

                'CoordinationController' => [
                    'motCleCoord' => 'getAuth',
                    'voir-les-candidatures' => 'getCandidature',
                    'authentification-coordination' => 'authentification',
                    'valider-la-candidature'=> 'validerCandiature',
                    'supprimer-la-candidature'=> 'supprimerCandiature',
                    'lancer-les-candidatures' => 'getFormOrganiserCandidature',
                    'form-organiser-les-candidatures' => 'lancerCadidature',
                    'lancer-les-votes' => 'getFormLancerVote',
                    'lancement-vote' => 'lancerVote',
                    'publier-les-resultat' => 'publierResultat',
                    'l2' => 'choixGroupe',
                    'relancer-les-votes' => 'relancerVote',
                    'motdepasse' => 'getFormChangerMotDePasse',
                    'changermotdepasse' => 'changerMotDePasse',
                    'voirvideo'=> 'voirVideo',
                    'Dashboard'=> 'dashBord'
                ],

                'SystemeController' => [
                    '404' => '_404',
                    '_lock' => '_lock',
                    'retour' => 'retour'
                ]
            ];
        }
        //cette fonction renvoi au controleur demandé
        public function goToController(){
            //inclusion des controleurs
            require_once CONTROLLER.'SuperGlobal.php';
            require_once CONTROLLER.'EtudiantController.php';
            require_once CONTROLLER.'CoordinationController.php';
            require_once CONTROLLER.'SystemeController.php';

            //inclusion des models
            require_once MODEL.'Model.php';
            require_once MODEL.'Candidature.php';
            require_once MODEL.'Promotion.php';
            require_once MODEL.'Voix.php';
            require_once MODEL.'Vote.php';
            require_once MODEL.'Date.php';
            require_once MODEL.'Etudiant.php';
            require_once MODEL.'Coordination.php';


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
