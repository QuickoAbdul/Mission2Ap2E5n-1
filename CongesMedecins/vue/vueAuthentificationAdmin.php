<?php header( 'content-type: text/html; charset=utf-8' ); ?>

<h1>Connexion espace ADMIN (gestion)</h1>
<form action="./?action=connexionAdmin" method="POST">

    <input type="text" name="nomA" placeholder="Identification de connexion" /><br />
    <input type="password" name="mdpA" placeholder="Mot de passe"  /><br />
    <input type="submit" />

</form>
<br />
