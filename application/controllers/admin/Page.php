<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('admin/login');
    }
  }
 
  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
          redirect('admin/home');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      redirect('admin/home');
    }else{
        echo "Access Denied";
    }
  }
 
  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='4'){
      redirect('admin/home');
    }else{
        echo "Access Denied";
    }
  }
 


function keuangan(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='4'){
      redirect('admin/home');
    }else{
        echo "Access Denied";
    }
  }
}