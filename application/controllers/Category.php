<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->category_m->get();
        $this->template->load('template', 'product/category/category_data', $data);
    }

    public function add()
    {

        $category = new stdClass();
        $category->category_id = null;
        $category->code_category = null;
        $category->jenisalat = null;
        $category->fungsi = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'product/category/category_form', $data);
    }

    public function edit($id)
    {
        $query = $this->category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $category->fungsi;
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'product/category/category_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->category_m->check_code($post['code_category'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Code $post[code_category] sudah ada");
                redirect('category/add');
            }
            $this->category_m->add($post);
        } else if (isset($_POST['edit'])) {
            if ($this->category_m->check_code($post['code_category'])->num_rows() > 1) {
                redirect('category/edit/' . $post['id']);
            }
            $this->category_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('category');
    }

    public function del($id)
    {

        if (check_data('p_item', array(
            'category_id' => $id
        )) > 0) {
            // var_dump('tes');
            // exit;
            $this->session->set_flashdata('error', 'Data sudah terpakai');
            redirect('category');
        }

        $this->category_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('category');
    }
}
