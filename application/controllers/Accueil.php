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
    public function accueil_admin()
    {
        $this->load->view('accueil_admin');
    }
    public function acc_admin(){
        $this->load->model('admin');
        $health_liste['data']= $this->admin->liste();
        $this->load->view('accueil_admin',$health_liste);

    }
    public function parametre()
    {
        $this->load->model('admin');
        $health_emails['data']= $this->admin->emails();
        $this->load->view('parametre',$health_emails);
        
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
        $health_data=array(
            'email'=>health_email
        );
        $this->load->model('admin');
        $this->admin->addemail($health_data); 
        $health_msg= 'ajouter avec succes';
        $this->load->view('conf_add_admin');  
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
//     public function select_data()
// 	{	//affiche les taches se trouvant dans la bdd sur la view liste_taches
// 		$this->load->model('admin');
// 		$donnee ['tache']=$this->admin->recupere_datas();
// 		 $this->load->view('liste_taches',$donnee);
// 	}

// 	public function sup_tache()

// 	{   //supprime la tache selectionnee
// 		$idtache = $this -> uri -> segment(3);
// 		$this -> load -> model('insertion_bdd');
// 		$this -> insertion_bdd->sup_tache($idtache);
// 		redirect('indexx/select_data');

// 	}

// 	public function conf_supp_tache()
// 	{
// 		$idtache = $this -> uri -> segment(3);
// 		$this->load->model('insertion_bdd');
// 		$resultat['res']=$this->insertion_bdd->afficher_tache($idtache);
// 		$this->load->view('confirmation_supp_tache',$resultat);
		

// 	}
   
// }
