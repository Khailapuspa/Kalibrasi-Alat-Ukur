<?php
defined('BASEPATH') or exit('No direct script access allowed');

class process extends CI_Controller
{
    public function index()
    {

        if (isset($_POST['now'])) {
            $monthYear = $_POST['now'];
            // lakukan query ke database menggunakan $monthYear
            $query    = mysqli_query($conn, "SELECT * FROM item WHERE next_kalibrasi < '$sekarang' AND status IS NULL ORDER BY next_kalibrasi");
            // tampilkan hasil query
            while ($data    = mysqli_fetch_array($query)) {
                echo $row['mycolumn'];
            }
        }
        $this->template->load('template', 'report/history_data', $data);
    }
}
