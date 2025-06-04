<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->model('Call_model');
    }

    public function index()
    {
        $data['users'] = $this->Call_model->get_all_users();
        $this->load->view('templates/header');
        $this->load->view('call/view', $data);
        $this->load->view('templates/footer');
    }

    public function send_blast()
    {
        $this->form_validation->set_rules('hrd_emails', 'HRD Emails', 'required');

        $this->form_validation->set_rules('title', 'Title', 'required');

        $this->form_validation->set_rules('message', ',essage', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            // Get selected users 
            $selected_users = $this->input->post('users') ?:[];

            // Get emails for selected users 
            $user_emails = $this->Call_model->get_user_emails_by_names($selected_users);
            $user_emails_addresses = array_column($user_emails, 'email');

            // Combine HRD emails and user emails 
            $all_recipients = array_merge(
                explode(',', $this->input->post('hrd_emails')),
                $user_emails_addresses
            );

            // Send emails 
            $this->send_emails(
                $all_recipients,
                $this->input->post('title'),
                $this->input->post('message')
            );

            // Save to database 
            $data = [
                'hrd_emails' => $this->input->post('hrd_emails'), 
                'user_emails' => implode(',', $user_emails_addresses),
                'title' => $this->input->post('title'),
                'message' => $this->input->post('message')
            ];

            $this->Call_model->save_email_blast($data);

            $this->session->set_flashdata('success', 'Email blast sent successfully!');
            redirect('call');
        }
    }

    private function send_emails($recipients, $subject, $message) 
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'your_smtp_host',
            'smtp_port' => 'your_email@example.com',
            'smtp_pass' => 'your_password',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        foreach($recipients as $recipient) {
            $this->email->clear();
            $this->email->from('your_email@example.com', 'Your Name');
            $this->email->to(trim($recipient));
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
        }
    }
}

?>