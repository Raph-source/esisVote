<?php
  $title = "Lancer les votes";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  $style2 = ASSETS_CSS."options.css";
  require_once HEADER;
?>
<div class="container">
  <div class="div-info">
    <div class="title">
      <img src="<?php echo ASSETS_IMG."logo.png"?>" alt="">
    </div>
    <div class="logo">
      <img src="<?php echo ASSETS_IMG."logoesis.png"?>" alt="">
    </div>
    <a href="retour?vers=authentification etudiant">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Remplissez tous les champs avec votre <span><b>Pseudo</b></span>
      ainsi que votre <span><b>mot de passe</span></b> pour acceder à l'espace Admistrateur
    </p>
    
  </div>
    <div class="div-form">
      <div class="options">
        <h4>Choisissez <br> une option : </h4>
        <?php if($date != false):?>
          <?php if($dateActuelle >= $date['debutCandidature'] && $dateActuelle <= $date['finCandidature']):?>
              <button id="postuler">Postuler</button><br>
              <button class="boutonNonValide">Voter</button><br>
              <button class="boutonNonValide">Voir le resultat</button><br>

              <?php elseif($dateActuelle >= $date['debutVote'] && $dateActuelle <= $date['finVote']):?>
                  <button class="boutonNonValide">Postuler</button><br>
                  <button id="voter">Voter</button><br>
                  <button class="boutonNonValide">Voir le resultat</button><br>

              <?php elseif($resultatPublie == '1'):?>
                  <button class="boutonNonValide">Postuler</button><br>
                  <button class="boutonNonValide">Voter</button><br>
                  <button id="voirResultat">Voir le resultat</button><br>
              <?php else:?>
                  <button class="boutonNonValide">Postuler</button><br>
                  <button class="boutonNonValide">Voter</button><br>
                  <button class="boutonNonValide">Voir le resultat</button><br>
              <?php endif?>
        <?php else:?>
            <button class="boutonNonValide">Postuler</button><br>
            <button class="boutonNonValide">Voter</button><br>
            <button class="boutonNonValide">Voir le resultat</button><br>
        <?php endif?>
        <?php
          if(isset($notif))
            echo $notif;  
        ?>
      </div>
    </div>
</div>
<?php
  $script = ASSETS_JS.'script.js';
  $script1 = ASSETS_JS.'etudiant/acceuil.js';
  require_once FOOTER;
?>