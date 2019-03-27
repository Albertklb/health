<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class admin extends CI_Model
{
    public $tabs='admin';
    public $table='question';
    public $tablo='email';
    public function verifier($data)
    {
        $this->db->where($data);
        $q=$this->db->get($this->tabs);
        $res=$q->result();
        return $res;

    }
    public function verifiermdp($f)
    {
        $this->db->where($f);
        $a=$this->db->get($this->tabs);
        $ste=$a->result();
        return $ste; 
    }
    public function addmdp($a,$b)
    {
        $this->db->where('mdpAdmin',$a);
        $this->db->update($this->tabs, $b);
    }
    public function changer_profil($a,$b)
    {
        $this->db->where('loginAdmin',$a);
        $this->db->update($this->tabs, $b);
    }
    public function question(){
        return $this->db->query('select * from question');

    }
    public function liste()
    {
        return $this->db->get($this->table)->result();
        
    }
    public function affi_admin($idtache)
    {
    
     $this->db->where('idAdmin',$idtache);
     $res= $this->db->get($this->tabs);
     $resultat=$res->result();
     return $resultat;

    }
    public function sup_admin($tacheid)
    
    {
        $this->db->where('idAdmin',$tacheid);
        $this->db->delete('admin');
    }
    public function list_admin()
    {
        return $this->db->get($this->tabs)->result();
        
    }
    public function addemail($infos)
    {
        $this->db->insert($this->tabs, $infos);
    }
    
}