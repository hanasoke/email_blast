<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library(['form_validation', 'email']);
        $this->load->model('Call_model');
    }

    // Custom email validation
    public function valid_emails($str) 
    {
        if(empty($str)) return true;
        
        $emails = explode(',', $str);
        $invalid = [];
        $allowed_domains = ['gmail.com', 'yahoo.com'];
        
        foreach($emails as $email) {
            $email = trim($email);
            
            if(empty($email)) {
                $this->form_validation->set_message('valid_emails', 'Remove empty entries between commas');
                return false;
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $invalid[] = $email;
                continue;
            }
            
            $domain = explode('@', $email);
            $domain = strtolower(end($domain));
            
            if(!in_array($domain, $allowed_domains)) {
                $invalid[] = $email." (domain not allowed)";
            }
        }
        
        if(!empty($invalid)) {
            $this->form_validation->set_message('valid_emails', 'Invalid emails: '.implode(', ', $invalid));
            return false;
        }
        
        return true;
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
        $this->form_validation->set_rules('hrd_emails', 'HRD Emails', 'required|callback_valid_emails');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        
        // Custom validation for user selection
        if(empty($this->input->post('users'))) {
            $this->form_validation->set_rules('users[]', 'Users', 'required', [
                'required' => 'Select at least one user'
            ]);
        }
        
        if($this->form_validation->run() === FALSE) {
            $data['users'] = $this->Call_model->get_all_users();
            $this->load->view('templates/header');
            $this->load->view('call/view', $data);
            $this->load->view('templates/footer');
        } else {
            // Process email blast
            $hrd_emails = array_filter(explode(',', $this->input->post('hrd_emails')));
            $user_emails = $this->Call_model->get_user_emails_by_names($this->input->post('users')));
            
            $all_recipients = array_merge(
                $hrd_emails,
                array_column($user_emails, 'email')
            );
            
            if(!empty($all_recipients)) {
                $this->send_emails(
                    $all_recipients,
                    $this->input->post('title'),
                    $this->input->post('message')
                );
                
                // Save to database
                $blast_data = [
                    'hrd_emails' => $this->input->post('hrd_emails'),
                    'user_emails' => implode(',', array_column($user_emails, 'email')),
                    'title' => $this->input->post('title'),
                    'message' => $this->input->post('message'),
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                $this->Call_model->save_email_blast($blast_data);
                
                $this->session->set_flashdata('success', 'Email blast sent successfully!');
            } else {
                $this->session->set_flashdata('error', 'No valid recipients found');
            }
            
            redirect('call');
        }
    }
    
    private function send_emails($recipients, $subject, $message)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'mail.ptdika.com',
            'smtp_port' => 465,
            'smtp_user' => 'notification@ptdika.com',
            'smtp_pass' => 'D1k4@Notif123&*',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        
        $this->email->initialize($config);
        
        foreach($recipients as $to) {
            $this->email->clear();
            $this->email->from('notification@ptdika.com', 'PT DIKA');
            $this->email->to(trim($to));
            $this->email->subject($subject);
            $this->email->message($message);
            
            if(!$this->email->send()) {
                log_message('error', 'Email failed to: '.$to.' - '.$this->email->print_debugger());
            }
        }
    }
}