<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php
    
    foreach($data as $val){
        echo $val->email.' <a href="'.site_url('Accueil/supprimer'),'">supprimer</a><br/>';
    }
?>
