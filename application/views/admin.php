<form method="post" action="<?php echo site_url('Accueil/validation/');?>" >
    <input type="text" name="login" placeholder="login" value="<?php echo set_value('login')?>"/>
    <?php echo form_error('login','<em>','</em>') ?>
    <br/> 
    <input type="password" name="mdp" placeholder="mot de passe" value="<?php echo set_value('mdp')?>"/>
    <?php echo form_error('mdp','<em>','</em>') ?>
    <br/> 
    <input type="submit" value="se connecter">
</form>