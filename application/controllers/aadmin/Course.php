<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
        $this->load->model('Course_model');
    }

    public function index() {
        $data['courses'] = $this->Course_model->get_all();
        $data['instructors'] = $this->db->where('role', 'instructor')->get('users')->result();
        $this->load->view('admin/courses/index', $data);
    }

    public function create() {
        $data['instructors'] = $this->db->where('role', 'instructor')->get('users')->result();
        if ($this->input->post()) {
            $upload_path = './uploads/';
            $thumbnail = '';

            if ($_FILES['thumbnail']['name']) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('thumbnail')) {
                    $thumbnail = $this->upload->data('file_name');
                }
            }

            $data = [
                'title' => $this->input->post('title'),
                'instructor_id' => $this->input->post('instructor_id'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                'thumbnail' => $thumbnail
            ];

            $this->Course_model->insert($data);
            $this->session->set_flashdata('success', 'Course created successfully.');
            redirect('admin/course');
        }

        $this->load->view('admin/courses/create');
    }

    public function edit($id) {
        $data['course'] = $this->Course_model->get($id);
$data['instructors'] = $this->db->where('role', 'instructor')->get('users')->result();

        if ($this->input->post()) {
            $upload_path = './uploads/';
            $course = $this->Course_model->get($id);
            $thumbnail = $course->thumbnail;

            if ($_FILES['thumbnail']['name']) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('thumbnail')) {
                    $thumbnail = $this->upload->data('file_name');
                }
            }

            $update_data = [
                'title' => $this->input->post('title'),
                'instructor_id' => $this->input->post('instructor_id'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                'thumbnail' => $thumbnail
            ];

            $this->Course_model->update($id, $update_data);
            $this->session->set_flashdata('success', 'Course updated successfully.');
            redirect('admin/course');
        }

        $this->load->view('admin/courses/edit', $data);
    }

    public function delete($id) {
        $this->Course_model->delete($id);
        $this->session->set_flashdata('success', 'Course deleted successfully.');
        redirect('admin/course');
    }

   

}
