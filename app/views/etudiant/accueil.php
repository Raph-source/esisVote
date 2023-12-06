<?php
  $title = 'Acceuil';
  require_once HEADER;
?>
  <?php if($dateActuelle >= $date['debutCandidature'] && $dateActuelle <= $date['finCandidature']):?>
      <button value="postuler" id="postuler">Postuler</button><br>
      <button class="boutonNonValide">Voter</button><br>
      <button class="boutonNonValide">Voir le resultat</button><br>

  <?php elseif($dateActuelle >= $date['debutVote'] && $dateActuelle <= $date['finVote']):?>
      <button class="boutonNonValide">Postuler</button><br>
      <button value="voter" id="voter">Voter</button><br>
      <button class="boutonNonValide">Voir le resultat</button><br>

  <?php elseif($resultatPublie == '1'):?>
      <button class="boutonNonValide">Postuler</button><br>
      <button class="boutonNonValide">Voter</button><br>
      <button class="voir-le-resultat" id="resultat">Voir le resultat</button><br>
  <?php else:?>
      <button class="boutonNonValide">Postuler</button><br>
      <button class="boutonNonValide">Voter</button><br>
      <button class="boutonNonValide">Voir le resultat</button><br>
  <?php endif?>
<?php
  $script = ASSETS_JS.'etudiant/acceuil.js';
  require_once FOOTER;
?>