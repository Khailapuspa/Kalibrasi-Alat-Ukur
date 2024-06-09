<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['dashboard_m', 'item_m', 'kalibrasi_m']);
	}

	public function index()
	{

		date_default_timezone_set("Asia/Jakarta");
		// var_dump(date('Y-m-d') >= notiflist('2023-03-15'));
		// exit;
		$data['now'] = date('Y-m-d');
		if (isset($_POST['now'])) {
			$now = $this->input->post('now');
			// var_dump($now);
			// exit;
			$data['monitoring'] = $this->item_m->monitoring($now);
		} else {
			$data['monitoring'] = $this->item_m->monitoring();
		}
		// $data['kadaluarsa'] = $this->item_m->kadaluarsa($now);
		$this->template->load('template', 'dashboard/dashboard_data', $data);
	}

	public function reminder()
	{
		// mengambil data dari database
		$no    = 0;
		$query    = mysqli_query($conn, "SELECT * FROM item WHERE next_kalibrasi < '$now' AND status IS NULL ORDER BY next_kalibrasi");
		while ($data    = mysqli_fetch_array($query));
	}

	public function del($id)
	{

		$this->dashboard_m->del($id);
		if ($this->db->affected_rows() > 0) {

			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('dashboard');
	}

	// public function kirimemail()
	// {
	// 	$config = array(
	// 		'protocol' => 'sendmail', // 'mail', 'sendmail', or 'smtp'
	// 		'smtp_host' => 'compotecsmk4pkl@gmail.com',
	// 		'smtp_port' => 25,
	// 		'smtp_user' => 'khailapuspa19@gmail.com',
	// 		'smtp_pass' => 'compoteck4!',
	// 		'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
	// 		'mailtype' => 'text', //plaintext 'text' mails or 'html'
	// 		'smtp_timeout' => '5', //in seconds
	// 		'charset' => 'UTF-8',
	// 		'wordwrap' => TRUE
	// 	);

	// 	$this->load->library('email', $config);
	// 	$config['protocol'] = 'sendmail';
	// 	$config['mailpath'] = '/usr/sbin/sendmail';
	// 	$config['charset'] = 'UTF-8';
	// 	$config['wordwrap'] = TRUE;

	// 	$this->email->initialize($config);

	// 	$this->email->from('compotecsmk4pkl@gmail.com', 'Tes');
	// 	$this->email->to('khailapuspa19@gmail.com');

	// 	$this->email->subject('Email Test');
	// 	$this->email->message('Testing the email class.');

	// 	if ($this->email->send()) {
	// 		echo 'Email sent.';
	// 	} else {
	// 		show_error($this->email->print_debugger());
	// 	}
	// }
}
