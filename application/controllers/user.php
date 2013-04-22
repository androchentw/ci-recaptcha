<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    public function index() {
        $logged_in = $this->session->userdata('logged_in');
        $username = null;
        if ($logged_in == TRUE) {
            $username = $this->session->userdata("username");
        }
        $this->load->view("user_index", array(
            "username" => $username
        ));
    }

    public function login() {
        $logged_in = $this->session->userdata('logged_in');
        
        if (!isset($logged_in) || $logged_in == false) {
            $this->load->library('recaptcha');
            
            $this->load->view('login',array(
                "recaptcha_html" => $this->recaptcha->recaptcha_get_html()
            )); 
        } else {
            redirect(site_url("user"));
        }
    }

    public function submit() {
        $this->load->library('recaptcha');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == FALSE || $password == FALSE) {
            $this->session->set_flashdata('error','Missing username or password');
            redirect(site_url("user/login"));
        }

        $this->recaptcha->recaptcha_check_answer($_SERVER['REMOTE_ADDR'],$this->input->post('recaptcha_challenge_field'),$this->input->post('recaptcha_response_field'));

        if ($username == "123" && $password == "456" && 
            $this->recaptcha->is_valid) {
            $this->session->set_userdata('logged_in','yes');
            $this->session->set_userdata('username', $username);
            redirect(site_url("user"));
        }

        if (!$this->recaptcha->is_valid) {
            $this->session->set_flashdata('error','incorrect captcha');
            redirect(site_url("user/login"));
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url("user"));
    }
}