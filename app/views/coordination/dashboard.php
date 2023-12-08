<?php
    $title = "choix groupe";
    require_once HEADER;
?>
<a href="voir-les-candidatures">voir les candidatures</a><br>
<a href="lancer-les-candidatures">oganiser les candidatures</a><br>
<a href="lancer-les-votes">lancer les votes</a><br>
<a href="publier-les-resultat">publlier les resultats</a><br>
<a href="relancer-les-votes">relancer les elections</a><br>
<?php
    echo 'nombre candidature '. $nombreCandidature . '<br>';
    echo 'nombre voix ' . $nombreVoix . '<br>';
    echo 'voix gagnant '.$voixGagnant . '<br>';//qui permettra de faire la bare de progression 
    echo 'jourVote restant '.$jourVoteRestant . '<br>';
?>

<?php
    if(isset($notif))
        echo $notif;
?>
<!-- le bouton retour-->
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
    require_once FOOTER;
?>