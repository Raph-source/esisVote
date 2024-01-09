<?php
  $title = "Projet | candidat";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  $style2 = ASSETS_CSS."options.css";
  require_once HEADER;
?>
<style>
    .container .div-form{
      position: relative;
  }
  .container .div-form .video{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: rgb(215, 249, 215);;
    width: 50%;
    padding: 1em;
    color: rgb(69, 94, 69);
    border-radius: 5px;
  }
  .container .div-form .video h4{
    background-color: white;
    padding: 0.5em;
    margin-bottom: 1em;
    color: rgb(69, 94, 69);
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
    <a href="retour?vers=voircandidature">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Projet ou <span><b>motiation</b></span>
      d'un <span><b>candidat</span></b>
    </p>
    
  </div>
  <div class="div-form" >
    <div class="video" >
    <h4>Motivation</h4>
      <p><?= $projet;?></p>
    </div>
    </div>
</div>
<?php
  $script = ASSETS_JS.'coordination/candidature.js';
  require_once FOOTER;
?>