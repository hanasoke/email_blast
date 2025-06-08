<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_model extends CI_Model 
{
    public function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }
    
    public function save_email_blast($data)
    {
        return $this->db->insert('email_blasts', $data);
    }
    
    public function get_user_emails_by_names($names)
    {
        if(empty($names)) return [];
        
        $this->db->select('email');
        $this->db->where_in('name', $names);
        return $this->db->get('users')->result_array();
    }
    
    public function get_email_history()
    {
        return $this->db->order_by('created_at', 'DESC')
                       ->get('email_blasts')
                       ->result_array();
    }
}