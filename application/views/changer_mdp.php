<form method="post" action="<?php echo site_url('Accueil/changer_mdp');?>" >
    <input type="text" name="amdp" placeholder="ancien mot de passe"  value="<?php echo set_value('amdp')?>">
    <?php echo form_error('amdp','<em>','</em>') ?><br/>
    <input type="password" name="nmdp" placeholder="nouveau mot de passe" value="<?php echo set_value('nmdp')?>">
    <?php echo form_error('nmdp','<em>','</em>') ?><br/>
    <input type="password" name="cmdp" placeholder="confirmer"  value="<?php echo set_value('cmdp')?>">
    <?php echo form_error('cmdp','<em>','</em>') ?><br/>
    <input type="submit" value="changer">
</form>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>