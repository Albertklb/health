<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<a href="<?php echo site_url('Accueil/vue_changer_mdp');?>">changer mot de passe</a><br/><br/>
<a href="<?php echo site_url('Accueil/deconnexion');?>">deconnexion</a><br/><br/>
<?php
    echo 'Welcome '.$this->session->set_userdata('login');
    foreach($data as $val){
        echo $val->Messagepos;
        echo $val->Emailpos;
    }
?>
<form method="post" action="<?php echo site_url('Accueil/send_mail/$value->Emailpos');?>">
    <input type="text" name="mess"/><br/><input type=submit value="envoyer"/>
</form>

<a href="<?php echo site_url('Accueil/parametre');?>">parametre</a><br/><br/>