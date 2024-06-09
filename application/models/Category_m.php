<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'code_category' => $post['code_category'],
            'jenisalat' => $post['jenisalat'],
            'fungsi' => $post['fungsi'],
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post)
    {
        $params = [
            'code_category' => $post['code_category'],
            'jenisalat' => $post['jenisalat'],
            'fungsi' => $post['fungsi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['id']);
        $this->db->update('p_category', $params);
    }

    function  check_code($code, $id = null)
    {
        $this->db->from('p_category');
        $this->db->where('code_category', $code);
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}
