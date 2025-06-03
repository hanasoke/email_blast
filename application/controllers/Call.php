<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('call/view');
        $this->load->view('templates/footer');
    }
}

?>