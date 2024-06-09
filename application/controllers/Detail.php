<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'kalibrasi_m']);
    }

    public function index()
    {
        echo "";
    }

    function detail_QrCode($id)
    {
        $data['row'] = $this->item_m->get($id)->row();
        $data['kalibrasi'] = $this->kalibrasi_m->getWhereCodeBarang($id)->result();
        $this->load->view('detail/detail_QrCode', $data);
    }
}
