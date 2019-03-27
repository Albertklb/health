<?php
    foreach($data as $valeur){
        echo $valeur->messagepos;
        echo $valeur->email;
        echo  $value->description.   '   ||   '   ."   " . ''.'<a href="'.site_url('Accueil/reponce').'">Repondre</a><br/><br/>'; 
    }
    /*foreach($data as $val){
        echo $val->Messagepos;
        echo $val->Emailpos;
        //<form method="post" action="<?php echo site_url('Accueil/send_mail/$value->Emailpos');//">
       // <input type="text" name="mess"/><br/><input type=submit value="envoyer"/>
    //</form>
    }*/
?>
