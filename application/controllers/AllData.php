<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class AllData extends CI_Controller {
 function __construct(){
   parent::__construct();
   $this->simple_login->cek_login();
   $this->simple_login->cek_admin();
   $this->load->model('M_AllData');
 }

     //Load All Table Page
 public function index() {
  $dat = date('F Y');
  $data['updat'] = $this->M_AllData->updated($dat);
  $data['alldt'] = $this->M_AllData->all();
  $this->template->load('v_static','v_alldata', $data);
}

function addData() {
  $inmonth = $this->input->post('bulan');
  $id_cus = $this->input->post('id_cus');
  $mtrla = $this->input->post('meterlalu');
  $mtrskg = $this->input->post('meterskg');
  $hasil = $mtrskg-$mtrla;
  if ($hasil>10) {
    $fi = 10*2000;
    $se = ($hasil-10)*1500;
  } else {
    $fi = $hasil*2000;
    $se = 0;
  }
  $harga = $fi+$se+5000;
  $cek = $this->db->select('id')->from('customers')->where('bulan',$inmonth)->where('id_cus',$id_cus)
  ->get()->num_rows();
  if (!$cek) {
    $data = array(
      'id_cus' => $id_cus,
      'name_cus' => $this->input->post('name_cus'),
      'bulan' => $inmonth,
      'meter_seb' => $mtrla,
      'meter_cus' => $mtrskg,
      'meter_hasil' => $hasil,
      'harga' => $harga,
      'biaya_ab' => 5000,
      'intime' => date('Y-m-d H:i:s'),
      'petugas' => 1,
    );
    $this->M_AllData->addDat($data);
    redirect (site_url('alldata'));
  } else {
    echo '<script>alert("Data Sudah Ada");</script>';
    redirect (site_url('alldata'),'refresh');
  }   
}

function dataBaru() {
  $inmonth = $this->input->post('bulan');
  $id_cus = $this->input->post('id_cus');
  $mtrla = 0;
  $mtrskg = $this->input->post('meterskg');
  $hasil = $mtrskg-$mtrla;
  if ($hasil>10) {
    $fi = 10*2000;
    $se = ($hasil-10)*1500;
  } else {
    $fi = $hasil*2000;
    $se = 0;
  }
  $harga = $fi+$se+5000;
  $cek = $this->db->select('id')->from('customers')->where('bulan',$inmonth)->where('id_cus',$id_cus)
  ->get()->num_rows();
  if (!$cek) {
    $data = array(
      'id_cus' => $id_cus,
      'name_cus' => $this->input->post('name_cus'),
      'bulan' => $inmonth,
      'meter_seb' => $mtrla,
      'meter_cus' => $mtrskg,
      'meter_hasil' => $hasil,
      'harga' => $harga,
      'biaya_ab' => 5000,
      'intime' => date('Y-m-d H:i:s'),
      'petugas' => 1,
    );
    $this->M_AllData->addDat($data);
    redirect (site_url('alldata'));
  } else {
    echo '<script>alert("Data Sudah Ada");</script>';
    redirect (site_url('alldata'),'refresh');
  }   
}

     //update all data
public function upData() {
  $id = $this->input->post('id');
  $inmonth = $this->input->post('bulan');
  $id_cus = $this->input->post('id_cus');
  $mtrla = $this->input->post('meterlalu');
  $mtrskg = $this->input->post('meterskg');
  $hasil = $mtrskg-$mtrla;
  if ($hasil>10) {
    $fi = 10*2000;
    $se = ($hasil-10)*1500;
  } else {
    $fi = $hasil*2000;
    $se = 0;
  }
  $harga = $fi+$se+5000;
  $data = array(
    'id_cus' => $id_cus,
    'name_cus' => $this->input->post('name_cus'),
    'bulan' => $inmonth,
    'meter_seb' => $mtrla,
    'meter_cus' => $mtrskg,
    'meter_hasil' => $hasil,
    'harga' => $harga,
    'biaya_ab' => 5000,
    'intime' => date('Y-m-d H:i:s'),
    'petugas' => 1,
  );
  $this->M_AllData->upDat($data,$id);
  redirect (site_url('alldata'));
}
}
