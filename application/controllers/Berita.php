<?php 

class Berita extends CI_Controller{

    function __construct(){
        parent::__construct();      
        $this->load->model('ModelBerita');
        $this->load->helper('url');

    }

    function index(){
        $data['berita'] = $this->ModelBerita->tampil_data()->result();
        $this->load->view('v_tampilberita',$data);
    }

    function tambah(){
        $this->load->view('v_inputberita');
    }

    function tambah_aksi(){
        
        $judul = $this->input->post('judul');
        $headline_news = $this->input->post('headline_news');
        $deskripsi_news = $this->input->post('deskripsi_news');
        $tgl_publikasi = $this->input->post('tgl_publikasi');
        $penulis = $this->input->post('penulis');
        $kategori = $this->input->post('kategori');

        $data = array(
            'judul' => $judul,
            'headline_news' => $headline_news,
            'deskripsi_news' => $deskripsi_news,
            'tgl_publikasi' => $tgl_publikasi,
            'penulis' => $penulis,
            'kategori' => $kategori,

            );
        $this->ModelBerita->input_data($data,'berita');
        redirect('berita/index');
    }

}
