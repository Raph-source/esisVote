
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
    <p>Changer votre <span><b>mot de passe</b></span> en saisissant l'ancien
      puis <span><b>le nouveau</span></b> Et enfin valider</p>
    
  </div>
  <div class="div-form">  
    <form action="changer mot de passe" method="post">
      
        <div class="input-div">
            <div><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
          </svg></div>
            <input type="text" name="oldMdp" id="" placeholder="Ancien mot de passe">
        </div>
        <div class="input-div">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-square-rounded" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
            <path d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
            <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
          </svg>
          </div>
          <input type="text" name="newMdp" id="" placeholder="Nouveau mot de passe">
        </div>
        <div class="input-div">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-password-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 17v4" />
            <path d="M10 20l4 -2" />
            <path d="M10 18l4 2" />
            <path d="M5 17v4" />
            <path d="M3 20l4 -2" />
            <path d="M3 18l4 2" />
            <path d="M19 17v4" />
            <path d="M17 20l4 -2" />
            <path d="M17 18l4 2" />
            <path d="M9 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M7 14a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2" />
          </svg>
          </div>
          <input type="text" name="confMdp" id="" placeholder="Confirmer mot de passe">
        </div>
        <div class="input-div">
        <input type="submit" value="Valider">
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