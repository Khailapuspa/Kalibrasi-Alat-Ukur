<?php
defined('BASEPATH') or exit('No direct script access allowed');

class merk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('merk_m');
    }

    public function index()
    {
        $data['row'] = $this->merk_m->get();
        $this->template->load('template', 'product/merk/merk_data', $data);
    }

    public function add()
    {

        $merk = new stdClass();
        $merk->merk_id = null;
        $merk->name = null;
        $data = array(
            'page' => 'add',
            'row' => $merk
        );
        $this->template->load('template', 'product/merk/merk_form', $data);
    }

    public function edit($id)
    {
        $query = $this->merk_m->get($id);
        if ($query->num_rows() > 0) {
            $merk = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $merk
            );
            $this->template->load('template', 'product/merk/merk_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->merk_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->merk_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('merk');
    }

    public function del($id)
    {

        $this->merk_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('merk');
    }
}
