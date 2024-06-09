<?php
defined('BASEPATH') or exit('No direct script access allowed');

class item_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('p_item.*, p_category.jenisalat as jenisalat, p_pemilik.name as pemilik_name, p_range.name as range_name, p_akurasi.name as akurasi_name ');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
        $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
        $this->db->join('p_range', 'p_range.range_id = p_item.range_id', 'left');
        $this->db->join('p_akurasi', 'p_akurasi.akurasi_id = p_item.akurasi_id', 'left');

        if ($id != null) {
            $this->db->where('code_barang', $id);
        }
        $this->db->order_by('tanggal_pembelian', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $category_id = $post['category'];
        $codedepan = generateCodebarang($category_id)->code_category;

        $query = $this->db->query("select max(code_barang) as code from p_item where code_barang like '%$codedepan%'")->row();
        // var_dump($query);
        // die;
        if (empty($post['code_barang'])) {

            if (is_null($query->code)) {
                $code_barang = $codedepan . '001' . '-' . nice_date($post['tanggal_pembelian'], 'Y');
            } else {
                $pecah = explode('-', $query->code);
                $urutan = (int) substr($pecah[0], 3, 3);
                $urutan++;
                $code_barang = $codedepan . sprintf("%03s", $urutan) . '-' . nice_date($post['tanggal_pembelian'], 'Y');
            }
        } else {
            $code_barang = $post['code_barang'];
        }
        $params = [
            'code_barang' => $code_barang,
            'no_seri' => $post['no_seri'],
            'nama_alat_ukur' => $post['nama_alat_ukur'],
            'merk' => $post['merk'],
            'category_id' => $post['category'],
            'pemilik_id' => $post['pemilik'],
            'range_id' => $post['range'],
            'akurasi_id' => $post['akurasi'],
            'tanggal_pembelian' => $post['tanggal_pembelian'],
            'image' => $post['image'],
        ];
        $this->db->insert('p_item', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_alat_ukur' => $post['nama_alat_ukur'],
            'merk' => $post['merk'],
            'category_id' => $post['category'],
            'pemilik_id' => $post['pemilik'],
            'range_id' => $post['range'],
            'akurasi_id' => $post['akurasi'],
            'tanggal_pembelian' => $post['tanggal_pembelian'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('p_item');
        $this->db->where('no_seri', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {

        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    public function kadaluarsa($now)
    {
        $this->db->select('p_item.*, p_category.jenisalat as jenisalat, p_pemilik.name as pemilik_name, p_range.name as range_name, p_akurasi.name as akurasi_name ');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id', 'p_category.fungsi = p_item.fungsi');
        $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
        $this->db->join('p_range', 'p_range.range_id = p_item.range_id', 'left');
        $this->db->join('p_akurasi', 'p_akurasi.akurasi_id = p_item.akurasi_id', 'left');

        $this->db->where('p_item.selanjutnya <', $now);

        $this->db->order_by('jenisalat', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function monitoring($now = null)
    {
        $this->db->select('p_item.*, p_category.jenisalat as jenisalat, p_pemilik.name as pemilik_name, p_range.name as range_name, p_akurasi.name as akurasi_name ');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id', 'p_category.fungsi = p_item.fungsi');
        $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
        $this->db->join('p_range', 'p_range.range_id = p_item.range_id', 'left');
        $this->db->join('p_akurasi', 'p_akurasi.akurasi_id = p_item.akurasi_id', 'left');

        if ($now != null) {
            $this->db->like('p_item.selanjutnya', $now);
        }

        $this->db->order_by('p_item.selanjutnya', 'desc');
        $query = $this->db->get();
        return $query;
    }

    // public function ()


    public function monitor($now = null)
    {
        $this->db->select('p_item.*, p_category.jenisalat as jenisalat, p_pemilik.name as pemilik_name, p_range.name as range_name, p_akurasi.name as akurasi_name ');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id', 'p_category.fungsi = p_item.fungsi');
        $this->db->join('p_pemilik', 'p_pemilik.pemilik_id = p_item.pemilik_id');
        $this->db->join('p_range', 'p_range.range_id = p_item.range_id', 'left');
        $this->db->join('p_akurasi', 'p_akurasi.akurasi_id = p_item.akurasi_id', 'left');

        $this->db->where('p_item.selanjutnya >', $now);

        $this->db->order_by('jenisalat', 'desc');
        $query = $this->db->get();
        return $query;
    }
}
