<?php
defined('BASEPATH') or exit('No direct script access allowed');

class durasi_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('durasi');
        if ($id != null) {
            $this->db->where('id_durasi_kalibrasi', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'durasi_kalibrasi' => $post['durasi_kalibrasi'],
        ];
        $this->db->insert('durasi', $params);
    }

    public function edit($post)
    {
        $params = [
            'durasi_kalibrasi' => $post['durasi_kalibrasi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_durasi_kalibrasi', $post['id']);
        $this->db->update('durasi', $params);
    }

    public function del($id)
    {

        $this->db->where('id_durasi_kalibrasi', $id);
        $this->db->delete('durasi');
    }
}
