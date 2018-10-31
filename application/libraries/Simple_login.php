 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 /*
  * Simple_login Class
  * Class ini digunakan untuk fitur login, proteksi halaman dan logout
  * @author  Gun Gun Priatna
  * @url    https://recodeku.blogspot.com
  */
 
 class Simple_login {

     // SET SUPER GLOBAL
   var $CI = NULL;

     /**
      * Class constructor
      *
      * @return   void
      */
     public function __construct() {
       $this->CI =& get_instance();
     }

     /*
     * cek username dan password pada table users, jika ada set session berdasar data user dari
     * table users.
     * @param string username dari input form
     * @param string password dari input form
     */
     public function login($email, $password) {

         //cek username dan password
       $query = $this->CI->db->get_where('users',array('email'=>$email,'password' => md5($password)));

       if($query->num_rows() == 1) {
             //ambil data user berdasar username
         $row = $this->CI->db->query('SELECT * FROM users where email = "'.$email.'"');
         $admin = $row->row();
         $id = $admin->id;
         $name = $admin->name;
         $role = $admin->role;

             //set session user
         $this->CI->session->set_userdata('role', $role);
         $this->CI->session->set_userdata('name', $name);
         $this->CI->session->set_userdata('id', $id);
         $this->CI->session->set_userdata('id_login', uniqid(rand()));

             //redirect ke halaman dashboard
         redirect(site_url('alldata'));
       }else{

             //jika tidak ada, set notifikasi dalam flashdata.
         $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');

             //redirect ke halaman login
         redirect(site_url('login'));
       }
       return false;
     }
     
     /**
      * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
      * login
      */
     public function cek_login() {

         //cek session username
       if($this->CI->session->userdata('id_login') == '') {

             //set notifikasi
         $this->CI->session->set_flashdata('sukses','Anda belum login');

             //alihkan ke halaman login
         redirect(site_url('login'));
       }
     }

     public function cek_logout() {

         //cek session username
       if($this->CI->session->userdata('id_login') != '') {

             //set notifikasi
         $this->CI->session->set_flashdata('sukses','Anda sudah login');

             //alihkan ke halaman login
         redirect(site_url('alldata'));
       }
     }

     public function cek_admin() {
      if($this->CI->session->userdata('role') != 'ADMIN') {

       //alihkan ke halaman login
       redirect(site_url('member/alldata'));
     }
   }

   public function cek_member() {
      if($this->CI->session->userdata('role') != 'MEMBER') {

       //alihkan ke halaman login
       redirect(site_url('alldata'));
     }
   }

     /**
      * Hapus session, lalu set notifikasi kemudian di alihkan
      * ke halaman login
      */
     public function logout() {
       $this->CI->session->unset_userdata('name');
       $this->CI->session->unset_userdata('id_login');
       $this->CI->session->unset_userdata('id');
       $this->CI->session->unset_userdata('id_login');
       $this->CI->session->unset_userdata('role');
       $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
       redirect(site_url('login'));
     }
   }