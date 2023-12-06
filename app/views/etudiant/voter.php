<?php
    $title = "voter";
    require_once HEADER;
?>
    <?php if($nombreCandidature > 0):?>
        <?php foreach($candidats as $data):?>

        <img src="<?php echo $data['photo'] ?>" alt="" width="200" height="200">
        <h4><?php echo $data['nom'] . ' ' . $data['postNom'] . ' ' . $data['prenom']; ?></h4>
        <p><?php echo $data['filiere']; ?></p>

        <?php if($tempsDeVote):?>
            <form action="voix etudiant" method="post">
                <input type="hidden" name="idCandidature" value="<?php echo $data['idCandidature'];?>"><br>
                <input type="submit" value="Voter">
            </form>
        <?php else:?>
            <button id="disabledVoter">Valider</button>
        <?php endif; ?>
        
        <video src="<?php echo $data['video'];?>"></video>
        <p><?php echo $data['projet'];?></p>

        <?php endforeach;?>
    <?php else:?>
        <h1>Aucun candidat</h1>
    <?php endif?>
    <a href="retour?vers=option etuddiant">Retour</a>
<?php
    require_once FOOTER;
?>