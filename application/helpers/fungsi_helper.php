<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('user');
    }
}

function notiflist($selanjutnya)
{
    $date = date_create($selanjutnya);
    date_sub($date, date_interval_create_from_date_string("30 days"));
    return date_format($date, "Y-m-d");
}

function day($selanjutnya)
{
    if ($selanjutnya >= date('Y-m-d')) {
        $pecah = explode("-", $selanjutnya);
        // var_dump($pecah);
        // exit;
        $day = $pecah[2];
        $month = $pecah[1];
        $year = $pecah[0];
        $days    = (int)((mktime(0, 0, 0, $month, $day, $year) - time()) / 86400);
        return "<b>Masih ada $days hari lagi, sampai tanggal $day/$month/$year</b>";
    }
}

// function add_admin()
// {
//     $ci = &get_instance();
//     $ci->load->library('fungsi');
//     if ($ci->fungsi->user_login()->level != 1) {
//         redirect('user');
//     }
// }

function generateCodebarang($id)
{
    $ci = &get_instance();
    $ci->load->model(['category_m']);
    $query = $ci->category_m->get($id);
    return $query->row();
}

function check_data($tabel, $data)
{
    $ci = &get_instance();
    $ci->db->where($data);
    $ci->db->from($tabel);
    return $ci->db->count_all_results();
}
