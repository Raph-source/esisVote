<?php
    $title = "voter";
    require_once HEADER;
?>
    <?php
        if(isset($notif))
            echo $notif;
    ?>
    <?php if($nombreCandidature > 0):?>
        <?php foreach($candidatures as $data):?>

        <img src="<?php echo $data['photo'] ?>" alt="" width="200" height="200">
        <h4><?php echo $data['nom'] . ' ' . $data['postNom'] . ' ' . $data['prenom']; ?></h4>

        <form action="voix etudiant" method="post">
            <input type="hidden" name="idCandidature" value="<?php echo $data['idCandidature'];?>"><br>
            <input type="submit" value="Voter">
        </form>
        
        <video src="<?php echo $data['video'];?>" width="200" height="200" controls></video>
        <p><?php echo $data['projet'];?></p>

        <?php endforeach;?>
    <?php else:?>
        <h1>Aucun candidat</h1>
    <?php endif?>
    <a href="retour?vers=option etuddiant">Retour</a>
<?php
    require_once FOOTER;
?>