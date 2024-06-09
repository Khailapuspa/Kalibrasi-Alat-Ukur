<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_m extends CI_Model
{

    public function get($id = null)
    {

        $this->db->select('dashboard.*, p_item.no_seri as no_seri, p_item.nama_alat_ukur as nama_alat_ukur');
        $this->db->from('dashboard');
        $this->db->join('p_item', 'p_item.no_seri = dashboard.no_seri');
        if ($id != null) {
            $this->db->where('dashboard_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {

        $this->db->where('dashboard_id', $id);
        $this->db->delete('dashboard');
    }

    // public function kadaluarsa($now)
    // {
    //     $this->db->select('p_item.*, p_category.jenisalat as jenisalat, p_pemilik.name as pemilik_name, p_range.name as range_name, p_akurasi.name as akurasi_name ');
    //     $this->db->from('p_item');
    //     $this->db->join('p_category', 'p_category.category_id = p_item.category_id', 'p_category.fungsi = p_item.fungsi');
    //     $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
    //     $this->db->join('p_range', 'p_range.range_id = p_item.range_id', 'left');
    //     $this->db->join('p_akurasi', 'p_akurasi.akurasi_id = p_item.akurasi_id', 'left');

    //     $this->db->where('p_item.selanjutnya <', $now);

    //     $this->db->order_by('jenisalat', 'desc');
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function monitoring($now)
    // {
    //     $this->db->select('p_item.*, p_category.jenisalat as jenisalat, p_pemilik.name as pemilik_name, p_range.name as range_name, p_akurasi.name as akurasi_name ');
    //     $this->db->from('p_item');
    //     $this->db->join('p_category', 'p_category.category_id = p_item.category_id', 'p_category.fungsi = p_item.fungsi');
    //     $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
    //     $this->db->join('p_range', 'p_range.range_id = p_item.range_id', 'left');
    //     $this->db->join('p_akurasi', 'p_akurasi.akurasi_id = p_item.akurasi_id', 'left');

    //     $this->db->where('p_item.selanjutnya >', $now);

    //     $this->db->order_by('jenisalat', 'desc');
    //     $query = $this->db->get();
    //     return $query;
    // }
}
