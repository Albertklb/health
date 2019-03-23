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