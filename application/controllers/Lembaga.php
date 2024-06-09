<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lembaga extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('lembaga_m');
    }

    public function index()
    {
        $data['row'] = $this->lembaga_m->get();
        $this->template->load('template', 'masterkalibrasi/lembaga_data', $data);
    }

    public function add()
    {

        $lembaga = new stdClass();
        $lembaga->lembaga_id = null;
        $lembaga->name = null;
        $data = array(
            'page' => 'add',
            'row' => $lembaga
        );
        $this->template->load('template', 'masterkalibrasi/lembaga_form', $data);
    }

    public function edit($id)
    {
        $query = $this->lembaga_m->get($id);
        if ($query->num_rows() > 0) {
            $lembaga = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $lembaga
            );
            $this->template->load('template', 'masterkalibrasi/lembaga_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->lembaga_m->check_lembaga($post['name'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Code $post[name] sudah ada");
                redirect('lembaga/add');
            }
            $this->lembaga_m->add($post);
        } else if (isset($_POST['edit'])) {
            if ($this->lembaga_m->check_lembaga($post['name '])->num_rows() > 1) {
                redirect('lembaga/edit/' . $post['id']);
            }
            $this->lembaga_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('lembaga');
    }

    public function del($id)
    {

        $this->lembaga_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('lembaga');
    }
}
