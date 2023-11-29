<?php
  $title = "Organisation election";
  require_once HEADER;
?>
<p class="card-description">
  inserez la date de debut et de fin de candidature
</p>
<form class="forms-sample" action="form-organiser-les-candidatures" method="post" style="margin-top: 40px;">
  <label for="dateDebutCandidature">choisir la date de début candidature: </label>
  <input type="datetime-local"  class="form-control" name="dateDebutCandidature" id=""><br>
  <label for="dateFinCandidature">choisir la date de fin candidature:</label>
  <input type="datetime-local" class="form-control" name="dateFinCandidature" id=""><br>
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
      </tr>
    </thead>
    <tbody>
      <?php foreach($periode as $p):?>
      <tr>
        <td><?= $p['date_debut'] ?></td>
        <td><?= $p['date_fin'] ?></td>
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