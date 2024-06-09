<?php
defined('BASEPATH') or exit('No direct script access allowed');

class akurasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('akurasi_m');
    }

    public function index()
    {
        $data['row'] = $this->akurasi_m->get();
        $this->template->load('template', 'product/akurasi/akurasi_data', $data);
    }

    public function add()
    {

        $akurasi = new stdClass();
        $akurasi->akurasi_id = null;
        $akurasi->name = null;
        $data = array(
            'page' => 'add',
            'row' => $akurasi
        );
        $this->template->load('template', 'product/akurasi/akurasi_form', $data);
    }

    public function edit($id)
    {
        $query = $this->akurasi_m->get($id);
        if ($query->num_rows() > 0) {
            $akurasi = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $akurasi
            );
            $this->template->load('template', 'product/akurasi/akurasi_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->akurasi_m->check_code($post['name'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Code $post[name] sudah ada");
                redirect('akurasi/add');
            }
            $this->akurasi_m->add($post);
        } else if (isset($_POST['edit'])) {
            if ($this->akurasi_m->check_code($post['name'])->num_rows() > 1) {
                redirect('akurasi/edit/' . $post['id']);
            }
            $this->akurasi_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('akurasi');
    }

    public function del($id)
    {
        if (check_data('p_item', array(
            'akurasi_id' => $id
        )) > 0) {
            // var_dump('tes');
            // exit;
            $this->session->set_flashdata('error', 'Data sudah terpakai');
            redirect('akurasi');
        }

        $this->akurasi_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('akurasi');
    }
}
