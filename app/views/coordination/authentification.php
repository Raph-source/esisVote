<?php
  $title = "Authentification";
  require_once HEADER;
?>
<form action="authentification-coordination" method="post">
    <input type="text" name="matricule" placeholder="Matricule"><br>
    <input type="password" name="password"  placeholder="Mot de passe"><br>
    <input type="submit" value="se connecter">
  <?php
    if (isset($notif))
      echo $notif;
  ?>
</form>
<?php
  require_once FOOTER;
?>
