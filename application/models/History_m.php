<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('p_item.*, p_category.jenisalat as jenisalat,p_pemilik.name as pemilik_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
        $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('no_seri', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function getbycategoryid($id = null)
    {
        $this->db->select('p_item.*, p_category.jenisalat as jenisalat,p_pemilik.name as pemilik_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
        $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
        $this->db->where('p_item.category_id', $id);
        $this->db->order_by('no_seri', 'asc');
        $query = $this->db->get();
        return $query;
    }
}
