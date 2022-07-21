<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'seller'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('toko/auth_toko/login'));
        }
    }

    public function index(){
        $data['tahun'] = $this->model_laporan->getTahun();
        $this->load->view('templates_toko/header');
        $this->load->view('templates_toko/sidebar');
        $this->load->view('toko/v_laporan',$data);
        $this->load->view('templates_toko/footer');
    }


    public function print_laporan(){

        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $tahun = $this->input->post('tahun');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilai = $this->input->post('nilai');
        $print = $this->input->post('print');

        if($print == "excel"){
            if($nilai == 1){
                $data['title'] = "Laporan Penjualan Toko ".$this->session->userdata('nama_toko');
                $data['subtitle'] = " Dari Tanggal: ".$awal .' sampai ' .$akhir;
                header("Content-type=application/vnd.ms.excel");
                header("Content-disposition: attachment; filename=".$data['title'].$data['subtitle'].".xls");
                $data['laporan'] = $this->model_laporan->filterTanggal_toko($awal,$akhir);
                $this->load->view('toko/laporan_excel',$data);
            }elseif($nilai == 2){
                $data['title'] = "Laporan Penjualan Toko ".$this->session->userdata('nama_toko');
                $data['subtitle'] = "Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun;
                header("Content-type=application/vnd.ms.excel");
                header("Content-disposition: attachment; filename=".$data['title'].$data['subtitle'].".xls");
                $data['laporan'] = $this->model_laporan->filterBulan_toko($tahun, $bulanawal, $bulanakhir);
                $this->load->view('toko/laporan_excel',$data);
            }
        }elseif($print == "pdf"){
            if($nilai == 1){
                $data['title'] = "Laporan Penjualan Toko ".$this->session->userdata('nama_toko');
                $data['logo']  = $this->session->userdata('foto_toko');
                $data['subtitle'] = "Dari Tanggal: ".$awal .' sampai ' .$akhir;
                //rumus = $pdf->Cel(width, height, isi kolom, border, 1,0, align);
               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor($this->session->userdata('nama_toko'));
                // $pdf->SetTitle("Laporan Penjualan Toko ".$this->session->userdata('nama_toko'),);
                // $pdf->SetSubject('TCPDF Tutorial');
                // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData($this->session->userdata('foto_toko'), 25, $data['title'], $data['subtitle']);

                // set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 16));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


                // set font
                $pdf->SetFont('helvetica', '', 20);

                // ---------------------------------------------------------

                $pdf->AddPage('L','A4');
                // $pdf->SetFontSize(16);
                // $pdf->Cell(0, 0, $data['title'], 0, 0, 'C');
    
                //Judul
                $pdf->SetFontSize(16);
                $pdf->Text(10, 10, "");
                $pdf->Cell(20, 20, "", "",1);
                // $pdf->Cell(0, 0, $data['subtitle'], 0, 0, 'C');
                $pdf->Cell(20, 20, "", "",1);
    
                //header tabel
                $pdf->SetFont('helvetica','B',10);
                $pdf->Cell(15,10, 'No', 1,0, 'C');
                $pdf->Cell(40,10, 'Tanggal Pesan', 1,0, 'C');
                $pdf->Cell(120,10, 'Produk', 1,0, 'C');
                $pdf->Cell(15,10, 'Qty', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga Total', 1,1, 'C');
    
                //Isi Tabel
                $no = 1;
                $grand_total = 0;
                $data = $this->model_laporan->filterTanggal_toko($awal,$akhir);
                foreach($data as $d){
                    $grand_total = $grand_total + ($d['harga_produk']*$d['qty']);
                    $pdf->SetFont('helvetica','',10);
                    $pdf->Cell(15,10, $no, 1,0, 'C');
                    $pdf->Cell(40,10, $d['tgl_pesan'], 1,0, 'C');
                    $pdf->Cell(120,10, $d['nama_produk'], 1,0, 'L');
                    $pdf->Cell(15,10, $d['qty'], 1,0, 'C');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk'], 0,',','.'), 1,0, 'R');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk']*$d['qty'], 0,',','.'), 1,1, 'R');
                    $no++;
                }
                $pdf->SetFont('helvetica','B',16);
                $pdf->Cell(175,0, 'Total Pendapatan', 1,0, 'C',);
                $pdf->Cell(95,1, 'Rp. '.number_format($grand_total, 0,',','.'), 1,1, 'C');
                $pdf->output("Laporan Penjualan Toko ".$this->session->userdata('nama_toko')." Dari Tanggal: ".$awal .' sampai ' .$akhir.'.pdf');

            }elseif($nilai == 2){
                $data['title'] = "Laporan Penjualan Toko ".$this->session->userdata('nama_toko');
                $data['logo']  = $this->session->userdata('foto_toko');
                $data['subtitle'] = "Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun;
                //rumus = $pdf->Cel(width, height, isi kolom, border, 1,0, align);
               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor($this->session->userdata('nama_toko'));
                // $pdf->SetTitle("Laporan Penjualan Toko ".$this->session->userdata('nama_toko'),);
                // $pdf->SetSubject('TCPDF Tutorial');
                // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData($this->session->userdata('foto_toko'), 25, $data['title'], $data['subtitle']);

                // set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 16));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


                // set font
                $pdf->SetFont('helvetica', '', 20);

                // ---------------------------------------------------------

                $pdf->AddPage('L','A4');
                // $pdf->SetFontSize(16);
                // $pdf->Cell(0, 0, $data['title'], 0, 0, 'C');
    
                //Judul
                $pdf->SetFontSize(16);
                $pdf->Text(10, 10, "");
                $pdf->Cell(20, 20, "", "",1);
                // $pdf->Cell(0, 0, $data['subtitle'], 0, 0, 'C');
                $pdf->Cell(20, 20, "", "",1);
    
                //header tabel
                $pdf->SetFont('helvetica','B',10);
                $pdf->Cell(15,10, 'No', 1,0, 'C');
                $pdf->Cell(40,10, 'Tanggal Pesan', 1,0, 'C');
                $pdf->Cell(120,10, 'Produk', 1,0, 'C');
                $pdf->Cell(15,10, 'Qty', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga Total', 1,1, 'C');
    
                //Isi Tabel
                $no = 1;
                $grand_total = 0;
                $data = $this->model_laporan->filterBulan_toko($tahun, $bulanawal, $bulanakhir);
                foreach($data as $d){
                    $grand_total = $grand_total + ($d['harga_produk']*$d['qty']);
                    $pdf->SetFont('helvetica','',10);
                    $pdf->Cell(15,10, $no, 1,0, 'C');
                    $pdf->Cell(40,10, $d['tgl_pesan'], 1,0, 'C');
                    $pdf->Cell(120,10, $d['nama_produk'], 1,0, 'L');
                    $pdf->Cell(15,10, $d['qty'], 1,0, 'C');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk'], 0,',','.'), 1,0, 'R');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk']*$d['qty'], 0,',','.'), 1,1, 'R');
                    $no++;
                }
                $pdf->SetFont('helvetica','B',16);
                $pdf->Cell(175,0, 'Total Pendapatan', 1,0, 'C',);
                $pdf->Cell(95,1, 'Rp. '.number_format($grand_total, 0,',','.'), 1,1, 'C');
                $pdf->output("Laporan Penjualan Toko ".$this->session->userdata('nama_toko')." Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun.'.pdf');
            }
        }
    }

}