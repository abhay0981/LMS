<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_role('admin');
        $this->load->model('Course_model');
    }

    public function dashboard()
    {
        $data['courses'] = $this->Course_model->get_all();

        // Get total users (optional)
        $data['total_courses'] = count($data['courses']);
        $data['total_instructors'] = $this->db->where('role', 'instructor')->count_all_results('users');
        $data['total_students'] = $this->db->where('role', 'student')->count_all_results('users');
        $this->load->view('admin/dashboard', $data);
    }

    private function check_role($role)
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== $role) {
            redirect('login');
        }
    }
}
