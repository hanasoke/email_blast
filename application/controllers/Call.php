<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'url', 'text']);
        $this->load->library(['form_validation', 'email', 'session']);
        $this->load->model('Call_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        
    }
}

?>