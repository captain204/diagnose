<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('users/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'email' => $row->email,
		'password' => $row->password,
        );
            
            $data['content'] ='users/users_read';
            $this->load->view('layouts/main_clinic', $data);
            #$this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patients'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('name'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	);
        $this->load->view('users/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('name', $row->name),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patients'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('patients'));
        }
    }
    
    
    public function login(){
        
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($this->form_validation->run()==false){
            $this->load->view('users/login'); 
        }else{

        $user = $this->Users_model->login($username,$password);

        //Vallidating users data
        if($user){

            /*$this->session->set_userdata('clinic_id',$user['id']);
            $this->session->set_userdata('name',$user['name']);*/
            $logged_user = $this->Users_model->get_by_id($user['id']);
            $this->session->set_userdata('username',$logged_user->username);
            $this->session->set_userdata('id',$logged_user->id);
            $this->session->set_flashdata('login','You are currently logged in');
            
            redirect('patients');
            
                     
        }   else{
        // Set login error
            $this->session->set_flashdata('fail','Invalid user name or password');
            redirect('users/login');
        }

    }
}


    public function logout(){

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('users/login');
    }










    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('email_verified_at', 'email verified at', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('remember_token', 'remember token', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-31 12:19:46 */
/* http://harviacode.com */