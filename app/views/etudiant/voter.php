<?php
  $title = "Lancer les votes";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  $style2 = ASSETS_CSS."options.css";
  $style3 = ASSETS_CSS."cardDiv.css";
  require_once HEADER;
?>
<style>
    .container .div-form
  {
    padding-top: 5em;
  }
  .container .div-form .list-candidat .card-cand .info a
  {
    margin-right: 5px;
  }
  .container .div-form .list-candidat .card-cand .info a
  {
    margin-right: 5px;
  }
  .container .div-form .list-candidat .card-cand .info .b1
  {
    background-color: red;
  }
  .container .div-form .list-candidat .card-cand .info .b3
  {
    background-color: green;
  }
  .container .div-form .list-candidat .card-cand .info form
  {
    background:green;
    height:1.7em;
    border-radius : 5px;
    margin-top:10px;
    padding: 0;
  }
  .container .div-form .list-candidat .card-cand .info form input[type=submit]
  {
    display: block;
    margin-top:-15px;
    border:none;
    background:inherit;
    width: 100%;
    height: 34em;
    border-radius: 5px;
    color:white;
    cursor: pointer;
  }
</style>
<div class="container">
  <div class="div-info">
    <div class="title">
      <img src="<?php echo ASSETS_IMG."logo.png"?>" alt="">
    </div>
    <div class="logo">
      <img src="<?php echo ASSETS_IMG."logoesis.png"?>" alt="">
    </div>
    <a href="retour?vers=option etudiant">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Voté votre <span><b>candidat</b></span>
      en cliquant sur <span><b>le bouton</span></b>vote
    </p>
    
  </div>
    <div class="div-form">
      <h3><span>Liste des</span> <br>Candidats</h3>
      <div class="list-candidat">
        <?php if($nombreCandidature > 0):?>
          <?php if(isset($notif)):?>
            <?php  echo '<span class="error" hidden>'.$notif.'</span>';?>
          <?php endif?>
        <?php
          foreach($candidatures as $candidature):
        ?>
            <div class="card-cand" >
              <img src="<?php echo $candidature['photo']?>" alt="image" width="200" height="200"/>
              <h4><?php echo $candidature['nom'].' '.' '.$candidature['prenom'];?></h4> 
              <div class="info">  
                <a href="voir video etudiant?video=<?php echo $candidature['video'];?>"><button class="see b1">Video</button></a> 
                <a href="voir projet?projet=<?php echo $candidature['projet'];?>"><button class="see b2">Projet</button></a>
                <form action="voix etudiant" method="post">
                  <input type="hidden" name="idCandidature" value="<?php echo $candidature['idCandidature'];?>"><br>
                  <input type="submit" value="Voter">
              </form>
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