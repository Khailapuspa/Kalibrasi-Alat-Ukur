<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('monitoring_m');
        $this->load->model('item_m');
    }

    public function index()
    {
        $now = date('Y-M-D');
        $data['row'] = $this->item_m->monitor($now);
        $this->template->load('template', 'kalibrasi/monitoring_data', $data);
    }
}
