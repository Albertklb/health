<form method="post" action="<?php echo site_url('Accueil/ajouter_admin');?>">
    <input type="text" name="login" placeholder="login" value="<?php echo set_value('login')?>"/>
    <?php echo form_error('login','<em>','</em>') ?>
    <br/> 
    <input type="mdp" name="mdp" placeholder="mot de passe" value="<?php echo set_value('mdp')?>"/>
    <?php echo form_error('mdp','<em>','</em>') ?>
    <br/>
    <input type="text" name="email" placeholder="email" value="<?php echo set_value('email')?>"/>
    <?php echo form_error('email','<em>','</em>') ?>
    <br/>
    <input type=submit value="envoyer"/>
</form>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>