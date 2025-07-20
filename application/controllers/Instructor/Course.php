<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

        public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'instructor') {
            redirect('login');
        }
        $this->load->model('Course_model');
    }

    public function index() {
        // echo "here";die;
    $instructor_id = $this->session->userdata('id');
    $data['courses'] = $this->Course_model->get_by_instructor($instructor_id);
    $this->load->view('instructor/courses/index', $data);
}


}
