<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dist extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation', 'email'));
        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
    }
    
 
    public function index()
    {
    $this->load->view('dist/index');
}

    public function terms()
    {
    $this->load->view('dist/terms');
}

    public function disclaimer()
    {
    $this->load->view('dist/disclaimer');
}


    public function privacy()
    {
    $this->load->view('dist/privacy');
}

    public function stacking()
    {
    $this->load->view('dist/stacking');
}


    public function gaming()
    {
    $this->load->view('dist/gaming');
}

    public function demo()
    {
    $this->load->view('dist/demo');
}


    public function legal()
    {
    $this->load->view('dist/legal');
}


} 



