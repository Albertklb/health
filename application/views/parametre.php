<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php
    
    foreach($data as $val){
        echo $val->email.' a href="<?php echo site_url('Accueil/supprimer');?>">supprimer</a><br/>';
    }
?>
<a href="<?php echo site_url('Accueil/vue_changer_mdp');?>">changer mdp</a><br/>
<a href="<?php echo site_url('Accueil/vue_ajouter_admin');?>">ajouter admin</a><br/>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>