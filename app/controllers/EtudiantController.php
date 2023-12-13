<?php
class EtudiantController{
    private $superGlobal;
    public $model;

    public function __construct(){
        $this->superGlobal = new SuperGlobal();
        $this->model = new Etudiant();
    }
    public function getAuth(){
        require_once VIEW.'etudiant/authentification.php';
    }

    public function authentification(){
        if(!isset($_SESSION))
            session_start();

        if($this->superGlobal->noEmptyPost(['matricule', 'password'])){  
            $matricule = $this->superGlobal->post['matricule'];
            $password = $this->superGlobal->post['password'];
            
            $this->model->setAttribut($matricule, $password);

            //verification de l'authentification de l'étudiant
            if ($this->model->authentification()){
                //mise de données en session
                $data = $this->model->getData();
                $_SESSION['prenom'] = $data['prenom'];
                $_SESSION['idEtudiant'] = $data['idEtudiant'];
                $_SESSION['idPromotion'] = $data['idPromotion'];      
                $_SESSION['idCoordination'] = $data['idCoordination'];    
                
                //recuperation des dates et du status de publication des resultats
                $date = $this->model->date->getAll($data['idPromotion']);
                $resultatPublie = $this->model->promotion->getResultatPublie($data['idPromotion']);
                $resultatPublie = $resultatPublie['resultatPublie'];
                
                $dateActuelle = date('Y-m-d H:i');

                require_once VIEW.'etudiant/acceuil.php';
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
        if(!isset($_SESSION))
            session_start();

        if(isset($_SESSION['idPromotion'])){
            $date = $this->model->date->getAll($_SESSION['idPromotion']);
            $dateActuelle = date('Y-m-d H:i');

            if($dateActuelle >= $date['debutCandidature'] && $dateActuelle <= $date['finCandidature']){
                if($this->model->candidature->getNombreCandidature($_SESSION['idPromotion']) <= 10){
                    require_once VIEW.'etudiant/postuler.php';
                }
                else{
                    $notif = "le nombre maximal des candidature à déjà était atteint";
                    require_once VIEW.'etudiant/acceuil.php';
                }
            }
            else{
                header('Location: _lock');
            }
        }
        else{
            EtudiantController::getAuth();
        }
    }

    public function postuler(){
        if(!isset($_SESSION))
            session_start();

        if(isset($_SESSION['idEtudiant'])){
            
            if($this->superGlobal->noEmptyPost(['projet']) && isset($_FILES['photo']) && isset($_FILES['video'])){
                if ($_FILES['photo']['error'] == 0){
                    $photoExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

                    // Allow any image type by checking the file extension
                    $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif','SVG','svg','JPG','JPEG','PNG','GIF'];

                    if(in_array($photoExtension, $allowedImageExtensions)){
                        // Check if the file size is within an acceptable range
                        if($_FILES['photo']['size'] < 80000000){
                            // Upload the photo
                            $nomPhoto = uniqid() . '.' . $photoExtension;
                            $cheminPhoto = UPLOADS_PATH .'imageCandidat/'. $nomPhoto;
                            move_uploaded_file($_FILES['photo']['tmp_name'], $cheminPhoto);

                            //link of the photo
                            $lienImage = UPLOADS_LINK .'imageCandidat/'. $nomPhoto;

                            if ($_FILES['video']['error'] == 0){
                                $video = $_FILES['video']['tmp_name'];
                                $videoType = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                                // Check if the file is a video
                                $allowedVideoTypes = array('mp4', 'avi', 'mov');
                                if (in_array($videoType, $allowedVideoTypes)) {
                                    // Check if the file size is within an acceptable range
                                    if ($_FILES['video']['size'] < 80000000) {
                                        // Upload the video
                                        $nomVideo = uniqid() . '.' . $videoType;
                                        $cheminVideo = UPLOADS_PATH . 'videoCandidat/' . $nomVideo;
                                        move_uploaded_file($_FILES['video']['tmp_name'], $cheminVideo);

                                        $lienVideo = UPLOADS_LINK . 'videoCandidat/' . $nomVideo;
                                        // Insert the candidate
                                        $projet = $this->superGlobal->post['projet'];

                                        $idEtudiant = intval($_SESSION['idEtudiant']);

                                        $this->model->candidature->setAttribut($idEtudiant, $projet, $lienImage, $lienVideo);

                                        // Check if the candidacy is unique
                                        if(!$this->model->candidature->checkExistance()){
                                            $this->model->candidature->save();

                                            $date = $this->model->date->getAll($_SESSION['idPromotion']);
                                            $dateActuelle = date('Y-m-d H:i');
                                            $notif = 'Candidature enregistrée!';
                                            require_once VIEW.'etudiant/acceuil.php';
                                        }
                                        else{
                                            $notif = 'Vous ne pouvez pas postuler plus d\'une fois!';
                                            require_once VIEW.'etudiant/postuler.php';
                                        }
                                    }
                                    else{
                                        $notif = 'La taille de la vidéo est trop grande';
                                        require_once VIEW.'etudiant/postuler.php';
                                    }
                                }
                                else{
                                    $notif = 'Veuillez choisir une vidéo valide (mp4, avi, mov)';
                                    require_once VIEW.'etudiant/postuler.php';
                                }
                            }
                            else{
                                $notif = 'La vidéo contient des erreurs';
                                require_once VIEW.'etudiant/postuler.php';
                            }
                        }
                        else{
                            $notif = 'La taille est trop grande';
                            require_once VIEW.'etudiant/postuler.php';
                        }
                    }
                    else{
                        $notif = 'Veuillez choisir une image valide (jpg, jpeg, png, gif)';
                        require_once VIEW.'etudiant/postuler.php';
                    }
                }
                else{
                    $notif = 'image contient des erreurs';
                    require_once VIEW.'etudiant/postuler.php';
                }
            }
            else{
                $notif = 'Veuillez remplir tous les champs';
                require_once VIEW.'etudiant/postuler.php';
            }
        }
        else{
            EtudiantController::getAuth();
        }
    }

    public function getPageVoter(){
        if(!isset($_SESSION))
            session_start();
        
        if(isset($_SESSION['idPromotion'])){
            $date = $this->model->date->getAll($_SESSION['idPromotion']);
            $dateActuelle = date('Y-m-d H:i');

            if($dateActuelle >= $date['debutVote'] && $dateActuelle <= $date['finVote']){
                $nombreCandidature = $this->model->candidature->getNombreValidateCandidature($_SESSION['idPromotion']);
                $candidatures = $this->model->candidature->getAllCandidatureValidateByIdPromotion($_SESSION['idPromotion']);
                require_once VIEW.'etudiant/voter.php';
            }
            else{
                header('Location: _lock');
            }
            
        }
        else{ 
            EtudiantController::getAuth();
        }
    }
    public function voter(){
        if($this->superGlobal->noEmptyPost(['idCandidature'])){
            $idCandidature = $this->superGlobal->post['idCandidature'];

            if(!isset($_SESSION))
                session_start();

            if(isset($_SESSION['idEtudiant']) && isset($_SESSION['idPromotion'])){
                $idEtudiant = $_SESSION['idEtudiant'];

                if($this->model->vote->checkVote($idEtudiant)){
                    $this->model->vote->setVote($idEtudiant, $idCandidature);
                    $this->model->voix->setVoix($idCandidature);

                    $notif = "voix enregistré";
                    $nombreCandidature = $this->model->candidature->getNombreValidateCandidature($_SESSION['idPromotion']);
                    $candidatures = $this->model->candidature->getAllCandidatureValidateByIdPromotion($_SESSION['idPromotion']);
                    require_once VIEW.'etudiant/voter.php';
                } 
                else{
                    $date = $this->model->date->getAll($_SESSION['idPromotion']);
                    $resultatPublie = $this->model->promotion->getResultatPublie($_SESSION['idPromotion']);
                    $resultatPublie = $resultatPublie['resultatPublie'];
                    $dateActuelle = date('Y-m-d H:i');

                    $notif = "vous ne pouvez pas voter plus d'une fois";
                    require_once VIEW.'etudiant/acceuil.php';
                }
            }
            else{
                EtudiantController::getAuth();
            }
        }
    }

    public function resultat():void{
        if(!isset($_SESSION))
            session_start();
    
        if(isset($_SESSION['idPromotion'])){
            $resultatPublie = $this->model->promotion->getResultatPublie($_SESSION['idPromotion']);
            $resultatPublie = $resultatPublie['resultatPublie'];

            if($resultatPublie == '1'){
                $resultat = $this->model->voix->getResultatPromotion($_SESSION['idPromotion']);
                require_once VIEW.'etudiant/resultat.php';
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