<?php
    $title = 'password';
    require_once HEADER;
?>
    <form action="changer mot de passe" method="post">
        <input type="text" name="oldMdp" id="" placeholder="Entrer l'ancien mot de passe"><br>
        <input type="text" name="newMdp" id="" placeholder="Entrer le nouveau mot de passe"><br>
        <input type="text" name="confMdp" id="" placeholder="Confirmer le nouveau mot de passe"><br>
        <input type="submit" value="Valider">
    </form>
    <?php
        if(isset($notif))
            echo $notif;
    ?>
    <a href="retour?vers=les-dashboard-de-la-coordination">Retour</a>
<?php
    require_once FOOTER
?>