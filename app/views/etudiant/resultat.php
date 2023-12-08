<?php
    $title = "resultat";
    require_once HEADER;
?>

<?php if(count($resultat) > 0):?>
    <p>Resultat</p>
    <?php foreach($resultat as $value):?>
        <p>
            <?php echo $value['nom'].' '.$value['postNom'].' '.$value['prenom'].' '.$value['nombre'];?>
        </p>
    <?php endforeach?>
<?php endif?>
<a href="retour?vers=option etudiant">Retour</a>
<?php
    require_once FOOTER;
?>