<?php
defined('BASEPATH') or exit('No direct script access allowed');

class durasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('durasi_m');
    }

    public function index()
    {
        $data['row'] = $this->durasi_m->get();
        $this->template->load('template', 'durasi/durasi_data', $data);
    }

    public function add()
    {

        $durasi = new stdClass();
        $durasi->id_durasi_kalibrasi = null;
        $durasi->durasi_kalibrasi = null;
        $data = array(
            'page' => 'add',
            'row' => $durasi
        );
        $this->template->load('template', 'durasi/durasi_form', $data);
    }

    public function edit($id)
    {
        $query = $this->durasi_m->get($id);
        if ($query->num_rows() > 0) {
            $durasi = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $durasi
            );
            $this->template->load('template', 'durasi/durasi_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->durasi_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->durasi_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('durasi');
    }

    public function del($id)
    {

        $this->durasi_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('durasi');
    }
}
