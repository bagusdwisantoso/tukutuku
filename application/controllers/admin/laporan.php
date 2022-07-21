<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'admin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('admin/auth_admin/login'));
        }
    }

    public function index(){
        $data['tahun'] = $this->model_laporan->getTahun();
        $data['toko']  = $this->model_laporan->toko();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/v_laporan',$data);
        $this->load->view('templates_admin/footer');
    }


    public function print_laporan_admin_rekap(){

        $awal       = $this->input->post('awal');
        $akhir      = $this->input->post('akhir');
        $tahun      = $this->input->post('tahun');
        $bulanawal  = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilai      = $this->input->post('nilai');
        $print      = $this->input->post('print');

        if($print == "excel"){
            if($nilai == 1){
                $data['title']      = "Laporan Penjualan Toko ";
                $data['subtitle']   = " Dari Tanggal: ".$awal .' sampai ' .$akhir;
                header("Content-type=application/vnd.ms.excel");
                header("Content-disposition: attachment; filename=".$data['title'].$data['subtitle'].".xls");
                $data['laporan'] = $this->model_laporan->filterTanggal_admin_rekap($awal,$akhir);
                $this->load->view('admin/laporan_excel_rekap',$data);
            }elseif($nilai == 2){
                $data['title']      = "Laporan Penjualan Toko ";
                $data['subtitle']   = "Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun;
                header("Content-type=application/vnd.ms.excel");
                header("Content-disposition: attachment; filename=".$data['title'].$data['subtitle'].".xls");
                $data['laporan'] = $this->model_laporan->filterBulan_admin_rekap($tahun, $bulanawal, $bulanakhir);
                $this->load->view('admin/laporan_excel_rekap',$data);
            }
        }elseif($print == "pdf"){
            if($nilai == 1){
                $data['title']      = "Laporan Penjualan Toko";
                $data['subtitle']   = "Dari Tanggal: ".$awal .' sampai ' .$akhir;
                //rumus = $pdf->Cel(width, height, isi kolom, border, 1,0, align);
               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor($this->session->userdata('nama_admin'));
                // $pdf->SetTitle("Laporan Penjualan admin ".$this->session->userdata('nama_admin'),);
                // $pdf->SetSubject('TCPDF Tutorial');
                // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, 0, $data['title'], $data['subtitle']);

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
                $pdf->Cell(30,10, 'Nama Toko', 1,0, 'C');
                $pdf->Cell(60,10, 'Nama Owner', 1,0, 'C');
                $pdf->Cell(60,10, 'Email', 1,0, 'C');
                $pdf->Cell(40,10, 'No Hp', 1,0, 'C');
                $pdf->Cell(60,10, 'Pendapatan', 1,1, 'C');
    
                //Isi Tabel
                $no = 1;
                $grand_total = 0;
                $data = $this->model_laporan->filterTanggal_admin_rekap($awal,$akhir);
                foreach($data as $d){
                    $grand_total = $grand_total + $d['pendapatan'];
                    $pdf->SetFont('helvetica','',10);
                    $pdf->Cell(15,10, $no, 1,0, 'C');
                    $pdf->Cell(30,10, $d['nama_toko'], 1,0, 'L');
                    $pdf->Cell(60,10, $d['nama_owner'], 1,0, 'L');
                    $pdf->Cell(60,10, $d['email'], 1,0, 'L');
                    $pdf->Cell(40,10, $d['no_telp_owner'], 1,0, 'L');
                    $pdf->Cell(60,10, 'Rp. '.number_format($d['pendapatan'], 0,',','.'), 1,1, 'R');
                    $no++;
                }
                $pdf->SetFont('helvetica','B',16);
                $pdf->Cell(165,0, 'Total Pendapatan', 1,0, 'C',);
                $pdf->Cell(100,1, 'Rp. '.number_format($grand_total, 0,',','.'), 1,1, 'C');
                $pdf->output("Laporan Penjualan Toko Dari Tanggal: ".$awal .' sampai ' .$akhir.'.pdf');

            }elseif($nilai == 2){
                $data['title']      = "Laporan Penjualan Toko ";
                $data['subtitle']   = "Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun;
                //rumus = $pdf->Cel(width, height, isi kolom, border, 1,0, align);
               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor($this->session->userdata('nama_admin'));
                // $pdf->SetTitle("Laporan Penjualan admin ".$this->session->userdata('nama_admin'),);
                // $pdf->SetSubject('TCPDF Tutorial');
                // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, 0, $data['title'], $data['subtitle']);

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
                $pdf->Cell(30,10, 'Nama Toko', 1,0, 'C');
                $pdf->Cell(60,10, 'Nama Owner', 1,0, 'C');
                $pdf->Cell(60,10, 'Email', 1,0, 'C');
                $pdf->Cell(40,10, 'No Hp', 1,0, 'C');
                $pdf->Cell(60,10, 'Pendapatan', 1,1, 'C');
    
                //Isi Tabel
                $no = 1;
                $grand_total = 0;
                $data = $this->model_laporan->filterBulan_admin_rekap($tahun, $bulanawal, $bulanakhir);
                foreach($data as $d){
                    $grand_total = $grand_total + $d['pendapatan'];
                    $pdf->SetFont('helvetica','',10);
                    $pdf->Cell(15,10, $no, 1,0, 'C');
                    $pdf->Cell(30,10, $d['nama_toko'], 1,0, 'L');
                    $pdf->Cell(60,10, $d['nama_owner'], 1,0, 'L');
                    $pdf->Cell(60,10, $d['email'], 1,0, 'L');
                    $pdf->Cell(40,10, $d['no_telp_owner'], 1,0, 'L');
                    $pdf->Cell(60,10, 'Rp. '.number_format($d['pendapatan'], 0,',','.'), 1,1, 'R');
                    $no++;
                }
                $pdf->SetFont('helvetica','B',16);
                $pdf->Cell(165,0, 'Total Pendapatan', 1,0, 'C',);
                $pdf->Cell(100,1, 'Rp. '.number_format($grand_total, 0,',','.'), 1,1, 'C');
                $pdf->output("Laporan Penjualan Toko Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun.'.pdf');
            }
        }
    }

    public function print_laporan_admin(){

        $toko       = $this->input->post('toko');
        $awal       = $this->input->post('awal');
        $akhir      = $this->input->post('akhir');
        $tahun      = $this->input->post('tahun');
        $bulanawal  = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilai      = $this->input->post('nilai');
        $print      = $this->input->post('print');

        if($print == "excel"){
            if($nilai == 1){
                $data['title']      = "Laporan Penjualan Toko ".$toko;
                $data['subtitle']   = " Dari Tanggal: ".$awal .' sampai ' .$akhir;
                header("Content-type=application/vnd.ms.excel");
                header("Content-disposition: attachment; filename=".$data['title'].$data['subtitle'].".xls");
                $data['laporan'] = $this->model_laporan->filterTanggal_admin($toko,$awal,$akhir);
                $this->load->view('admin/laporan_excel',$data);
            }elseif($nilai == 2){
                $data['title']      = "Laporan Penjualan Toko ".$toko;
                $data['subtitle']   = "Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun;
                header("Content-type=application/vnd.ms.excel");
                header("Content-disposition: attachment; filename=".$data['title'].$data['subtitle'].".xls");
                $data['laporan'] = $this->model_laporan->filterBulan_admin($toko,$tahun, $bulanawal, $bulanakhir);
                $this->load->view('admin/laporan_excel',$data);
            }
        }elseif($print == "pdf"){
            if($nilai == 1){
                $data['title']      = "Laporan Penjualan Toko".$toko;
                $data['logo']       = $this->model_laporan->getFotoToko($toko);
                $data['subtitle']   = "Dari Tanggal: ".$awal .' sampai ' .$akhir;
                //rumus = $pdf->Cel(width, height, isi kolom, border, 1,0, align);
               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor($this->session->userdata('nama_admin'));
                // $pdf->SetTitle("Laporan Penjualan admin ".$this->session->userdata('nama_admin'),);
                // $pdf->SetSubject('TCPDF Tutorial');
                // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData($data['logo'], 25, $data['title'], $data['subtitle']);

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
                $pdf->SetFontSize(10);
                $pdf->Cell(15,10, 'No', 1,0, 'C');
                $pdf->Cell(40,10, 'Tanggal Pesan', 1,0, 'C');
                $pdf->Cell(120,10, 'Produk', 1,0, 'C');
                $pdf->Cell(15,10, 'Qty', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga Total', 1,1, 'C');
    
                //Isi Tabel
                $no = 1;
                $grand_total = 0;
                $data = $this->model_laporan->filterTanggal_admin($toko,$awal,$akhir);
                foreach($data as $d){
                    $grand_total = $grand_total + ($d['harga_produk']*$d['qty']);
                    $pdf->Cell(15,10, $no, 1,0, 'C');
                    $pdf->Cell(40,10, $d['tgl_pesan'], 1,0, 'C');
                    $pdf->Cell(120,10, $d['nama_produk'], 1,0, 'L');
                    $pdf->Cell(15,10, $d['qty'], 1,0, 'C');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk'], 0,',','.'), 1,0, 'R');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk']*$d['qty'], 0,',','.'), 1,1, 'R');
                    $no++;
                }
                $pdf->SetFontSize(16);
                $pdf->Cell(175,0, 'Total Pendapatan', 1,0, 'C',);
                $pdf->Cell(95,1, 'Rp. '.number_format($grand_total, 0,',','.'), 1,1, 'C');
                $pdf->output("Laporan Penjualan Toko ".$toko." Dari Tanggal: ".$awal .' sampai ' .$akhir.'.pdf');

            }elseif($nilai == 2){
                $data['title']      = "Laporan Penjualan Toko ".$toko;
                $data['logo']       = $this->model_laporan->getFotoToko($toko);
                $data['subtitle']   = "Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun;
                //rumus = $pdf->Cel(width, height, isi kolom, border, 1,0, align);
               // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor($this->session->userdata('nama_admin'));
                // $pdf->SetTitle("Laporan Penjualan admin ".$this->session->userdata('nama_admin'),);
                // $pdf->SetSubject('TCPDF Tutorial');
                // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData($data['logo'], 25, $data['title'], $data['subtitle']);

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
                $pdf->SetFontSize(10);
                $pdf->Cell(15,10, 'No', 1,0, 'C');
                $pdf->Cell(40,10, 'Tanggal Pesan', 1,0, 'C');
                $pdf->Cell(120,10, 'Produk', 1,0, 'C');
                $pdf->Cell(15,10, 'Qty', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga', 1,0, 'C');
                $pdf->Cell(40,10, 'Harga Total', 1,1, 'C');
    
                //Isi Tabel
                $no = 1;
                $grand_total = 0;
                $data = $this->model_laporan->filterBulan_admin($toko,$tahun, $bulanawal, $bulanakhir);
                foreach($data as $d){
                    $grand_total = $grand_total + ($d['harga_produk']*$d['qty']);
                    $pdf->Cell(15,10, $no, 1,0, 'C');
                    $pdf->Cell(40,10, $d['tgl_pesan'], 1,0, 'C');
                    $pdf->Cell(120,10, $d['nama_produk'], 1,0, 'L');
                    $pdf->Cell(15,10, $d['qty'], 1,0, 'C');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk'], 0,',','.'), 1,0, 'R');
                    $pdf->Cell(40,10, 'Rp. '.number_format($d['harga_produk']*$d['qty'], 0,',','.'), 1,1, 'R');
                    $no++;
                }
                $pdf->SetFontSize(16);
                $pdf->Cell(175,0, 'Total Pendapatan', 1,0, 'C',);
                $pdf->Cell(95,1, 'Rp. '.number_format($grand_total, 0,',','.'), 1,1, 'C');
                $pdf->output("Laporan Penjualan Toko ".$toko." Dari Bulan: ". $bulanawal .' sampai ' .$bulanakhir ." Tahun " .$tahun.'.pdf');
            }
        }
    }

    
}