<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php
    echo '<h3><em>Welcome : </em>'.$this->session->login.'</h3>';
    $photo=$this->session->photo;
    
?>
<br/>
<a href="<?php echo site_url('Accueil/vue_changer_mdp');?>">changer mot de passe</a><br/><br/>
<a href="<?php echo site_url('Accueil/deconnexion');?>">deconnexion</a><br/><br/>
<a href="<?php echo site_url('Accueil/vue_changer_profil');?>">changer profile</a><br/><br/>
<h5>_________________________________________________________________________________________</h5>

<a href="<?php echo site_url('Accueil/vue_ajouter_admin');?>">ajouter_admin</a><br/><br/>
<a href="<?php echo site_url('Accueil/vue_sup_admin');?>">supprimer_admin</a><br/><br/>
<a href="<?php echo site_url('Accueil/vue_messages');?>">messages</a><br/><br/>