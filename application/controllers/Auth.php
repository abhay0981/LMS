<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->input->post()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->get_by_email($email);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'role' => $user->role,
                    'name' => $user->name,
                    'logged_in' => true
                ]);
                // Redirect based on role
                switch ($user->role) {
                    case 'admin':
                        redirect('admin/dashboard');
                        break;
                    case 'instructor':
                        redirect('instructor/dashboard');
                        break;
                    case 'student':
                        redirect('student/dashboard');
                        break;
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid credentials');
            }
        }
        $this->load->view('auth/login');
    }

    public function register()
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('success', 'Registered! You can now login.');
            redirect('auth/login');
        }
        $this->load->view('auth/register');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
