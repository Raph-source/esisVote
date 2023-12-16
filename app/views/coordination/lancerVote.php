<?php
  $title = "Lancer les votes";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  require_once HEADER;
?>
<style>

  .container .div-form form{
    position: relative;
  }
  .container .div-form form label:nth-child(1){
    position: absolute;
    top:-2em;
    left:0;
    font-weight:bold;
  }
  .container .div-form form label{
    position: absolute;
    top:4.5em;
    left:0;
    font-weight:bold;
  }
  .container .div-form form .input-div{
    margin-bottom:3em;
  }
  .container .div-form form .error{
    padding:1em;
    height :3em;
    width : 20em;
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
    <a href="retour?vers=les-dashboard-de-la-coordination">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Remplissez ces champs pour <span><b>lancer</b></span>
      <span><b>les élections</span></b>
    </p>
    
  </div>
  <div class="div-form">
  <?php if(count($periode) > 0):?>
      <div class="info-candidature">
        <div class="infos">
          <div class="debut">
          <?php foreach($periode as $p):?>
            <h4>Date <br> debut :</h4>
            <span><?= $p['debutVote'] ?></span>
          </div>
          <div class="fin">
            <h4>Date <br> fin :</h4>
            <span><?= $p['finVote'] ?></span>  
          </div>
          <?php 
              endforeach;
          ?>
        </div>
      </div>
    <?php
      endif;
    ?>
    <form action="lancement-vote" method="post">
      
        <label for="dateDebutCandidature">Date debut :</label>
        <div class="input-div">
            <div><img src="<?php echo ASSETS_IMG."date-de-debut.png"?>" alt=""></div>
            <input type="datetime-local"  class="form-control" name="debutVote" id="">
        </div>

        <label for="dateFinCandidature">Date fin :</label>
        <div class="input-div">
          <div><img src="<?php echo ASSETS_IMG."fin-de-semaine.png"?>" alt=""></div>
          <input type="datetime-local" class="form-control" name="finVote" id="">
        </div>

        <div class="input-div">
            <input type="submit" value="valider">
        </div>
      <?php
        if (isset($notif))
          echo "<p class='error'><span>".ucfirst($notif)."</span></p>";
      ?>
    </form>
  </div>  

</div>
<?php
  $script = ASSETS_JS.'script.js';
  require_once FOOTER;
?>