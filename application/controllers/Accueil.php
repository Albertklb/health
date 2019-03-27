<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

//METHODES D'APPELS DES VUES

    public function index()
	{
		$this->load->view('admin');
    }
    public function admin()
    {
        $this->load->view('admin');
    }
    public function vue_changer_profil(){
        $this->load->view('changer_profil');
    }
    public function vue_conf_sup_admin(){
        $this->load->view('conf_sup_admin');
    }
    public function accueil_admin()
    {
        $this->load->view('accueil_admin');
    }
    public function vue_ajouter_admin(){
        $this->load->view("ajouter_admin");
    }
    public function vue_sup_admin(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->list_admin();
        $this->load->view('sup_admin',$health_liste);
    }
    public function vue_changer_mdp(){
        $this->load->view("changer_mdp");
    }
    public function vue_messages(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->list_messages();
        $this->load->view('messages',$health_liste);
    }

    //accueil admin

    public function acc_admin(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->liste();
        $this->load->view('accueil_admin',$health_liste);

    }
    //vue confirmer suppression
    public function conf_sup_admin($health_a)
	{
		$health_id=array('idAdmin'=>$health_a);
        $this->load->model('admin');
        $health_result['res']=$this->admin->affi_admin($health_id);
       
       $this->load->view('vue_conf_sup_admin',$health_result);
		

	}
    public function reponce()
    {
       
        
    } 
//METHODES DES TRAITEMENTS

    public function changer_profil($health_login){
        $this->form_validation->set_rules('photo','photo', 'required|min_length[4]',
		array('required' => 'Ce champs est obligatoire',
			'min_length' => '4 caractères minimum'));
            if($this->form_validation->run())
            {
                $health_photo=$this->input->post('photo');
                $health_logon=$health_login;
                $health_data=array(
                    
                    'photoAdmin'=> $health_photo
                );
                $this->load->model('admin');
                $health_ret= $this->admin->changer_profil($health_logon,$health_data);
                $this->acc_admin();
            }
            else
            {
                $this->load->view('changer_profil');
            }
    }
    public function validation(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]',
		array('required' => 'Ce champs est obligatoire',
            'min_length' => '4 caractères minimum'));
            $this->form_validation->set_rules('mdp','mdp', 'required|min_length[4]',
            array('required' => 'Ce champs est obligatoire',
                'min_length' => '4 caractères minimum'));
            if($this->form_validation->run())
            {
       // $this->defaut();
                $health_login=$this->input->post('login');
                $health_mdp=$this->input->post('mdp');
                $health_data=array(
                    'loginAdmin'=>$health_login,
                    'mdpAdmin'=> $health_mdp
                );
                $this->load->model('admin');
                $health_ret= $this->admin->verifier($health_data);
                if(count($health_ret)>0)
                {
                    $user=$health_ret[0];
                    $health_d=array (
                        //'id'=>$user->id,
                        'login'=>$user->loginAdmin,
                        'mdp'=>$user->mdpAdmin,
                        'photo'=>$user->photoAdmin,
                        'is_connected'=>true
                    );
                    $health_loginAdmin=$health_d['login'];
                    $health_mdpAdmin=$health_d['mdp'];
                    if($health_login==$health_loginAdmin && $health_mdp==$health_mdpAdmin)
                    {
                        $this->session->set_userdata($health_d);
                        
                    }
                    else{
                        $health_d=array(
                            'error_login'=> 'login ou mot de passe incorrect'
                        );
                        $this->session->set_flashdata($health_d);
                        $this->admin();
            
                    }
                    $this->load->model('admin');
                    $health_liste['data']= $this->admin->liste();
                    $this->load->view('accueil_admin',$health_liste);

                }
                else
                {
                    $health_d=array(
                        'error_login'=> 'login ou mot de passe incorrect'
                    );
                    $this->session->set_flashdata($health_d);
                    $this->admin();

                }
            }else{
                $this->load->view('admin');
            }
    }

  
    public function changer_mdp()
    {
        $this->form_validation->set_rules('amdp','amdp', 'required|min_length[4]',
		array('required' => 'Ce champs est obligatoire',
			'min_length' => '4 caractères minimum'));

		$this->form_validation->set_rules('nmdp', 'nmdp', 'required|min_length[4]',
			array('required' => 'le nouveau mot de passe est obligatoire',
				'min_length' => 'le nouveau mot de passe doit avoir au moin 4 caracteres'));
		
		$this->form_validation->set_rules('cmdp', 'cmdp', 'required|min_length[4]',
            array('required' => 'le nouveau mot de passe est obligatoire',
            'min_length' => 'le nouveau mot de passe doit avoir au moin 4 caracteres'));
        if($this->form_validation->run())
        {
            $health_amdp=$this->input->post('amdp');
            $health_nmdp=$this->input->post('nmdp');
            $health_cmdp=$this->input->post('cmdp');
            if($nmdp!=$cmdp){

            }
            else{
                $health_date=array(
                    'mdpAdmin'=>$health_nmdp
                );

            
                    $this->load->model('admin');
                    $this->admin->addmdp($amdp,$health_date); 
                    $this->load->model('admin');
                
                    $health_redsult=$this->admin->question(); 
                    $health_result=array('data'=>$health_redsult);
                    $this->load->view('accueil_admin',$health_result);      
                //}
            }
        }
        else
        {
            $this->load->view('changer_mdp');
        }
    }
    
    public function deconnexion()
    {
        $this->session->unset_userdata('is_connected');
        redirect('Accueil/admin');
    }
    public function ajouter_admin(){
        $this->form_validation->set_rules('login','login', 'required|min_length[4]',
		array('required' => 'Le login est obligatoire de la tache est obligatoire',
			'min_length' => '4 caractères minimum'));

		$this->form_validation->set_rules('mdp', 'mdp', 'required|min_length[4]',
			array('required' => 'le mot de passe est obligatoire',
				'min_length' => 'le mot de passe doit avoir au moin 4 caracteres'));
		
		$this->form_validation->set_rules('email', 'email', 'required|min_length[10]',
				array('required' => 'l\'adresse Email est obligatoire',
                    'min_length' => ' votre Email doit avoir au moins 10 caracteres'));
        if($this->form_validation->run())
        {
            $health_email=$this->input->post('email');
            $health_login=$this->input->post('login');
            $health_mdp=$this->input->post('mdp');
            $health_photo="accueil.png";
            $health_data=array(
                'loginAdmin'=>$health_login,
                'mdpAdmin'=>$health_mdp,
                'emailAdmin'=>$health_email,
                'photoAdmin'=>$health_photo
            );
            $this->load->model('admin');
            $this->admin->addemail($health_data); 
            $health_msg= 'ajouter avec succes';
            $this->load->view('conf_add_admin');  
        }
        
        else
        {
            $this->load->view('ajouter_admin');
        }
        
    }
   public function sup_admin($health_b)
    {   
        $health_idtache = $health_b;
        $this -> load -> model('admin');
        $this -> admin->sup_admin($health_idtache);

        $this->load->model('admin');
        $health_liste['data']= $this->admin->liste();
        $this->load->view('accueil_admin',$health_liste);

   }

    public function send_mail(){
      
        $health_email = $this -> uri -> segment(3);
        $health_message=$this->input->post('mess');
        $this->laod->library('email');
        $this->email->from('health_proximity@gmail.com');
        $this->email->to($health_email);
        $this->email->subject('reponce');
        $this->email->message($health_message);
        $this->email->send();
    }
 	
	
   
}
