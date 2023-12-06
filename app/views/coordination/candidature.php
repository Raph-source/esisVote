<?php
  $title = "candidature";
  require_once HEADER;

?>
<?php if(count($trouver) != 0):?>
  <table border=1>
    <thead>
      <tr>
        <th>Profil</th>
        <th>Nom</th>
        <th>Post-nom</th>
        <th>Prénom</th>
        <th>motivation</th>
        <th>vidéo campagne</th>
        <th>decision</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($trouver as $candidatures):
      ?>
        <tr>
          <td> <img src="<?php echo $candidatures['photo']?>" alt="image" width="200" height="200"/></td>
          <td><?php echo $candidatures['nom'];?></td>
          <td><?php echo $candidatures['postNom'];?></td>
          <td><?php echo $candidatures['prenom'];?></td>
          <td><?php echo substr($candidatures['projet'], 0,10)?>
            <a href="voir video?idCandidature=<?php echo $candidatures['idCandidature'];?>"></a>
          </td>
          <td>                                        
              <video src="<?php echo $candidatures['video'];?>" width="200" height="200" display="display:play" controls></video>
          </td>
          <td>
          <button type="button">
                  <a href="valider-la-candidature?idCandidature=<?php echo $candidatures['idCandidature'];?>" style="color:white;"> Valider</a>
              </button>
              <button type="button">
                  <a href="supprimer-la-candidature?idCandidature=<?php echo $candidatures['idCandidature']; ?>" style="color:white;"> Supprimer</a>
              </button>
        </tr>
      <?php 
    endforeach;
    ?>
  <?php else:?>
        <h1>Aucune cadidature</h1>
  <?php endif?>  
  </tbody>
</table>
<a href="retour?vers=les-dashboard-de-la-coordination">Retour</a>
<?php
  if (isset($notif)){
    echo $notif;
  }
?>

<?php
  require_once FOOTER;
?>

