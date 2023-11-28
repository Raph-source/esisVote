<?php 
require_once('../model/candidat.php');

session_start();
$candidature = new Candidat();
$idPromotion = $_SESSION['idPromo'];
$trouver = $candidature->getAllCandidatureById($idPromotion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>evote</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../assets/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
</head>
<body>
  
  
  <div class="container-scroller">
      <?php
        require_once '../includes/navbarCoordination.php';
      
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                      <th class="ml-5">profil</th>
                        <th class="ml-5">Nom</th>
                        <th>Post_nom</th>
                        <th>Prenom</th>
                        <th>pourcentage</th>
                        <th>confession	</th>
                        <th>motivation</th>
                        <th>vidéo campagne</th>
                        <th>decision</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($trouver as $candidatures){?>
                        <tr>
                                   <td class="py-1"> <img src="<?php echo $candidatures['photo']?>" alt="image"/> </td>
                                    <td><?php echo $candidatures['nom'];?></td>
                                    <td><?php echo $candidatures['post_nom'];?></td>
                                    <td><?php echo $candidatures['prenom'];?></td>
                                    <td><?php echo $candidatures['pourcentage'];?></td>
                                    <td><?php echo $candidatures['confession'];?></td>
                                    <td><?php echo substr($candidatures['projet'], 0,10)?> [...]
                                      <a href="dashboard1.php?idCandidature=<?php echo $candidatures['idcandidature'];?>">  <i class="typcn typcn-edit btn-icon-append"></i> </a>
                                     </td>
                                     <td>
                                        <div class="d-flex align-items-center">
                                        
                                          <button type="button" class="btn btn-outline-primary btn-sm btn-icon-text view-videos" data-toggle="modal" data-target="#modalVideos">
                                            <span id="video-<?php echo $candidatures['idcandidature']; ?>" style="display:none;"><?php echo $candidatures['video']; ?></span>
                                            Voir vidéo
                                          </button>
                                        </div>
                                     </td>
                                    <td>
                                    <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                            <a href="../controller/validerCandidatPromo.php?idCandidature=<?php echo $candidatures['idcandidature'];?>" style="color:white;"> Valider <i class="typcn typcn-edit btn-icon-append"></i> </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-icon-text mr-3">
                                            <a href="../controller/supprimerCandidatPromo.php?idCandidature=<?php echo $candidatures['idcandidature']; ?>" style="color:white;"> Supprimer <i class="typcn typcn-delete-outline btn-icon-append"></i> </a>
                                        </button>
                                       
                                        </div>
                                    </td>
                            </tr>
                   <?php }
                ?>
                  
                  <!-- Modal Videos -->
                  <div class="modal fade" id="modalVideos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLongTitle">Videos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body d-flex align-items-center justify-content-center">
                        <video controls id="videos" width="500" height="400" autoplay>
                        </video>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                  </div>
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
         <?php
            if (isset($_SESSION['notifDashboard'])) {
              echo "<div class=\"alert alert-primary\" role=\"alert\" style=\"width:100%;text-align:center\">";
              echo $_SESSION['notifDashboard'];
              echo "</div>";
              unset($_SESSION['notifDashboard']);
            }
         ?>
        </div>
       
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
         <?php
            if (isset($_SESSION['notifVoirCandidatPromo'])) {
              echo "<div class=\"alert alert-primary\" role=\"alert\" style=\"width:100%;text-align:center\">";
              echo $_SESSION['notifVoirCandidatPromo'];
              echo "</div>";
              unset($_SESSION['notifVoirCandidatPromo']);
            }
         ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="../assets/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../assets/template/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets/template/js/off-canvas.js"></script>
  <script src="../assets/template/js/hoverable-collapse.js"></script>
  <script src="../assets/template/js/template.js"></script>
  <script src="../assets/template/js/settings.js"></script>
  <script src="../assets/template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/template/js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script>
    $('.view-videos').click(function() {
        var idCandidature = $(this).attr('id');
        let path = $(this).find(':first').text();
        $("#videos").attr('src', path);
        console.log(path);
    });

   //motivation
   $('.view-motivation').click(function() {
        var idCandidature = $(this).attr('id');
        let path = $(this).find(':first').text();
        $("#motivation").attr('src', path);
        console.log(path);
    });

   
   
   
   
  </script>
</body>

</html>

