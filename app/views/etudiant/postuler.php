<?php
$title = "postuler";
require_once HEADER;
?>
  <form action="candidature-etudiant" method="post" enctype="multipart/form-data">
    <label for="photo">Insérer votre photo de profil :</label>
    <input type="file" name="photo" id="photo" accept="image/*"><br>
    <label for="video">Insérer une vidéo  pour votre campagne (max. 1 minute) :</label>
    <input type="file" name="video" id="video" accept="video/*" required>
    <textarea  class="form-control" name="projet" rows="15" id="myTextarea"  placeholder="Mentionnez ici votre motivation"></textarea><br>
    <input type="submit" value="Postuler">
  </form>
<?php
  require_once FOOTER;
?>