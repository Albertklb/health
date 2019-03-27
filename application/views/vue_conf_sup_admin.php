<h1>Suppression de l'admin</h1> <hr>

    <p>voulez-vous vraiment supprimer l'admin: <br> </p>

    <?php
      foreach($res as $resto){
        echo $resto->loginAdmin.'  '.$resto->emailAdmin;
        $id=$resto->idAdmin; 
      }
    ?>
    <a href="<?php echo site_url('Accueil/acc_admin');?>">NON</a>
    <a href="<?php echo site_url('Accueil/sup_admin/'.$id);?>">OUI</a>
