<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patients_model extends CI_Model
{

    public $table = 'patients';
    public $id = 'id';
    public $patient_id ='patient_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_patient_id($patient_id){
        $this->db->where($this->patient_id, $patient_id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('firstname', $q);
	$this->db->or_like('lastname', $q);
	$this->db->or_like('marital_status', $q);
	$this->db->or_like('date_birth', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('occupation', $q);
	$this->db->or_like('doc_name', $q);
	$this->db->or_like('doc_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('firstname', $q);
	$this->db->or_like('lastname', $q);
	$this->db->or_like('marital_status', $q);
	$this->db->or_like('date_birth', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('occupation', $q);
	$this->db->or_like('doc_name', $q);
	$this->db->or_like('doc_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Patients_model.php */
/* Location: ./application/models/Patients_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-31 12:18:53 */
/* http://harviacode.com */