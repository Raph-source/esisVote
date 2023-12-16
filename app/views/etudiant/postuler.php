<?php
  $title = "Lancer les votes";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  $style2 = ASSETS_CSS."options.css";
  require_once HEADER;
?>
<style>
  .container .div-form form .file input[type=file]
  {
    display: none;
  }
  .container .div-form form .input-div .file
  {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content : center;
    align-items: center;
    background-color: green;
  }
  .container .div-form form .input-div .file p
  {
    color: white;
    font-size: 14px;
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
    <a href="retour?vers=authentification etudiant">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Remplissez tous les champs avec toutes <span><b>les informations</b></span>
      pour <span><b>postuler</span></b>
    </p>
    
  </div>
    <div class="div-form">
      <form action="candidature etudiant" method="post" enctype="multipart/form-data">
          <div class="input-div">
            <div><img src="<?php echo ASSETS_IMG."gallery.png"?>" alt=""></div>
            <div class="file">
              <p class='p1'>Cliquer pour choisir une image</p>
              <input type="file" name="photo" id="photo" accept="image/*" class="fileInput n1">
            </div>
            
          </div>
          <div class="input-div">
            <div><img src="<?php echo ASSETS_IMG."video.png"?>" alt=""></div>
            <div class="file">
              <input type="file" name="video" id="video" accept="video/*" class="fileInput n1">
              <p class='p2'>Cliquer pour choisir une video</p>
            </div>
          </div>
          <div class="input-div">
            <textarea  class="form-control" name="projet" rows="15" id="myTextarea"  placeholder="Mentionnez ici votre motivation"></textarea>
          </div>
          <div class="input-div">
            <input type="submit" value="Postuler">
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
  $script2 = ASSETS_JS.'etudiant/file.js';
  require_once FOOTER;
?>