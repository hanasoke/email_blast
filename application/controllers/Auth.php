<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }
    
    public function login()
    {
        if($this->session->userdata('logged_in')) {
            redirect('call');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->User_model->login($username, $password);
            
            if($user) {
                $user_data = [
                    'user_id' => $user->user_id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'logged_in' => true
                ];
                
                $this->session->set_userdata($user_data);
                redirect('call');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth/login');
            }
        }
        
        $this->load->view('auth/login');
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
