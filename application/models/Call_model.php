<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function get_templates()
    {
        return $this->db->get('template_email')->result();
    }
    
    public function get_all_applicants()
    {
        return $this->db->get('applicant')->result();
    }
    
    public function save_template($data)
    {
        $this->db->insert('template_email', $data);
        return $this->db->insert_id();
    }
    
    public function get_applicant_emails()
    {
        $this->db->select('email');
        $result = $this->db->get('applicant')->result_array();
        return array_column($result, 'email');
    }
}