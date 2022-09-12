<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_master extends CI_Controller {

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
		$this->session->set_userdata('tag', 'master');

		$this->load->model('master/m_master', 'master');
	}
	public function index()
	{
		$data['list_karyawan'] = $this->master->getKaryawan(); 

		render('pages/master/v_master', $data);
	}

	public function createKaryawan()
	{
		$data = $this->input->post();
		$result = $this->master->createKaryawan($data);

		redirect('master/c_master');
	}

	public function updateKaryawan()
	{
		$data = $this->input->post();
		$result = $this->master->updateKaryawan($data, $data['id_mst_karyawan']);

		redirect('master/c_master');
	}

	public function deleteKaryawan($id_mst_karyawan)
	{

		$result = $this->master->deleteKaryawan($id_mst_karyawan);

		redirect('master/c_master/barang');
	}
}
