<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('history_m');
        $this->load->model('item_m');
    }

    public function index()
    {
        if (isset($_POST['btn_search'])) {
            $id = $this->input->post('item_id');
            $data['row'] = $this->history_m->getbyitemid($id);
        } else {
            # code...
            $data['row'] = $this->history_m->get();
        }
        $data['item'] = $this->item_m->get();
        $this->template->load('template', 'report/history_data', $data);
    }
}
