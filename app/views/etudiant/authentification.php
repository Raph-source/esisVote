    
<?php
  $title = "Authentification";
  $style = ASSETS_CSS."style.css";
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
    <p>Remplissez tous les champs avec votre <span><b>Pseudo</b></span>
      ainsi que votre <span><b>mot de passe</span></b> pour acceder à l'espace Admistrateur
    </p>
  </div>
  <div class="div-form">
    <form action="autentification-etudiant" method="post">
        <h3>Log in</h3>
        <div class="input-div">
          <div><img src="<?php echo ASSETS_IMG."utilisateur.png"?>" alt=""></div>
          <input type="text" name="matricule" class="form-control" id="matricule" placeholder="Entre votre matricule">
        </div>
        
        <div class="input-div">
          <div><img src="<?php echo ASSETS_IMG."cle.png"?>" alt=""></div>
          <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>

        <div class="input-div">
            <input type="submit" value="Se connecter">
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
          