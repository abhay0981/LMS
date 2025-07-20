<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCourse extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Course_model');
        $this->load->library('session');
    }

   public function index() {
    echo "hii";die;
    $instructor_id = $this->session->userdata('id'); // Already working!
    $data['courses'] = $this->Course_model->get_by_instructor($instructor_id);
    $data['name'] = $this->session->userdata('name');

    $this->load->view('instructor/test_dashboard', $data);
}

}
