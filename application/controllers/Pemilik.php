<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemilik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('pemilik_m');
    }

    public function index()
    {
        $data['row'] = $this->pemilik_m->get();
        $this->template->load('template', 'product/pemilik/pemilik_data', $data);
    }

    public function add()
    {

        $pemilik = new stdClass();
        $pemilik->pemilik_id = null;
        $pemilik->name = null;
        $data = array(
            'page' => 'add',
            'row' => $pemilik
        );
        $this->template->load('template', 'product/pemilik/pemilik_form', $data);
    }

    public function edit($id)
    {
        $query = $this->pemilik_m->get($id);
        if ($query->num_rows() > 0) {
            $pemilik = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pemilik
            );
            $this->template->load('template', 'product/pemilik/pemilik_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->pemilik_m->check_pemilik($post['name'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "pemilik $post[name] sudah ada");
                redirect('pemilik/add');
            }
            $this->pemilik_m->add($post);
        } else if (isset($_POST['edit'])) {
            if ($this->pemilik_m->check_pemilik($post['name'])->num_rows() > 1) {
                redirect('pemilik/edit/' . $post['id']);
            }
            $this->pemilik_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('pemilik');
    }

    public function del($id)
    {
        if (check_data('p_item', array(
            'pemilik_id' => $id
        )) > 0) {
            // var_dump('tes');
            // exit;
            $this->session->set_flashdata('error', 'Data sudah terpakai');
            redirect('pemilik');
        }

        $this->pemilik_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('pemilik');
    }
}
