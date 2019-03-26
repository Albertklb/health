<?php
    foreach($data as $valeur){
        echo $valeur->messagepos;
        echo $valeur->email;
        echo  $value->description.   '   ||   '   ."   " . ''.'<a href="'.site_url('Accueil/supprimer_tache/'.$value -> id).'">supprimer</a><br/><br/>'; 
    }
?>