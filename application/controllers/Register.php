 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Register extends CI_Controller {
   
   function __construct(){
       parent::__construct();
       $this->load->library(array('form_validation'));
       $this->load->helper(array('url','form'));
         $this->load->model('M_account'); //call model
         //$this->simple_login->cek_login();
         //$this->simple_login->cek_admin();
     }
     
     public function index() {
       
       $this->form_validation->set_rules('name', 'NAME','required');
       $this->form_validation->set_rules('email','EMAIL','required|valid_email');
       $this->form_validation->set_rules('password','PASSWORD','required');
       $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
       if($this->form_validation->run() == FALSE) {
           $this->template->load('v_static','V_addUser');
       }else{
           
           $data['name']   =    $this->input->post('name');
           $data['email']  =    $this->input->post('email');
           $data['password'] =    md5($this->input->post('password'));
           $data['role'] =    $this->input->post('rolea');
           
           $this->M_account->daftar($data);
           
           echo '<script>alert("successful registration. Back to the page of all users");</script>';
           redirect (site_url('user'),'refresh');
       }
   }
}