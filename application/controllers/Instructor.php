<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->check_role('instructor');
        $this->load->model('Course_model');
    }

       public function index()
    {
        // echo "hii";die;
        $instructor_id = $this->session->userdata('id');
        // echo 'Instructor ID: ' . $instructor_id;
        $data['courses'] = $this->Course_model->get_by_instructor($instructor_id);
        // echo '<pre>';
        // print_r($data['courses']);
        // echo '</pre>';

        $this->load->view('instructor/dashboard_new', $data);
    }
    public function dashboard() {
        $this->load->view('instructor/dashboard_new');
    }

    private function check_role($role) {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== $role) {
            redirect('login');
        }
    }
}
