<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diagnoses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Diagnoses_model');
        $this->load->model('Reports_model');
        $this->load->model('Patients_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'diagnoses/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'diagnoses/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'diagnoses/index.html';
            $config['first_url'] = base_url() . 'diagnoses/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Diagnoses_model->total_rows($q);
        $diagnoses = $this->Diagnoses_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'diagnoses_data' => $diagnoses,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('diagnoses/diagnoses_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Diagnoses_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'diarrhorea' => $row->diarrhorea,
		'vomiting' => $row->vomiting,
		'dehydration' => $row->dehydration,
		'patient_id' => $row->patient_id,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('diagnoses/diagnoses_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diagnoses'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Submit',
            'action' => site_url('diagnoses/create_action'),
	    'id' => set_value('id'),
	    'diarrhorea' => set_value('diarrhorea'),
	    'vomiting' => set_value('vomiting'),
	    'dehydration' => set_value('dehydration'),
	    'patient_id' => set_value('patient_id'),
	);
    
        $data['content'] ='diagnoses/diagnoses_form';
        $this->load->view('layouts/main_clinic', $data);
        #$this->load->view('diagnoses/diagnoses_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'diarrhorea' => $this->input->post('diarrhorea',TRUE),
		'vomiting' => $this->input->post('vomiting',TRUE),
		'dehydration' => $this->input->post('dehydration',TRUE),
		'patient_id' => $this->input->post('patient_id',TRUE),
	    );

            $this->Diagnoses_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('diagnoses'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Diagnoses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('diagnoses/update_action'),
		'id' => set_value('id', $row->id),
		'diarrhorea' => set_value('diarrhorea', $row->diarrhorea),
		'vomiting' => set_value('vomiting', $row->vomiting),
		'dehydration' => set_value('dehydration', $row->dehydration),
		'patient_id' => set_value('patient_id', $row->patient_id),
	    );
            $this->load->view('diagnoses/diagnoses_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diagnoses'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'diarrhorea' => $this->input->post('diarrhorea',TRUE),
		'vomiting' => $this->input->post('vomiting',TRUE),
		'dehydration' => $this->input->post('dehydration',TRUE),
		'patient_id' => $this->input->post('patient_id',TRUE),
	    );

            $this->Diagnoses_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('diagnoses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Diagnoses_model->get_by_id($id);

        if ($row) {
            $this->Diagnoses_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('diagnoses'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diagnoses'));
        }
    }

    public function results($id)
    {
            $row = $this->Diagnoses_model->get_by_id($id);
            $row_two = $this->Patients_model->get_by_id($id);
     
            if ($row) {
                $data = array(
            'id' => $row->id,
            'firstname' => $row_two->firstname,
            'lastname' => $row_two->lastname,
            'phone' => $row_two->phone,
            'email' => $row_two->email,
            'address' => $row_two->address,
            'occupation' => $row_two->occupation,
            'doc_name' => $row_two->doc_name,
            'diarrhorea' => $row->diarrhorea,
            'vomiting' => $row->vomiting,
            'dehydration' => $row->dehydration,
            'patient_id' => $row->patient_id,
            'created_at' => $row->created_at,
            'updated_at' => $row->updated_at,
            );
            
            #No cholera
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='mild' && $data['dehydration'] =='mild' ){
                $id =1;
                $data['status'] = 'No cholera';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }  
            #Cholera is mild
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='mild' && $data['dehydration'] =='moderate' ){
                $id =1;
                $data['status'] = 'Mild';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='moderate' && $data['dehydration'] =='mild' ){
                $id =1;
                $data['status']= 'Mild';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is MILD AND Dehydration is MILD THEN Cholera is MILD
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='mild' && $data['dehydration'] =='mild' ){
                $id =1;
                $data['status'] = 'Mild';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }

            #Cholera is moderate
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='mild' && $data['dehydration'] =='severe' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            } 
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='moderate' && $data['dehydration'] =='moderate' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }       
            #If Diarrhoea is MILD AND Vomiting is MODERATE AND Dehydration is SEVERE THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='moderate' && $data['dehydration'] =='severe' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MILD AND Vomiting is SEVERE AND Dehydration is MILD THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='severe' && $data['dehydration'] =='mild' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is MILD AND Dehydration is MODERATE THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='mild' && $data['dehydration'] =='moderate' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is MODERATE AND Dehydration is MILD THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='moderate' && $data['dehydration'] =='mild' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is MODERATE AND Dehydration is MODERATE THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='moderate' && $data['dehydration'] =='moderate' ){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is SEVERE AND Dehydration is MILD THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='severe' && $data['dehydration'] =='mild'){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is MILD AND Dehydration is MILD THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='mild' && $data['dehydration'] =='mild'){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is MILD AND Dehydration is MODERATE THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='mild' && $data['dehydration'] =='moderate'){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is MODERATE AND Dehydration is MILD THEN Cholera is MODERATE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='moderate' && $data['dehydration'] =='mild'){
                $id =2;
                $data['status'] = 'Moderate';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }

            #Cholera is severe
            #If Diarrhoea is MILD AND Vomiting is SEVERE AND Dehydration is MODERATE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='severe' && $data['dehydration'] =='moderate' ){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MILD AND Vomiting is SEVERE AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'mild' && $data['vomiting']=='severe' && $data['dehydration'] =='severe' ){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is MILD AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='mild' && $data['dehydration'] =='severe' ){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is MODERATE AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='moderate' && $data['dehydration'] =='severe' ){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is SEVERE AND Dehydration is MODERATE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='severe' && $data['dehydration'] =='moderate' ){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is MODERATE AND Vomiting is SEVERE AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'moderate' && $data['vomiting']=='severe' && $data['dehydration'] =='severe'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is MILD AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='mild' && $data['dehydration'] =='severe'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is MODERATE AND Dehydration is MODERATE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='moderate' && $data['dehydration'] =='moderate'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is MODERATE AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='moderate' && $data['dehydration'] =='severe'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is SEVERE AND Dehydration is MILD THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='severe' && $data['dehydration'] =='mild'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is SEVERE AND Dehydration is MODERATE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='severe' && $data['dehydration'] =='moderate'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            #If Diarrhoea is SEVERE AND Vomiting is SEVERE AND Dehydration is SEVERE THEN Cholera is SEVERE
            if ($data['diarrhorea'] == 'severe' && $data['vomiting']=='severe' && $data['dehydration'] =='severe'){
                $id =3;
                $data['status'] = 'Severe';
                $result = $this->Reports_model->get_by_id($id);
                $data['symptoms'] = $result->symptoms;
                $data['treatment'] = $result->treatment;
            }
            $data['title'] = 'Patient Result';
            #$data['content'] ='nutrition/results';
            $this->load->view('patients/results', $data);
        }else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('patients'));
        }

    }

    public function _rules() 
    {
	$this->form_validation->set_rules('diarrhorea', 'diarrhorea', 'trim|required');
	$this->form_validation->set_rules('vomiting', 'vomiting', 'trim|required');
	$this->form_validation->set_rules('dehydration', 'dehydration', 'trim|required');
	$this->form_validation->set_rules('patient_id', 'patient id', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Diagnoses.php */
/* Location: ./application/controllers/Diagnoses.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-31 12:19:13 */
/* http://harviacode.com */
