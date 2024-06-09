<?php
defined('BASEPATH') or exit('No direct script access allowed');

class range_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_range');
        if ($id != null) {
            $this->db->where('range_id', $id);
        }
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
        ];
        $this->db->insert('p_range', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('range_id', $post['id']);
        $this->db->update('p_range', $params);
    }

    function check_range($code, $id = null)
    {
        $this->db->from('p_range');
        $this->db->where('name', $code);
        if ($id != null) {
            $this->db->where('range_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {

        $this->db->where('range_id', $id);
        $this->db->delete('p_range');
    }
}
