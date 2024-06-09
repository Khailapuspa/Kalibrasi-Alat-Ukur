<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lembaga_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('k_lembaga');
        if ($id != null) {
            $this->db->where('lembaga_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
        ];
        $this->db->insert('k_lembaga', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('lembaga_id', $post['id']);
        $this->db->update('k_lembaga', $params);
    }

    function  check_lembaga($code, $id = null)
    {
        $this->db->from('k_lembaga');
        $this->db->where('name', $code);
        if ($id != null) {
            $this->db->where('lembaga_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function del($id)
    {

        $this->db->where('lembaga_id', $id);
        $this->db->delete('k_lembaga');
    }
}
