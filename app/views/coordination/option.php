<?php
    if(!isset($_SESSION))
        session_start();
    $title = "option";
    require_once HEADER;
?>
<a href="voir-les-candidatures">voir les candidatures</a><br>
<a href="lancer-les-candidatures">oganiser les candidatures</a><br>
<a href="lancer-les-votes">lancer les votes</a><br>
<a href="publier-les-resultat">publlier les resultats</a><br>
<a href="relancer-les-votes">relancer les votes</a><br>

<?php if(isset($_SESSION['idPromotion'])):?>
    <?php if($_SESSION['idPromotion'] == 1):?>
        <a href="retour?vers=authentification-coordination">Retour</a>
    <?php else:?>
        <a href="retour?vers=choix-groupe">Retour</a>
    <?php endif?>
<?php else:?>
    <?php header("Location: retour?vers=authentification-coordination")?>
<?php endif?>
<?php
    if(isset($notif)) 
        echo $notif;
?>