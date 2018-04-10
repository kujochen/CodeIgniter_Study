<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HelloWorld extends CI_Controller {
    public function __construc() {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('helloworld');
    }
}