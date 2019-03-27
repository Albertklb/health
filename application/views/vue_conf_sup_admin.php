<h1>Suppression de l'admin</h1> <hr>

    <p>voulez-vous vraiment supprimer l'admin: <br> </p>

    <?php
        
        echo $res->loginAdmin.'  '.$res->emailAdmin;
        $id=$idAdmin;
            
    ?>
    <a href="<?php echo site_url('Accueil/acc_admin');?>">NON</a>
    <a href="<?php echo site_url('Accueil/sup_admin/'.$id);?>">OUI</a>
