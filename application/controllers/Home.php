<?php
class Home extends CI_Controller {
    
    public function index() {
        $this->welcome();
    }
    
    public function welcome() {
        frame($this,'home/home');
    }
  
}
?>