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
        $login=$this->input->post('login');
        $mdp=$this->input->post('mdp');
        $data=array(
            'loginAdmin'=>$login,
            'mdpAdmin'=> $mdp
        );
        $this->load->model('admin');
        $ret= $this->admin->verifier($data);
        if(count($ret)>0)
        {
            $user=$ret[0];
            $d=array (
                'id'=>$user->id,
                'login'=>$user->loginAdmin,
                'mdp'=>$user->mdpAdmin,
                'is_connected'=>true
            );
            $loginAdmin=$d['login'];
            $mdpAdmin=$d['mdp'];
            if($login=$loginAdmin && $mdp=$mdpAdmin)
            {
                $this->session->set_userdata($d);
                
            }
            else{
                $d=array(
                    'error_login'=> 'login ou mot de passe incorrect'
                );
                $this->session->set_flashdata($d);
                $this->admin();
    
            }
            $this->load->model('admin');
            $liste['data']= $this->admin->liste();
            $this->load->view('accueil_admin',$liste);

        }
        else
        {
            $d=array(
                'error_login'=> 'login ou mot de passe incorrect'
            );
            $this->session->set_flashdata($d);
            $this->admin();

        }
    }

   public function vue_changer_mdp(){
        $this->load->view("changer_mdp");
    }
    public function changer_mdp()
    {
        $amdp=$this->input->post('amdp');
        $nmdp=$this->input->post('nmdp');
        $cmdp=$this->input->post('cmdp');
        if($nmdp!=$cmdp){

        }
        else{
            $date=array(
                'mdpAdmin'=>$nmdp
            );

           
                $this->load->model('admin');
                $this->admin->addmdp($amdp,$date); 
                $this->load->model('admin');
               
                $red=$this->admin->question(); 
                $result=array('data'=>$red);
                $this->load->view('accueil_admin',$result);      
            //}
        }
    }
    /* 
    public function send_mail(){
        $message=$this->input->post('mess');
        $email = $this -> uri -> segment(3);
        $this->laod->library('email');
        $this->email->from('health_proximity@gmail.com');
        $this->email->to($email);
        $this->email->subject('reponce');
        $this->email->message($message);
        $this->email->send();
    }*/
   
}