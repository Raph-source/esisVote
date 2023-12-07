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
        if($this->superGlobal->noEmptyPost(['pseudo', 'password'])){  
            $pseudo = $this->superGlobal->post['pseudo'];
            $password = $this->superGlobal->post['password'];
            
            //$coordination : l'instance d'une coordination
            $this->model->setAttribut($pseudo, $password);

            //tester l'authentification
            if($this->model->authentification()){
                $trouver = $this->model->getData();

                $idPromotion = $trouver['idPromotion'];
                $idCoordination = $trouver['idCoordination'];

                $_SESSION['idPromotion'] = $idPromotion;
                $_SESSION['idCoordination'] = $idCoordination;
                $_SESSION['pseudo'] = $trouver['pseudo'];
                                
                if($idCoordination == 2){
                    require_once VIEW.'coordination/choixGroupe.php';
                }
                else{
                    CoordinationController::getDashboard($idPromotion, '');
                }
                
            }
            else{
                $notif = "pseudo ou mot de passe incorrect";
                require_once VIEW.'coordination/authentification.php';
            }
        }
        else{
            $notif = "pas champ vide svp !!!";
            require_once VIEW.'coordination/authentification.php';
        }
    }

    public function choixGroupe():void{
        if(!isset($_SESSION))
            session_start();

        if($this->superGlobal->noEmptyGet(['groupe'])){
            $groupe = $this->superGlobal->get['groupe'];

            if($groupe == 'L2 A' || $groupe == 'L2 B'){
                $trouver = $this->model->promotion->getIdPromotion($groupe);
                $_SESSION['idPromotion'] = $trouver['id'];

                CoordinationController::getDashboard($_SESSION['idPromotion'], '');
            }
            else{
                header('Location: _404');
            }
        }
        else{
            header('Location: _404');
        }
    }

    public function getCandidature():void{
        if(!isset($_SESSION)){
            session_start();
        }

        $trouver = $this->model->candidature->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);
        require_once VIEW.'coordination/candidature.php';
    }

    public function validerCandiature():void{
        //verifer le paramètre  
        if($this->superGlobal->noEmptyGet(['idCandidature'])){
            $idCandidature = intval($this->superGlobal->get['idCandidature']);
            
            $this->model->candidature->validerCandidat($idCandidature);

            if(!isset($_SESSION)){
                session_start();
            }
            
            if(isset($_SESSION['idPromotion'])){
                $trouver = $this->model->candidature->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

                $notif = 'cadidature validée avec succès';
                CoordinationController::getDashboard($_SESSION['idPromotion'], $notif);
            }
            else{
                CoordinationController::getAuth();
            }
        }
        else{
            header('Location: _lock');
        }
    }

    public function supprimerCandiature():void{
        if(!isset($_SESSION)){
            session_start();
        }
        
        //verifer le paramètre
        if($this->superGlobal->noEmptyGet(['idCandidature'])){
            $idCandidature = intval($this->superGlobal->get['idCandidature']);
            
            $this->model->candidature->supprimerCandidat($idCandidature);



            if(isset($_SESSION['idPromotion'])){
                $trouver = $this->model->candidature->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

                $notif = 'cadidature suprimée avec succès';

                CoordinationController::getDashboard($_SESSION['idPromotion'], $notif);
            }
            else{
                CoordinationController::getAuth();
            }
            $trouver = $this->model->candidature->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

            $notif = 'cadidature suprimée avec succès';

            CoordinationController::getDashboard($_SESSION['idPromotion'], $notif);
            require_once VIEW.'coordination/dashboard.php';
        }
        else{
            header('Location: _lock');
        }
    }

    public function getFormOrganiserCandidature():void{
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['idPromotion'])){
            $idPromotion = $_SESSION['idPromotion'];
            //verifier les votes ne sont pas lancés
            if(!$this->model->date->checkLancementVote($idPromotion)){
                CoordinationController::getOrganiserElection('');
            }
            else{
                $notif = "les votes ont été lancés il n'est plus possible de lancer le candidature";
                
                CoordinationController::getDashboard($_SESSION['idPromotion'], $notif);
            }
        }
        else{
            CoordinationController::getAuth();
        }
    }

    public function lancerCadidature():void{
        if(!isset($_SESSION)){
            session_start();
        }
        //vériication des champs du formulaire
        if($this->superGlobal->noEmptyPost(['dateDebutCandidature', 'dateFinCandidature'])){
            //recuperation des données du formulaire
            $dateDebutCandidature = $this->superGlobal->post['dateDebutCandidature'];
            $dateFinCandidature = $this->superGlobal->post['dateFinCandidature'];

            $dateDebutCandidature = str_replace('T', ' ', $dateDebutCandidature);
            $dateFinCandidature = str_replace('T', ' ', $dateFinCandidature);
            $dateActuelle = date('Y-m-d H:i');

            if($dateDebutCandidature >= $dateActuelle){
                if($dateDebutCandidature < $dateFinCandidature){

                    if(isset($_SESSION['idPromotion'])){
                        //enregister les dates
                        $idPromotion = $_SESSION['idPromotion'];
                        $this->model->date->lancerCandidature($dateDebutCandidature, $dateFinCandidature, $idPromotion);
                        
                        $notif = "les candidatures ont été lancées";
                        
                        $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);

                        CoordinationController::getOrganiserElection($notif);
                        
                    }
                    else{
                        CoordinationController::getAuth();
                    }                
                }
                else{
                    $notif = "la date de début doit être supérieur à la date de fin";

                }
            }
            else{
                $notif = "la date de début doit être supérieur ou égal à la date actuelle";
                CoordinationController::getOrganiserElection($notif);   
            }
        }
        else{
            $notif = "pas de champs vide svp !!!";
            CoordinationController::getOrganiserElection($notif);
        }
    }

    public function getFormLancerVote():void{
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['idPromotion'])){
            $idPromotion = $_SESSION['idPromotion'];
            $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
    
            require_once VIEW.'coordination/lancerVote.php';
        }
        else{
            CoordinationController::getAuth();
        }
    }

    public function lancerVote():void{
        if(!isset($_SESSION)){
            session_start();
        }
        if($this->superGlobal->noEmptyPost(['debutVote', 'finVote'])){
            $debutVote = $this->superGlobal->post['debutVote'];
            $finVote = $this->superGlobal->post['finVote'];

            $debutVote = str_replace('T', ' ', $debutVote);
            $finVote = str_replace('T', ' ', $finVote);

            //récuperation de la date de fin de condidatures
            if(isset($_SESSION['idPromotion'])){
                $idPromotion = $_SESSION['idPromotion'];

                if($debutVote < $finVote){
                    if($this->model->date->checkLancementCandidature($idPromotion)){
                        $date = $this->model->date->getDateCandidatureAndVote($idPromotion);
                
                        $finCandidature = $date[0]['finCandidature'];
                        if($debutVote > $finCandidature){
                            if($this->model->date->lancerVote($debutVote, $finVote, $idPromotion)){
                                $notif = "les votes ont été lancées";
                                
                                if(isset($_SESSION['idPromotion'])){
                                    $idPromotion = $_SESSION['idPromotion'];
                                    $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                            
                                    require_once VIEW.'coordination/lancerVote.php';
                                }
                                else{
                                    CoordinationController::getAuth();
                                }
                            }
                            else{
                                $notif = "veuillez lancer les candidatures avant de lancer les votes";
                                
                                if(isset($_SESSION['idPromotion'])){
                                    $idPromotion = $_SESSION['idPromotion'];
                                    $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                                    require_once VIEW.'coordination/lancerVote.php';
                                }
                                else{
                                    CoordinationController::getAuth();
                                }
                            }
                        }
                        else{
                            $notif = "la date de début vote doit supérieure à la date de fin des candidatures";
                            if(isset($_SESSION['idPromotion'])){
                                $idPromotion = $_SESSION['idPromotion'];
                                $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                                require_once VIEW.'coordination/lancerVote.php';
                            }
                            else{
                                CoordinationController::getAuth();
                            }                    
                        }                    
                        $date = $this->model->date->getDateCandidatureAndVote($idPromotion);
                
                        $finCandidature = $date[0]['finCandidature'];
                        if($debutVote > $finCandidature){
                            if($this->model->date->lancerVote($debutVote, $finVote, $idPromotion)){
                                $notif = "les votes ont été lancées";
                                
                                if(isset($_SESSION['idPromotion'])){
                                    $idPromotion = $_SESSION['idPromotion'];
                                    $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                            
                                    require_once VIEW.'coordination/lancerVote.php';
                                }
                                else{
                                    CoordinationController::getAuth();
                                }
                            }
                            else{
                                $notif = "veuillez lancer les candidatures avant de lancer les votes";
                                
                                if(isset($_SESSION['idPromotion'])){
                                    $idPromotion = $_SESSION['idPromotion'];
                                    $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                                    require_once VIEW.'coordination/lancerVote.php';
                                }
                                else{
                                    CoordinationController::getAuth();
                                }
                            }
                        }
                        else{
                            $notif = "la date de début vote doit supérieure à la date de fin des candidatures";
                            if(isset($_SESSION['idPromotion'])){
                                $idPromotion = $_SESSION['idPromotion'];
                                $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                                require_once VIEW.'coordination/lancerVote.php';
                            }
                            else{
                                CoordinationController::getAuth();
                            }                    
                        }
                    }
                    else{
                        $notif = "les candidature n'ont encore été lancée";
                        if(isset($_SESSION['idPromotion'])){
                            $idPromotion = $_SESSION['idPromotion'];
                            $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                            require_once VIEW.'coordination/lancerVote.php';
                        }
                        else{
                            CoordinationController::getAuth();
                        }
                    }

                }
                else{
                    $notif = "la date de début doit inférieure à la date de fin";
                    if(isset($_SESSION['idPromotion'])){
                        $idPromotion = $_SESSION['idPromotion'];
                        $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                        require_once VIEW.'coordination/lancerVote.php';
                    }
                    else{
                        CoordinationController::getAuth();
                    }          
                }
            }
            else{
                CoordinationController::getAuth();
            }
        }
        else{
            $notif = "pas de champs vide svp !!!";
            if(isset($_SESSION['idPromotion'])){
                $idPromotion = $_SESSION['idPromotion'];
                $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
                require_once VIEW.'coordination/lancerVote.php';
            }
            else{
                CoordinationController::getAuth();
            }
        }
    }

    //cette méthode permet de publier le resultat des votes
    public function publierResultat():void{
        if(!isset($_SESSION))
            session_start();

        if(isset($_SESSION['idPromotion'])){
            $idPromotion = $_SESSION['idPromotion'];

            if($this->model->date->checkLancementCandidature($idPromotion)){
                if($this->model->date->checkLancementVote($idPromotion)){
                    //récuperation de date de fin de vote et de la date actuelle
                    $trouver = $this->model->date->getAll($idPromotion);
                    $dateFinVote = $trouver['finVote'];
        
                    $dateActuelle = date('Y-m-d H:i');
        
                    if($dateActuelle > $dateFinVote){
                        $this->model->promotion->setResultPublierTrue($idPromotion);
        
                        $notif = "le resultat  été publié avec succès";

                        CoordinationController::getDashboard($idPromotion, $notif);

                    }
                    else{
                        $notif = "les votes n'ont pas encore pris fin";
                        CoordinationController::getDashboard($idPromotion, $notif);
                    }
                }
                else{
                    $notif = "les votes n'ont pas encore été lancée";
                    CoordinationController::getDashboard($idPromotion, $notif);
                }
            }
            else{
                $notif = "veuillez lancer les candidatures";
                CoordinationController::getDashboard($idPromotion, $notif);
                require_once VIEW."Coordination/dashboard.php";
            }
        }
        else{
            CoordinationController::getAuth();
        }
    }

    public function relancerVote():void{
        if(!isset($_SESSION))
            session_start();

        if(isset($_SESSION["idPromotion"])){
            $idPromotion = $_SESSION["idPromotion"];
            $this->model->deleteData($idPromotion);
            $notif = "vote relencé avec succès";
            CoordinationController::getDashboard($idPromotion, $notif);

        }
        else{
            CoordinationController::getAuth();
        }
        
    }
    public function getDashboard($idPromotion, $notif):void{
        //recuperation des données
        $nombreCandidature = $this->model->candidature->getNumberCandidature($idPromotion);
        $nombreVoix = $this->model->voix->getNumberVoix($idPromotion);
        $finVote = $this->model->date->getFinVote($idPromotion);
        $voixGagnant = $this->model->voix->getVoixGagnant($idPromotion);
        $resultat = $this->model->voix->getResultatPromotion($idPromotion);

        if($voixGagnant == false)
            $voixGagnant = 0;
        else
            $voixGagnant = $voixGagnant['nombre'];

        //calcul des jours de vote restants
        if($finVote != false){    
            $finVote = $finVote['finVote'];
            $dateActuelle = date('Y-m-d H:i');
        
            $finVote = strtotime($finVote);
            $dateActuelle = strtotime($dateActuelle);
            $diffSeconde = $finVote - $dateActuelle;
            $jourVoteRestant = floor($diffSeconde / (60 * 60 * 24));
    
            if($jourVoteRestant <= 0)
                $jourVoteRestant = 0;
        }
        else{
            $jourVoteRestant = 0;
        }

        require_once VIEW.'coordination/dashboard.php';
    }

    private function getOrganiserElection($notif):void{
        if(isset($_SESSION['idPromotion'])){
            $idPromotion = $_SESSION['idPromotion'];
            $periode = $this->model->date->getDateCandidatureAndVote($idPromotion);
    
            require_once VIEW.'coordination/organiserCadidature.php';
        }
        else{
            CoordinationController::getAuth();
        }
    }
}