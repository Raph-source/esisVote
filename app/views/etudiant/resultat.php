<?php
  $title = "Resultats";
  $style = ASSETS_CSS."style.css";
  $style1 = ASSETS_CSS."org.css";
  $style2 = ASSETS_CSS."options.css";
  require_once HEADER;
?>
<style>
.container .div-form .div-statistique {
  border-radius: 8px;
  padding: 1.5em;
  background-color: white;
  overflow-y: scroll;
  margin-top: 1em;
}
.container .div-form .div-statistique .div-stat {
  height: 100%;
  min-width: 20em;
  max-width: 30em;
}
.container .div-form .div-statistique .div-stat .result{
  padding-top: 1em;
  height: 100%;
}
.container .div-form .div-statistique .div-stat .result p{
  display: flex;
  align-items: center;
  margin-top: 0.9em;
}
.container .div-form .div-statistique .div-stat .result p .ronde{
  height: 25px;
  width: 25px;
  border-radius: 50%;
  margin-right: 0.5em;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.container .div-form .div-statistiquee .div-stat .result p .ronde img{
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 50%;
  margin-right: 0.5em;
}
.container .div-form .div-statistique .div-stat .result p .name{
  margin-right: 1.5em;
}
.container .div-form .div-statistique .div-stat .result p .barre{
    width: 8em;
    height: 10px;
    background-color: aqua;
    color: rgb(255, 193, 37);
    margin-right: 0.3em;
    border-radius: 3px;
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
    <a href="retour?vers=optionetudiant">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M5 12l14 0" />
          <path d="M5 12l6 6" />
          <path d="M5 12l6 -6" />
        </svg>
    </a>
    <p>Resultat des <span><b>votes</b></span>
    </p>
    
  </div>
    <div class="div-form">
        <?php
            $i = 0;
        ?>
        <div class="card-option-two">
            <div class="div-statistique">
                <div class="div-stat">
                    <div class='result'>
                        <?php if(count($resultat) > 0):?>
                            <h4>Resultat</h4>
                            <?php $tabs = ['rgb(0, 180, 212)','rgb(255, 193, 37)',
                            'rgb(24, 255, 255)','rgb(251, 255, 24)','rgb(255, 24, 220)',
                            'rgb(24, 255, 159)','rgb(0, 110, 64)',
                            'rgb(110, 75, 0)','rgb(72, 0, 68)','rgb(231, 0, 0)'];
                            $i=1;
                        ?>
                        <?php foreach($resultat as $value):?>
                            <p>
                                <span class="ronde"><img src="<?php echo $value['photo'] ?>" alt="" height='20px' width='20px' style="border-radius:50%;object-fit:cover;">
                                </span>
                                <span class="name">
                                    <?php echo $value['nom'].' '.$value['prenom']?>
                                </span>
                                    <?php if($i == 1):?>
                                        <span class="barre" style='width :40%; background-color: <?php echo $tabs[$i]?> ;'></span>
                                        
                                    <?php elseif($i == 2):?>                                      
                                        <span class="barre" style='width :<?php echo 40-$voixGagnant  ?>%;background-color: <?php echo $tabs[$i]?>'></span>                                            
                                    <?php elseif($i == 3):?>
                                        <span class="barre" style='width :<?php echo 4?>%;background-color: <?php echo $tabs[$i]?>'></span>  
                                    <?php endif?>
                                <?php echo $value['nombre'];  ?>
                            </p>
                            <?php $i++; ?>
                        <?php endforeach?>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
  $script = ASSETS_JS.'script.js';
  $script1 = ASSETS_JS.'etudiant/acceuil.js';
  require_once FOOTER;
?>