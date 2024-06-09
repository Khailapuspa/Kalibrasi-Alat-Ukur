<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kadaluarsa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kadaluarsa_m');
        $this->load->model('item_m');
        $this->load->model('dashboard_m');
    }

    public function index()
    {
        $now = date('Y-m-d');
        $data['row'] = $this->item_m->kadaluarsa($now);
        $this->template->load('template', 'kalibrasi/kadaluarsa_data', $data);
    }
}
