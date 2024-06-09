<?php
defined('BASEPATH') or exit('No direct script access allowed');

class akurasi_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_akurasi');
        if ($id != null) {
            $this->db->where('akurasi_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
        ];
        $this->db->insert('p_akurasi', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('akurasi_id', $post['id']);
        $this->db->update('p_akurasi', $params);
    }

    function  check_code($code, $id = null)
    {
        $this->db->from('p_akurasi');
        $this->db->where('name', $code);
        if ($id != null) {
            $this->db->where('akurasi_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {

        $this->db->where('akurasi_id', $id);
        $this->db->delete('p_akurasi');
    }
}
