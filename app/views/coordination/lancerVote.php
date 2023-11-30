<?php
    $title = "lancer vote";
    require_once HEADER;
?>
<form action="lancement-vote" method="post">
  <label for="debutVote">choisir la date de début de vote: </label>
  <input type="datetime-local"  class="form-control" name="debutVote" id=""><br>
  <label for="finVote">choisir la date de fin candidature:</label>
  <input type="datetime-local" class="form-control" name="finVote" id=""><br>
  <input type="submit" value="valider"><br>
</form>
<?php if(isset($notif))
      echo $notif;
?>
<!-- affichage des dates -->
<?php if(count($periode) > 0):?>
  <div class="container">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Date de debut de vote</th>
        <th>Date de fin de vote</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($periode as $p):?>
      <tr>
        <td><?= $p['dateDebutVote'] ?></td>
        <td><?= $p['dateFinVote'] ?></td>
      </tr>  
      <?php 
        endforeach;
      ?>
    </tbody>
  </table>
<?php
  endif;
?>

<a href="retour?vers=les-options-de-la-coordination">Retour</a>
<?php
    require_once FOOTER;
?>