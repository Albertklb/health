<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {
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
    public function vue_sup_admin(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->list_admin();
        $this->load->view('sup_admin',$health_liste);
    }
    public function vue_messages(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->list_messages();
        $this->load->view('messages',$health_liste);
    }
    public function acc_admin(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->liste();
        $this->load->view('accueil_admin',$health_liste);

    }
    public function reponce()
    {
       
        
    } 
    public function changer_profil($health_login){
        $health_photo=$this->input->post('photo');
        $health_logon=$health_login;
        $health_data=array(
            
            'photoAdmin'=> $health_photo
        );
        $this->load->model('admin');
        $health_ret= $this->admin->changer_profil($health_logon,$health_data);
        $this->acc_admin();
    }
    public function validation(){
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
    }

   public function vue_changer_mdp(){
        $this->load->view("changer_mdp");
    }
    public function changer_mdp()
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
     public function vue_ajouter_admin(){
        $this->load->view("ajouter_admin");
    }
    public function deconnexion()
    {
        $this->session->unset_userdata('is_connected');
        redirect('Accueil/admin');
    }
    public function ajouter_admin(){
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
 	
	public function conf_sup_admin($health_a)
	{
		$health_id=array('idAdmin'=>$health_a);
        $this->load->model('admin');
        $health_result['res']=$this->admin->affi_admin($health_id);
       
       $this->load->view('vue_conf_sup_admin',$health_result);
		

	}
   
}
