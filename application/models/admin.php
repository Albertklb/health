<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class admin extends CI_Model
{
    public $tabs='admin';
    public $table='question';
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
    public function question(){
        return $this->db->query('select * from question');

    }
    public function liste_questions()
    {
        return $this->db->get($this->table)->result();
        
    }
    
}