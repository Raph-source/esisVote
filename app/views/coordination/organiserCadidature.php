<?php
  $title = "Organisation election";
  require_once HEADER;
?>
<p class="card-description">
  inserez la date de debut et de fin de candidature
</p>
<form class="forms-sample" action="../controller/organiserElectionPromo.php" method="post" style="margin-top: 40px;">
  <label for="dateDebutCandidature">choisir la date de début candidature: </label>
  <input type="datetime-local"  class="form-control" name="dateDebutCandidature" id=""><br>
  <label for="dateFinCandidature">choisir la date de fin candidature:</label>
  <input type="datetime-local" class="form-control" name="dateFinCandidature" id=""><br>
  <label for="dateFinVote">choisir la date de fin de vote:</label>
  <input type="datetime-local" class="form-control" name="dateFinVote" id=""><br>
  <input type="submit" value="valider"><br>
</form>

<?php
  if (isset($notif)){
    echo $notif;
  }
?>
<?php if(count($periode) > 0):?>
  <div class="container">
  <table class="table">
    <thead class="thead-dark">
      <tr>
      <th>Date debut</th>
      <th>Date fin</th>
      <th>Date fin vote</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($periode as $p):?>
      <tr>
        <td><?php $p['date_debut'] ?></td>
        <td><?php $p['date_fin'] ?></td>
      </tr>  
      <?php 
        endforeach;
      ?>
    </tbody>
  </table>
<?php
  endif;
?>

<?php
  require_once FOOTER;
?>