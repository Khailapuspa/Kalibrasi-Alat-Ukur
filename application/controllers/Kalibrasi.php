<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kalibrasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['kalibrasi_m', 'item_m', 'durasi_m', 'lembaga_m']);
    }

    public function index()
    {

        $data['row'] = $this->kalibrasi_m->get();
        $this->template->load('template', 'datakalibrasi/kalibrasi_data', $data);
    }

    public function detail($id)
    {
        $query = $this->item_m->get($id)->row();
        $jsondata = [
            'jenisalat' => $query->jenisalat,
            'nama_alat_ukur' => $query->nama_alat_ukur,
            'merk' => $query->merk,
            'no_seri' => $query->no_seri,
            'pemilik' => $query->pemilik_name,
            'fungsi' => $query->fungsi,
            'range' => $query->range_name,
            'akurasi' => $query->akurasi_name,
            'tanggal_pembelian' => $query->tanggal_pembelian,
        ];
        echo json_encode($jsondata);
    }

    public function add()
    {

        $kalibrasi = new stdClass();
        $kalibrasi->kalibrasi_id = null;
        $kalibrasi->code_barang = null;
        $kalibrasi->lembaga_kalibrasi = null;
        $kalibrasi->no_sertifikat = null;
        $kalibrasi->file_sertifikat = null;
        $kalibrasi->keterangan = null;
        $kalibrasi->durasi_kalibrasi = null;
        $kalibrasi->ext_int = null;
        $kalibrasi->tanggal_kalibrasi = null;
        $kalibrasi->selanjutnya = null;


        $query_item = $this->item_m->get();
        $item[null] = '- Pilih -';
        foreach ($query_item->result() as $itm) {
            $item[$itm->code_barang] = $itm->code_barang . ' - ' . $itm->nama_alat_ukur;
        }

        $query_lembaga = $this->lembaga_m->get();
        $lembaga[null] = '- Pilih -';
        foreach ($query_lembaga->result() as $lbg) {
            $lembaga[$lbg->lembaga_id] = $lbg->name;
        }


        $data = array(
            'page' => 'add',
            'row' => $kalibrasi,
            'durasi_kalibrasi' => $this->durasi_m->get(),
            'item' => $item, 'selecteditem' => null,
            'lembaga' => $lembaga, 'selectedlembaga' => null,
        );
        $this->template->load('template', 'datakalibrasi/kalibrasi_form', $data);
    }

    public function edit($id)
    {
        $query = $this->kalibrasi_m->get($id);
        if ($query->num_rows() > 0) {
            $kalibrasi = $query->row();

            $query_item = $this->item_m->get();
            $item[null] = '- Pilih -';
            foreach ($query_item->result() as $itm) {
                $item[$itm->code_barang] = $itm->code_barang . ' - ' . $itm->nama_alat_ukur;
            }
            $query_lembaga = $this->lembaga_m->get();
            $lembaga[null] = '- Pilih -';
            foreach ($query_lembaga->result() as $lbg) {
                $lembaga[$lbg->lembaga_id] = $lbg->name;
            }

            $data = array(
                'page' => 'edit',
                'row' => $kalibrasi,
                'durasi_kalibrasi' => $this->durasi_m->get(),
                'item' => $item, 'selecteditem' => $kalibrasi->code_barang,
                'lembaga' => $lembaga, 'selectedlembaga' => $kalibrasi->lembaga_id,
            );

            $this->template->load('template', 'datakalibrasi/kalibrasi_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('user') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $config['upload_path']       = './uploads/file_sertifikat/';
            $config['allowed_types']     = 'png|jpg|jpeg|docx|xls|ppt';
            $config['max_size']          = 4084;
            $config['file_name']         = 'kalibrasi' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if (@$_FILES['file_sertifikat']['name']) {

                if ($this->upload->do_upload('file_sertifikat')) {
                    $post['file_sertifikat'] = $this->upload->data('file_name');

                    $this->kalibrasi_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('kalibrasi');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('kalibrasi/add');
                }
            } else {
                $post['file_sertifikat'] = null;
                $this->kalibrasi_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('kalibrasi');
            }
        } else if (isset($_POST['edit'])) {
            //     $post['file_sertifikat'] = null;
            //     $this->kalibrasi_m->edit($post);
            //     redirect('kalibrasi') ;
            $config['upload_path']       = './uploads/file_sertifikat/';
            $config['allowed_types']     = 'png|jpg|jpeg|docx|xls|ppt';
            $config['max_size']          = 4084;
            $config['file_name']         = 'kalibrasi' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if (@$_FILES['file_sertifikat']['name'] != null) {
                if ($this->upload->do_upload('file_sertifikat')) {

                    $kalibrasi = $this->kalibrasi_m->get($post['id'])->row();
                    if ($kalibrasi->file_sertifikat != null) {
                        $target_file = './uploads/file_sertifikat/' . $kalibrasi->file_sertifikat;
                        unlink($target_file);
                    }

                    $post['file_sertifikat'] = $this->upload->data('file_name');
                    // var_dump($post);
                    // exit;
                    $this->kalibrasi_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('kalibrasi');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('kalibrasi/add');
                }
            } else {
                $post['file_sertifikat'] = null;
                $this->kalibrasi_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('kalibrasi');
            }
        }
    }

    public function del($id)
    {
        $this->kalibrasi_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('kalibrasi');
    }

    // public function kadaluarsa()
    // {
    //     $now = date('Y-m-d');
    //     $data['row'] = $this->item_m->kadaluarsa($now);
    //     $this->template->load('template', 'kalibrasi/kadaluarsa_data', $data);
    // }

    // public function monitoring()
    // {
    //     $now = date('Y-m-d');
    //     $data['row'] = $this->item_m->monitoring($now);
    //     $this->template->load('template', 'kalibrasi/monitoring_data', $data);
    // }
}
