<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<a href="<?php echo site_url('Accueil/vue_changer_mdp');?>">changer mot de passe</a><br/><br/>

<?php
    foreach($data as $val){
        echo $val->Messagepos;
    }
?>
<form method="post" action="<?php echo site_url('Accueil/send_mail/$value->email');?>">
    <input type="text" name="mess"/><br/><input type=submit value="envoyer"/>
</form>
