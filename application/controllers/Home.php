<?php
class Home extends CI_Controller {
    
    public function index() {
        $this->welcome();
    }
    
    public function welcome() {
        frame($this,'home/home');
    }
    
    public function init() {
        $this->load->model('pais_model');
        $pais = $this->pais_model->c('España');
        
        $this->load->model('persona_model');
        $this->persona_model->c(-1,'admin','admin',$pais->id,[],'admin');
    }
  
}
?>