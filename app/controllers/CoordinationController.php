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
                $_SESSION['idCoordination'] = $this->model->getId();
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
            
            if(isset($_SESSION['idPromotion'])){
                $trouver = $this->model->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

                $notif = 'cadidature validée avec succès';
                require_once VIEW.'coordination/dashboard.php';
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
            
            $this->model->supprimerCandidat($idCandidature);



            if(isset($_SESSION['idPromotion'])){
                $trouver = $this->model->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

                $notif = 'cadidature suprimée avec succès';
                require_once VIEW.'coordination/dashboard.php';
            }
            else{
                CoordinationController::getAuth();
            }
            $trouver = $this->model->getAllCandidatureByIdPromotion($_SESSION['idPromotion']);

            $notif = 'cadidature suprimée avec succès';
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

        if(isset($_SESSION['idCoordination'])){
            $idCoordination = $_SESSION['idCoordination'];
            $periode = $this->model->getDateCandidatureAndVote($idCoordination);
    
            require_once VIEW.'coordination/organiserCadidature.php';
        }
        else{
            CoordinationController::getAuth();
        }
    }

    public function organiserCadidature():void{
        if(!isset($_SESSION)){
            session_start();
        }
        if($this->superGlobal->noEmptyPost(['dateDebutCandidature', 'dateFinCandidature'])){
            
            $dateActuelle = date('Y-m-d H:i');

            $idCoordination = $_SESSION['idCoordination'];
            $dateDebutCandidature = $this->superGlobal->post['dateDebutCandidature'];
            $dateFinCandidature = $this->superGlobal->post['dateFinCandidature'];

            $dateDebutCandidature = str_replace('T', ' ', $dateDebutCandidature);
            $dateFinCandidature = str_replace('T', ' ', $dateFinCandidature);

            if($dateDebutCandidature >= $dateActuelle){
                if($dateDebutCandidature < $dateFinCandidature){
                    //enregister les dates
                    $this->model->lancerCandidature($dateDebutCandidature, $dateDebutCandidature, $idCoordination);
                    
                    $notif = "les candidatures ont été lancées";
                    if(isset($_SESSION['idCoordination'])){
                        $idCoordination = $_SESSION['idCoordination'];
                        $periode = $this->model->getDateCandidatureAndVote($idCoordination);
                
                        require_once VIEW.'coordination/organiserCadidature.php';
                    }
                    else{
                        CoordinationController::getAuth();
                    }                
                }
                else{
                    $notif = "la date de début doit être supérieur à la date de fin";
                    if(isset($_SESSION['idCoordination'])){
                        $idCoordination = $_SESSION['idCoordination'];
                        $periode = $this->model->getDateCandidatureAndVote($idCoordination);
                
                        require_once VIEW.'coordination/organiserCadidature.php';
                    }
                    else{
                        CoordinationController::getAuth();
                    }
                }
            }
            else{
                $notif = "la date de début doit être supérieur ou égal à la date actuelle";
                if(isset($_SESSION['idCoordination'])){
                    $idCoordination = $_SESSION['idCoordination'];
                    $periode = $this->model->getDateCandidatureAndVote($idCoordination);
            
                    require_once VIEW.'coordination/organiserCadidature.php';
                }
                else{
                    CoordinationController::getAuth();
                }   
            }
        }
        else{
            $notif = "pas de champs vide svp !!!";
            if(isset($_SESSION['idCoordination'])){
                $idCoordination = $_SESSION['idCoordination'];
                $periode = $this->model->getDateCandidatureAndVote($idCoordination);
        
                require_once VIEW.'coordination/organiserCadidature.php';
            }
            else{
                CoordinationController::getAuth();
            }
        }
    }

    public function getFormLancerVote():void{
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['idCoordination'])){
            $idCoordination = $_SESSION['idCoordination'];
            $periode = $this->model->getDateCandidatureAndVote($idCoordination);
    
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
            if(isset($_SESSION['idCoordination'])){
                $idCoordination = $_SESSION['idCoordination'];
                $date = $this->model->getDateCandidatureAndVote($idCoordination);
                
                $finCandidature = $date[0]['date_fin'];

                if($debutVote < $finVote){
                    if($debutVote > $finCandidature){
                        if($this->model->lancerVote($debutVote, $finVote, $idCoordination)){
                            $notif = "les votes ont été lancées";
                            
                            if(isset($_SESSION['idCoordination'])){
                                $idCoordination = $_SESSION['idCoordination'];
                                $periode = $this->model->getDateCandidatureAndVote($idCoordination);
                        
                                require_once VIEW.'coordination/organiserCadidature.php';
                            }
                            else{
                                CoordinationController::getAuth();
                            }
                        }
                        else{
                            $notif = "veuillez lancer les candidatures avant de lancer les votes";
                            
                            if(isset($_SESSION['idCoordination'])){
                                $idCoordination = $_SESSION['idCoordination'];
                                $periode = $this->model->getDateCandidatureAndVote($idCoordination);
                                require_once VIEW.'coordination/lancerVote.php';
                            }
                            else{
                                CoordinationController::getAuth();
                            }
                        }
                    }
                    else{
                        $notif = "la date de début vote doit supérieure à la date de fin des candidatures";
                        if(isset($_SESSION['idCoordination'])){
                            $idCoordination = $_SESSION['idCoordination'];
                            $periode = $this->model->getDateCandidatureAndVote($idCoordination);
                            require_once VIEW.'coordination/lancerVote.php';
                        }
                        else{
                            CoordinationController::getAuth();
                        }                    
                    }
                }
                else{
                    $notif = "la date de début doit inférieure à la date de fin";
                    if(isset($_SESSION['idCoordination'])){
                        $idCoordination = $_SESSION['idCoordination'];
                        $periode = $this->model->getDateCandidatureAndVote($idCoordination);
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
            if(isset($_SESSION['idCoordination'])){
                $idCoordination = $_SESSION['idCoordination'];
                $periode = $this->model->getDateCandidatureAndVote($idCoordination);
                require_once VIEW.'coordination/lancerVote.php';
            }
            else{
                CoordinationController::getAuth();
            }
        }
    }
}