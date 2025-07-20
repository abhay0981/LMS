<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'instructor') {
            redirect('login');
        }
        $this->load->model('Lesson_model');
        $this->load->model('Course_model');
    }

    public function index($course_id) {
        // Check if instructor owns the course
        $instructor_id = $this->session->userdata('id');
        $course = $this->Course_model->get($course_id);
        if ($course->instructor_id != $instructor_id) {
            show_error('Unauthorized access', 403);
        }

        $data['lessons'] = $this->Lesson_model->get_all_by_course($course_id);
        $data['course'] = $course;
        $this->load->view('instructor/lessons/index', $data);
    }

    public function create($course_id) {
        $instructor_id = $this->session->userdata('id');
        $course = $this->Course_model->get($course_id);

        if ($course->instructor_id != $instructor_id) {
            show_error('Unauthorized access', 403);
        }

        if ($this->input->post()) {
            $upload_path = './uploads/';
            $file = '';

            if ($_FILES['file']['name']) {
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = '*';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $file = $this->upload->data('file_name');
                }
            }

            $data = [
                'course_id' => $course_id,
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'video_url' => $this->input->post('video_url'),
                'file' => $file
            ];

            $this->Lesson_model->insert($data);
            $this->session->set_flashdata('success', 'Lesson added.');
            redirect('instructor/lesson/index/' . $course_id);
        }

        $data['course'] = $course;
        $this->load->view('instructor/lessons/create', $data);
    }

    public function delete($id) {
        $lesson = $this->Lesson_model->get($id);
        $course = $this->Course_model->get($lesson->course_id);

        if ($course->instructor_id != $this->session->userdata('id')) {
            show_error('Unauthorized access', 403);
        }

        $this->Lesson_model->delete($id);
        $this->session->set_flashdata('success', 'Lesson deleted.');
        redirect('instructor/lesson/index/' . $lesson->course_id);
    }
}
