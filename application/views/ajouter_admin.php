<form method="post" action="<?php echo site_url('Accueil/ajouter_admin');?>">
    <input type="text" name="login"/><br/>  <input type="mdp" name="mdp"/><br/><input type="text" name="email"/><br/> <input type="file" name="photo"/><br/><input type=submit value="envoyer"/>
</form>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>