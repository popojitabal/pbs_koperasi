<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pinjaman extends CI_Controller {

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
		$this->session->set_userdata('tag', 'pinjaman');
		
		$this->load->model('master/m_master', 'master');
		$this->load->model('pinjaman/m_pinjaman', 'pinjaman');
	}
	public function index()
	{
		$data['list_pinjaman'] = $this->pinjaman->getPinjaman();
		$data['list_karyawan'] = $this->master->getKaryawan();
		render('pages/pinjaman/v_pinjaman', $data);
	}

	public function createPinjaman()
	{
		$data = $this->input->post();
		$karyawan = $this->master->getKaryawanById($data['id_mst_karyawan']);
		$data['metadata'] = json_encode([
			'nama_karyawan' => $karyawan['nama_karyawan'],
			'no_induk' => $karyawan['no_induk'],
			'status_karyawan' => $karyawan['status_karyawan'],
		]);
		$result = $this->pinjaman->createPinjaman($data);

		redirect('pinjaman/c_pinjaman');
	}

	public function updatePinjaman()
	{

		$data = $this->input->post();
		$karyawan = $this->master->getKaryawanById($data['id_mst_karyawan']);
		$data['metadata'] = json_encode([
			'nama_karyawan' => $karyawan['nama_karyawan'],
			'no_induk' => $karyawan['no_induk'],
			'status_karyawan' => $karyawan['status_karyawan'],
		]);
		$result = $this->pinjaman->updatePinjaman($data, $data['id_trx_pinjaman']);

		redirect('pinjaman/c_pinjaman');
	}

	public function deletePinjaman($id_trx_pinjaman)
	{

		$result = $this->pinjaman->deletePinjaman($id_trx_pinjaman);

		redirect('pinjaman/c_pinjaman');
	}

	// ==================== SETORAN
	public function setoran($id_trx_pinjaman)
	{
		$data['id_trx_pinjaman'] = $id_trx_pinjaman;
		$data['list_setoran'] = $this->pinjaman->getSetoran($id_trx_pinjaman);
		$data['pinjaman'] = $this->pinjaman->getPinjamanById($id_trx_pinjaman);
		$data['list_karyawan'] = $this->master->getKaryawan();
		render('pages/pinjaman/v_setoran', $data);
	}

	public function createSetoran($id_trx_pinjaman)
	{
		$data = $this->input->post();
		$data['id_trx_pinjaman'] = $id_trx_pinjaman;
		$result = $this->pinjaman->createSetoran($data);

		redirect('pinjaman/c_pinjaman/setoran/'.$id_trx_pinjaman);
	}

	public function updateSetoran($id_trx_pinjaman)
	{

		$data = $this->input->post();
		$result = $this->pinjaman->updateSetoran($data, $data['id_trx_pinjaman_setor']);

		redirect('pinjaman/c_pinjaman/setoran/'.$id_trx_pinjaman);
	}

	public function deleteSetoran($id_trx_pinjaman, $id_trx_pinjaman_setor)
	{

		$result = $this->pinjaman->deleteSetoran($id_trx_pinjaman_setor);

		redirect('pinjaman/c_pinjaman/setoran/'.$id_trx_pinjaman);
	}
}
