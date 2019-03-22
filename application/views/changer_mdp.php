<form method="post" action="<?php echo site_url('Accueil/changer_mdp');?>" >
    <input type="text" name="amdp" placeholder="ancien mot de passe"><br/>
    <input type="password" name="nmdp" placeholder="nouveau mot de passe"><br/>
    <input type="password" name="cmdp" placeholder="confirmer"><br/>
    <input type="submit" value="se connecter">
</form>