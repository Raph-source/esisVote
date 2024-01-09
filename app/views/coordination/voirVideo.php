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
    <a href="retour?vers=voirCandidatureCoordination">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Visualiser la <span><b>video</b></span>
      qui presente<span><b>votre candidat</span></b>
    </p>
    
  </div>
  <div class="div-form" style="padding-top:-10em;position:relative">
    <div class="video">
      <video src="<?= $video?>" controls="controls" height="50%" width="50%" style="position:absolute;top:50%;left:50%;
      transform : translate(-50%,-50%)"></video>
    </div>
    </div>
</div>
<?php
  $script = ASSETS_JS.'coordination/candidature.js';
  require_once FOOTER;
?>