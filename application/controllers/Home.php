<?php
class Home extends CI_Controller {
    
    public function index() {
        $this->welcome();
    }
    
    public function welcome() {
        $this->load->view('home/home');
    }
    
    public function goodbye() {
        $this->load->view('home/goodbye');
    }
}
?>