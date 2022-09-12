<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pembayaran extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
        parent::__construct();
		$this->session->set_userdata('tag', 'pembayaran');

		$this->load->model('master/m_master', 'master');
		$this->load->model('pembayaran/m_pembayaran', 'pembayaran');
	}
	public function index()
	{
		$data['list_pembayaran'] = $this->pembayaran->getPembayaran();
		$data['list_karyawan'] = $this->master->getKaryawan();
		render('pages/pembayaran/v_pembayaran', $data);
	}
	
	public function createPembayaran()
	{
		$data = $this->input->post();
		$data['periode'] = $data['periode_tahun'].'-'.str_pad($data['periode_bulan'], 2, 0, STR_PAD_LEFT).'-01';
		unset($data['periode_bulan']);
		unset($data['periode_tahun']);
		$karyawan = $this->master->getKaryawanById($data['id_mst_karyawan']);
		$data['metadata'] = json_encode([
			'nama_karyawan' => $karyawan['nama_karyawan'],
			'no_induk' => $karyawan['no_induk'],
			'status_karyawan' => $karyawan['status_karyawan'],
		]);
		$result = $this->pembayaran->createPembayaran($data);

		redirect('pembayaran/c_pembayaran');
	}

	public function updatePembayaran()
	{

		$data = $this->input->post();
		$data['periode'] = $data['periode_tahun'].'-'.str_pad($data['periode_bulan'], 2, 0, STR_PAD_LEFT).'-01';
		unset($data['periode_bulan']);
		unset($data['periode_tahun']);
		$karyawan = $this->master->getKaryawanById($data['id_mst_karyawan']);
		$data['metadata'] = json_encode([
			'nama_karyawan' => $karyawan['nama_karyawan'],
			'no_induk' => $karyawan['no_induk'],
			'status_karyawan' => $karyawan['status_karyawan'],
		]);
		$result = $this->pembayaran->updatePembayaran($data, $data['id_trx_pembayaran']);

		redirect('pembayaran/c_pembayaran');
	}

	public function deletePembayaran($id_trx_pembayaran)
	{

		$result = $this->pembayaran->deletePembayaran($id_trx_pembayaran);

		redirect('pembayaran/c_pembayaran');
	}
}
