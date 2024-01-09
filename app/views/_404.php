<?php
  $title = "Page | 404";
  $style = ASSETS_CSS."_404.css";
  require_once HEADER;
?>
<div class="container">
    <div class="lost">
        <img src="<?php echo ASSETS_IMG."alone-concept-illustration_114360-23931.png";?>" alt="">
        <div class="text">
            <h3>404</h3>
            <h4>Page <span>Non</span> Trouvée</h4>
            <a href="#"><span>        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#385a64" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill=""/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg></span><span>Acceuil</span></a>
        </div>
    </div>
    
</div>
<?php
  require_once FOOTER;
?>