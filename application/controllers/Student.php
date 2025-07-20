<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->check_role('student');
    }

    public function dashboard() {
        $this->load->view('student/dashboard');
    }

    private function check_role($role) {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== $role) {
            redirect('login');
        }
    }
}
