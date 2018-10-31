<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
         parent::__construct();
         $this->lib_login->cek_login();
          /*$this->lib_login->cek_admin();*/
         $this->load->model('M_account');
     }
	public function index()
	{
		$data['user'] = $this->M_account->alluser();
		$this->template->load('v_static','V_User',$data);
	}

	public function loAddUser()
	{
		$this->template->load('v_static','V_addUser');
	}

	function delet(){
		$cond = array('id_user' => $this->input->post('id'));
        $this->m_account->delete($cond);
        redirect (site_url('user'));
     }

     function editUser(){
		$edt = array(
			'id_employee' => $this->input->post('id_employee'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'unit' => $this->input->post('unit'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role'),
		);
        $this->M_account->update($edt,$this->input->post('id'));
        redirect (site_url('user'));
     }
}
