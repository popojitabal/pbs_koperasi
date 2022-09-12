<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pembelian extends CI_Controller {

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
		$this->session->set_userdata('tag', 'pembelian');

		$this->load->model('pembelian/m_pembelian', 'pembelian');
	}
	public function index()
	{

		$data['list_pembelian'] = $this->pembelian->getPembelian();
		$data['list_barang'] = $this->pembelian->getBarang();
		$data['list_toko'] = $this->pembelian->getToko();
		render('pages/pembelian/v_pembelian', $data);
	}

	public function createPembelian()
	{
		$data = $this->input->post();
		$result = $this->pembelian->createPembelian($data);

		redirect('pembelian/c_pembelian');
	}

	public function updatePembelian()
	{

		$data = $this->input->post();
		$result = $this->pembelian->updatePembelian($data, $data['id_trx_pembelian']);

		redirect('pembelian/c_pembelian');
	}

	public function deletePembelian($id_trx_pembelian)
	{

		$result = $this->pembelian->deletePembelian($id_trx_pembelian);

		redirect('pembelian/c_pembelian');
	}

	// ================ BARANG
	public function barang()
	{
		$data['list_barang'] = $this->pembelian->getBarang();
		render('pages/pembelian/v_barang', $data);
	}

	public function createBarang()
	{
		$data = $this->input->post();
		$result = $this->pembelian->createBarang($data);

		redirect('pembelian/c_pembelian/barang');
	}

	public function updateBarang()
	{

		$data = $this->input->post();
		$result = $this->pembelian->updateBarang($data, $data['id_mst_barang']);

		redirect('pembelian/c_pembelian/barang');
	}

	public function deleteBarang($id_mst_barang)
	{

		$result = $this->pembelian->deleteBarang($id_mst_barang);

		redirect('pembelian/c_pembelian/barang');
	}
	// ================ TOKO
	public function toko()
	{
		$data['list_toko'] = $this->pembelian->getToko();
		render('pages/pembelian/v_toko', $data);
	}
	
	public function createToko()
	{
		$data = $this->input->post();
		$result = $this->pembelian->createToko($data);

		redirect('pembelian/c_pembelian/toko');
	}

	public function updateToko()
	{

		$data = $this->input->post();
		$result = $this->pembelian->updateToko($data, $data['id_mst_toko']);

		redirect('pembelian/c_pembelian/toko');
	}

	public function deleteToko($id_mst_toko)
	{

		$result = $this->pembelian->deleteToko($id_mst_toko);

		redirect('pembelian/c_pembelian/toko');
	}
}
