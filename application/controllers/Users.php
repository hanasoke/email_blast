<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

	public function index() 
	{
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('templates/header');
		$this->load->view('users/index', $data);
        $this->load->view('templates/footer');
	}

    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/create');
            $this->load->view('templates/footer');
        } else {
            $this->User_model->create_user();
            $this->session->set_flashdata('success', 'User created successfully');
            redirect('users');
        }
    }

    public function edit($user_id)
    {
        $data['user'] = $this->User_model->get_user($user_id);

        if (empty($data['user'])) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'Name', 'required');

        $this->form_validation->set_rules('username', 'Username', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->update_user($user_id);
            $this->session->set_flashdata('success', 'User updated successfully');
            redirect('users');
        }
    }

    public function delete($user_id) 
    {
        $this->User_model->delete_user($user_id);
        $this->session->set_flashdata('success', 'User deleted successfully');
        redirect('users');
    }
    

}
