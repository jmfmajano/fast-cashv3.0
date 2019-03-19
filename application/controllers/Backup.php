<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
      if (!$this->session->userdata("login")) {
      redirect(base_url());
    }
      $this->load->helper('url');
      $this->load->helper('file');
      $this->load->helper('download');
      $this->load->library('zip');
  }

 public function index(){
      $this->load->view('Base/header');
      $this->load->view('Base/nav');
      $this->load->view('Backup/Backup');
      $this->load->view('Base/footer');
    }
 
 public function database_backup( $back = true ){
    date_default_timezone_set("America/El_Salvador");

    if ($back) {
      
      $date = date('Y-m-d').'_'.'Hora'.date('H;i;s');
      $this->load->dbutil();

      $db_format = array(
        'format'=>'sql',
        'filename'=>'db_fastcash.sql'
      );

      $backup = $this->dbutil->backup($db_format);
      $dbname = 'Backup-Fecha'.$date.'.sql';
      $save = './db_backup/'.$dbname;
      write_file($save,$backup);

      $this->session->set_flashdata("guardar","Backup realizado.");
      redirect(base_url()."Backup/index");

      force_download($dbname,$backup);

    }else{
      $this->session->set_flashdata("errorr","Error en el Backup.");
      redirect(base_url()."Backup/index");
    }

    }

}



