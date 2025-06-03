<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
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

    public function get_user($user_id) 
    {
        return $this->db->get_where('users', array('user_id' => $user_id))->row_array();
    }

    public function create_user()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address')
        );

        return $this->db->insert('users', $data);
    }

    public function update_user($user_id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address')
        );

        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }

    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('users');
    }
}


?>