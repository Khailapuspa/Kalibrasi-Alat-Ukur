<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kalibrasi_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('kalibrasi.*, p_item.code_barang as code_barang, p_item.nama_alat_ukur as nama_alat_ukur, k_lembaga.name as lembaga_name');
        $this->db->from('kalibrasi');
        $this->db->join('p_item', 'p_item.code_barang = kalibrasi.code_barang');
        $this->db->join('k_lembaga', 'k_lembaga.lembaga_id = kalibrasi.lembaga_id');
        if ($id != null) {
            $this->db->where('kalibrasi_id', $id);
        }
        $this->db->order_by('tanggal_kalibrasi', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function getWhereCodeBarang($id = null)
    {
        $this->db->select('kalibrasi.*, p_item.code_barang as code_barang, p_item.nama_alat_ukur as nama_alat_ukur, k_lembaga.name as lembaga_name');
        $this->db->from('kalibrasi');
        $this->db->join('p_item', 'p_item.code_barang = kalibrasi.code_barang');
        $this->db->join('k_lembaga', 'k_lembaga.lembaga_id = kalibrasi.lembaga_id');
        if ($id != null) {
            $this->db->where('p_item.code_barang', $id);
        }
        $this->db->order_by('tanggal_kalibrasi', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    { // var_dump($post['durasi_kalibrasi']);
        // die;

        $tahun = $post['durasi_kalibrasi'];
        $selanjutnya = date("Y-m-d", strtotime("+" . $tahun . "year", strtotime($post['tanggal_kalibrasi'])));

        $params = [
            'code_barang' => $post['code_barang'],
            'lembaga_id' => $post['lembaga'],
            'no_sertifikat' => $post['no_sertifikat'],
            'file_sertifikat' => $post['file_sertifikat'],
            'keterangan' => $post['keterangan'],
            'durasi_kalibrasi' => $post['durasi_kalibrasi'],
            'ext_int' => $post['ext_int'],
            'tanggal_kalibrasi' => $post['tanggal_kalibrasi'],
            'selanjutnya' => $selanjutnya,
        ];
        $this->db->insert('kalibrasi', $params);
    }

    public function edit($post)
    {
        // var_dump($post);
        // exit;
        $tahun = $post['durasi_kalibrasi'];
        $selanjutnya = date("Y-m-d", strtotime("+" . $tahun . "year", strtotime($post['tanggal_kalibrasi'])));


        $params = [
            'code_barang' => $post['code_barang'],
            'lembaga_id' => $post['lembaga'],
            'no_sertifikat' => $post['no_sertifikat'],
            'file_sertifikat' => $post['file_sertifikat'],
            'keterangan' => $post['keterangan'],
            'durasi_kalibrasi' => $post['durasi_kalibrasi'],
            'ext_int' => $post['ext_int'],
            'tanggal_kalibrasi' => $post['tanggal_kalibrasi'],
            'selanjutnya' => $selanjutnya,
            'updated' => date('Y-m-d H:i:s')


        ];
        $this->db->where('kalibrasi_id', $post['id']);
        $this->db->update('kalibrasi', $params);
    }

    public function del($id)
    {

        $this->db->where('kalibrasi_id', $id);
        $this->db->delete('kalibrasi');
    }

    // public function kadaluarsa()
    // {
    //     $this->db->select('kalibrasi.*, p_item.code_barang as code_barang, p_item.nama_alat_ukur as nama_alat_ukur, k_lembaga.name as lembaga_name');
    //     $this->db->from('kalibrasi');
    //     $this->db->join('p_item', 'p_item.code_barang = kalibrasi.code_barang');
    //     $this->db->join('k_lembaga', 'k_lembaga.lembaga_id = kalibrasi.lembaga_id');

    //     $this->db->where('tanggal_kalibrasi >', $selanjutnya);

    //     $this->db->order_by('tanggal_kalibrasi', 'desc');
    //     $query = $this->db->get();
    //     return $query;
    // }
}
