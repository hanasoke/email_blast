<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }
    
    public function save_email_blast($data)
    {
        return $this->db->insert('email_blasts', $data);
    }
    
    public function get_user_emails_by_names($name)
    {
        $this->db->select('email');
        $this->db->where_in('name', $name);
        return $this->db->get('users')->result_array();
    }
}