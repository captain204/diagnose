<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reports_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'reports/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'reports/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'reports/index.html';
            $config['first_url'] = base_url() . 'reports/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Reports_model->total_rows($q);
        $reports = $this->Reports_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'reports_data' => $reports,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('reports/reports_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Reports_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'level' => $row->level,
		'symptoms' => $row->symptoms,
		'treatment' => $row->treatment,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('reports/reports_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reports'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('reports/create_action'),
	    'id' => set_value('id'),
	    'level' => set_value('level'),
	    'symptoms' => set_value('symptoms'),
	    'treatment' => set_value('treatment'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('reports/reports_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'level' => $this->input->post('level',TRUE),
		'symptoms' => $this->input->post('symptoms',TRUE),
		'treatment' => $this->input->post('treatment',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Reports_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('reports'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Reports_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('reports/update_action'),
		'id' => set_value('id', $row->id),
		'level' => set_value('level', $row->level),
		'symptoms' => set_value('symptoms', $row->symptoms),
		'treatment' => set_value('treatment', $row->treatment),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('reports/reports_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reports'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'level' => $this->input->post('level',TRUE),
		'symptoms' => $this->input->post('symptoms',TRUE),
		'treatment' => $this->input->post('treatment',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Reports_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('reports'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Reports_model->get_by_id($id);

        if ($row) {
            $this->Reports_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('reports'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reports'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('symptoms', 'symptoms', 'trim|required');
	$this->form_validation->set_rules('treatment', 'treatment', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Reports.php */
/* Location: ./application/controllers/Reports.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-31 12:19:32 */
/* http://harviacode.com */