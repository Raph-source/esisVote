<?php
  $title = "Authentification";
  require_once HEADER;
?>
<form action="autentification-etudiant" method="post">
    <input type="text" name="matricule" class="form-control" id="matricule" placeholder="Matricule"> <br>
    <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe"><br>
    <input type="submit" value="Se connecter">
</form>
<?php 
  if(isset($notif))
    echo $notif;
?>
<?php
  require_once FOOTER;
?>
            
          