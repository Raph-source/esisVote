<?php
    $title = "choix groupe";
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
    <a href="retour?vers=authentification-coordination">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Choisissez un <span><b>groupe</b></span>
      entre <span><b>A et B</span></b>
    </p>
  </div>
    <div class="div-form">
    <h3 style="margin-bottom:1em;">Choissez le groupe</h3>
      <div class="options">
      <a href="l2?groupe=L2 A"><button class="boutonValide">L2 A</button></a> <br>
      <a href="l2?groupe=L2 B"><button class="boutonValide">L2 B</button></a>
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