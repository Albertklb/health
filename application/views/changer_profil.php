salut prisca
<?php
    echo $this->session->photo;
  echo $this->session->login;
   
?><br/>
<form method="post" action="<?php echo site_url('Accueil/changer_profil/'.$this->session->login);?>">
<input type="file" name="photo"/><br/> <input type=submit value="envoyer"/>
</form>
<a href="<?php echo site_url('Accueil/acc_admin');?>">retour</a>