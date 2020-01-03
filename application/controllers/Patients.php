<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patients extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Patients_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'patients/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'patients/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'patients/index.html';
            $config['first_url'] = base_url() . 'patients/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Patients_model->total_rows($q);
        $patients = $this->Patients_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'patients_data' => $patients,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $data['title'] = 'Start Diagnosis';
        $data['content'] ='patients/patients_list';
        $this->load->view('layouts/main_clinic', $data);

        #$this->load->view('patients/patients_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Patients_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'firstname' => $row->firstname,
		'lastname' => $row->lastname,
		'marital_status' => $row->marital_status,
		'date_birth' => $row->date_birth,
		'phone' => $row->phone,
		'email' => $row->email,
		'address' => $row->address,
		'occupation' => $row->occupation,
		'doc_name' => $row->doc_name,
		'doc_id' => $row->doc_id,
        );
        
            $data['title'] = 'Patient';
            $data['content'] ='patients/patients_read';
            $this->load->view('layouts/main_clinic', $data);
            #$this->load->view('patients/patients_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patients'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Add Patient',
            'action' => site_url('patients/create_action'),
	    'id' => set_value('id'),
	    'firstname' => set_value('firstname'),
	    'lastname' => set_value('lastname'),
	    'marital_status' => set_value('marital_status'),
	    'date_birth' => set_value('date_birth'),
	    'phone' => set_value('phone'),
	    'email' => set_value('email'),
	    'address' => set_value('address'),
	    'occupation' => set_value('occupation'),
	    'doc_name' => set_value('doc_name'),
	    'doc_id' => set_value('doc_id'),
    );
    
        $data['title'] = 'Start Diagnosis';
        $data['content'] ='patients/patients_form';
        $this->load->view('layouts/main_clinic', $data);
        #$this->load->view('patients/patients_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'marital_status' => $this->input->post('marital_status',TRUE),
		'date_birth' => $this->input->post('date_birth',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'address' => $this->input->post('address',TRUE),
		'occupation' => $this->input->post('occupation',TRUE),
		'doc_name' => $this->input->post('doc_name',TRUE),
		'doc_id' => $this->input->post('doc_id',TRUE),
	    );
            $this->Patients_model->insert($data);
            $last_id = $this->db->insert_id();
            $this->session->set_userdata('patient_id',$last_id);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('diagnoses/create'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Patients_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update Patient Information',
                'action' => site_url('patients/update_action'),
		'id' => set_value('id', $row->id),
		'firstname' => set_value('firstname', $row->firstname),
		'lastname' => set_value('lastname', $row->lastname),
		'marital_status' => set_value('marital_status', $row->marital_status),
		'date_birth' => set_value('date_birth', $row->date_birth),
		'phone' => set_value('phone', $row->phone),
		'email' => set_value('email', $row->email),
		'address' => set_value('address', $row->address),
		'occupation' => set_value('occupation', $row->occupation),
		'doc_name' => set_value('doc_name', $row->doc_name),
		'doc_id' => set_value('doc_id', $row->doc_id),
        );
            $data['title'] = 'Patient';
            $data['content'] ='patients/patients_form';
            $this->load->view('layouts/main_clinic', $data);
            #$this->load->view('patients/patients_form', $data);
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
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'marital_status' => $this->input->post('marital_status',TRUE),
		'date_birth' => $this->input->post('date_birth',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'address' => $this->input->post('address',TRUE),
		'occupation' => $this->input->post('occupation',TRUE),
		'doc_name' => $this->input->post('doc_name',TRUE),
		'doc_id' => $this->input->post('doc_id',TRUE),
	    );

            $this->Patients_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('patients'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Patients_model->get_by_id($id);

        if ($row) {
            $this->Patients_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('patients'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patients'));
        }
    }


    public function results($id)
    {

        
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('marital_status', 'marital status', 'trim|required');
	$this->form_validation->set_rules('date_birth', 'date birth', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('occupation', 'occupation', 'trim|required');
	$this->form_validation->set_rules('doc_name', 'doc name', 'trim|required');
	$this->form_validation->set_rules('doc_id', 'doc id', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Patients.php */
/* Location: ./application/controllers/Patients.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-31 12:18:53 */
/* http://harviacode.com */