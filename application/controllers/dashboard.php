<?php  

	class Dashboard extends CI_Controller{
		public function index() {
			$data['barang'] = $this->model_barang->tampil_data()->result();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('dashboard',$data);
			$this->load->view('template/footer');
		}

		public function tambah_keranjang($id){
			$barang = $this->model_barang->find($id);

			$data = array(
	        'id'      => $barang->id_brg,
	        'qty'     => 1,
	        'price'   => $barang->harga,
	        'name'	  => $barang->nama_brg
			);

			$this->cart->insert($data);
			redirect('dashboard');
		}

		public function detail_keranjang(){
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('keranjang');
			$this->load->view('template/footer');			
		}
	}