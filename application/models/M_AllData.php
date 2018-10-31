<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_AllData extends CI_Model {
	
	var $tbl = 'customers';
	//var $tabel = 'dt_control';

	public function all(){
		$data=$this->db->select('customers.id, id_cus, name_cus, bulan, intime, meter_seb, meter_cus, meter_hasil,
						 harga, name')
						->from($this->tbl)
						->join('users', 'customers.petugas = users.id')
						->get();
		return $data;
	}
	/*select siapa saja yang sudah terisi dibulan ini*/
	public function updated($dat){
		return $this->db->select('id_cus')->from($this->tbl)->where('bulan',$dat)->get();
	}

	function addDat($data)	/*input data baru*/
	{
		$this->db->insert($this->tbl, $data);
		return TRUE;
	}

	function upDat($data,$id)	/*update meteran*/
	{
		$this->db->where('id',$id)->update($this->tabel, $data);
		return TRUE;
	}

	function mtagihan($dat)
	{
		return $this->db->get_where($this->tbl, array('bulan' => $dat));
	}
}

