<?php
    $title = "dashboard";
    $style = ASSETS_CSS."dash.css";
    require_once HEADER;
?>
<a href="voir-les-candidatures">voir les candidatures</a><br>
<a href="lancer-les-candidatures">oganiser les candidatures</a><br>
<a href="lancer-les-votes">lancer les votes</a><br>
<a href="publier-les-resultat">publlier les resultats</a><br>
<a href="relancer-les-votes">relancer les elections</a><br>
<?php
    echo 'coordination '. $coordination . '<br>';
    echo 'nombre candidature '. $nombreCandidature . '<br>';
    echo 'nombre voix ' . $nombreVoix . '<br>';
    echo 'voix gagnant '.$voixGagnant . '<br>';//qui permettra de faire la bare de progression 
    echo 'jourVote restant '.$jourVoteRestant . '<br>';
?>
<?php if(count($resultat) > 0):?>
    <p>Resultat</p>
    <?php foreach($resultat as $value):?>
        <p>
            <?php echo $value['nom'].' '.$value['postNom'].' '.$value['prenom'].' '.$value['nombre'];?>
        </p>
    <?php endforeach?>
<?php endif?>

        <?php
            if(isset($notif))
                echo $notif;
        ?>

    </div>
</div>
<?php
    require_once FOOTER;
?>