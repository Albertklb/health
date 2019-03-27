salut prisca
<?php
    echo $this->session->photo;
  echo $this->session->login;
   
?><br/>
<form method="post" action="<?php echo site_url('Accueil/changer_profil/'.$this->session->login);?>">
<input type="file" name="photo"value="<?php echo set_value('photo')?>">
    <?php echo form_error('photo','<em>','</em>') ?><br/>
    <br/> <input type=submit value="envoyer"/>
</form>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>