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
        
        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['templates'] = $this->Call_model->get_templates();
        $data['applicants'] = $this->Call_model->get_all_applicants();
        
        $this->load->view('templates/header');
        $this->load->view('call/view', $data);
        $this->load->view('templates/footer');
    }

    public function send_blast()
    {
        $this->form_validation->set_rules('hrd_emails', 'HRD Emails', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $hrd_emails = $this->input->post('hrd_emails');
            $subject = $this->input->post('subject');
            $content = $this->input->post('content');
            
            $applicants = $this->Call_model->get_all_applicants();
            
            if (empty($applicants)) {
                $this->session->set_flashdata('error', 'No applicants found');
                redirect('call');
            }
            
            // Simpan template
            $recipients = array_column($applicants, 'email');
            $recipient_str = implode(', ', $recipients);
            
            $template_data = [
                'hrd_emails' => $hrd_emails,
                'recipient' => $recipient_str,
                'subject' => $subject,
                'content' => $content,
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('user_id')
            ];
            
            $template_id = $this->Call_model->save_template($template_data);
            
            // Kirim email
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'hanasoke@gmail.com',
                'smtp_pass' => '------------',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];
            
            $this->email->initialize($config);
            
            $success = 0;
            $failed = 0;
            
            foreach ($applicants as $applicant) {
                $personalized_content = str_replace(
                    ['{nama}', '{email}'],
                    [$applicant->nama, $applicant->email],
                    $content
                );
                
                $this->email->clear();
                $this->email->from($hrd_emails, 'HRD Team');
                $this->email->to($applicant->email);
                $this->email->subject($subject);
                $this->email->message($personalized_content);
                
                if ($this->email->send()) {
                    $success++;
                } else {
                    $failed++;
                    log_message('error', 'Email failed to send to: '.$applicant->email);
                }
            }
            
            $message = "Email blast completed!<br>";
            $message .= "Success: {$success} emails<br>";
            $message .= "Failed: {$failed} emails";
            
            $this->session->set_flashdata('success', $message);
            redirect('call');
        }
    }
}