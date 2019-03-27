<?php
$i=0;
    foreach($data as $val){
        echo $val->loginAdmin.' '.$val->emailAdmin.' <a href="'.site_url('Accueil/conf_sup_admin/'.$val ->idAdmin).'">supprimer</a><br/><br/>';
        
        //<form method="post" action="<?php echo site_url('Accueil/send_mail/$value->Emailpos');//">
       // <input type="text" name="mess"/><br/><input type=submit value="envoyer"/>
    //</form>
    $i++;
    }
?>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>