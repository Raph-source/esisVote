

<?php
  $title = "Lancer les votes";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  $style2 = ASSETS_CSS."options.css";
  $style3 = ASSETS_CSS."cardDiv.css";
  require_once HEADER;
?>
<div class="container">
  <div class="div-info" style="position:fixed">
    <div class="title">
      <img src="<?php echo ASSETS_IMG."logo.png"?>" alt="">
    </div>
    <div class="logo">
      <img src="<?php echo ASSETS_IMG."logoesis.png"?>" alt="">
    </div>
    <a href="retour?vers=les-dashboard-de-la-coordination">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Voici la liste des candidats <span><b>valider</b></span>
      ou<span><b> supprimer</span></b>une candidature
    </p>
    
  </div>
    <div class="div-form">
      <h3><span>Liste des</span> <br>Candidats</h3>
      <div class="list-candidat">
        <?php if(count($trouver) != 0):?>
          <?php if(isset($notif)):?>
            <?php  echo '<span class="error" hidden>'.$notif.'</span>';?>
          <?php endif?>
        <?php
          foreach($trouver as $candidatures):
        ?>
            <div class="card-cand">
              <img src="<?php echo $candidatures['photo']?>" alt="image" width="200" height="200"/>
              <h4><?php echo $candidatures['nom'].' '.' '.$candidatures['prenom'];?></h4> 
              <div class="info">
                
                <a href="voir-video?video=<?php echo $candidatures['video'];?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play-filled" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff4500" fill="none" stroke-linecap="round" stroke-linejoin="round"  style="border-radius:50%">
                    <path stroke="rgb(253, 0, 0)" d="M0 0h24v24H0z" fill="rgb(253, 0, 0)"/>
                    <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" stroke-width="3" fill="white" />
                  </svg>
                </a>
                <a href="voirprojetcoord?projet=<?php echo $candidatures['idCandidature'];?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    <path d="M9 17h6" />
                    <path d="M9 13h6" />
                  </svg>
                </a>

                <a href="supprimer-la-candidature?idCandidature=<?php echo $candidatures['idCandidature']; ?>" style="color:white;"> 
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M4 7l16 0" />
                  <path d="M10 11l0 6" />
                  <path d="M14 11l0 6" />
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                </a>
                <a href="valider-la-candidature?idCandidature=<?php echo $candidatures['idCandidature'];?>" style="color:white;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M9 12l2 2l4 -4" />
              </svg>
              </a>
              </div>
             
            </div>
        <?php 
        endforeach;
        ?>
        <?php else:?>
        <h1>Aucune cadidature</h1>
      <?php endif?>  
        </div>
    </div>
</div>
<?php
  $script = ASSETS_JS.'coordination/candidature.js';
  require_once FOOTER;
?>