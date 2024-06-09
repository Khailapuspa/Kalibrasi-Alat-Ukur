<?php
defined('BASEPATH') or exit('No direct script access allowed');

class range extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('range_m');
    }

    public function index()
    {
        $data['row'] = $this->range_m->get();
        $this->template->load('template', 'product/range/range_data', $data);
    }

    public function add()
    {

        $range = new stdClass();
        $range->range_id = null;
        $range->name = null;
        $data = array(
            'page' => 'add',
            'row' => $range
        );
        $this->template->load('template', 'product/range/range_form', $data);
    }

    public function edit($id)
    {
        $query = $this->range_m->get($id);
        if ($query->num_rows() > 0) {
            $range = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $range
            );
            $this->template->load('template', 'product/range/range_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->range_m->check_range($post['name'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Range $post[name] sudah ada");
                redirect('range/add');
            }
            $this->range_m->add($post);
        } else if (isset($_POST['edit'])) {
            if ($this->range_m->check_range($post['name'])->num_rows() > 1) {
                redirect('range/edit/' . $post['id']);
            }
            $this->range_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('range');
    }

    public function del($id)
    {
        if (check_data('p_item', array(
            'range_id' => $id
        )) > 0) {
            // var_dump('tes');
            // exit;
            $this->session->set_flashdata('error', 'Data sudah terpakai');
            redirect('range');
        }

        $this->range_m->del($id);
        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('range');
    }
}
