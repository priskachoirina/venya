<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class StokBarang extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'StokBarang';
        $this->dataapi = $this->apilib->materials('GET');

        $this->data['title'] = 'StokBarang';
        $this->data['key']   = 'stokbarang';

        $this->data['menu']     = 'template/menu_gudang';
        $this->data['logout']   = 'PanelGudang/logout';
    }

    public function generateTable()
    {
        $table      = $this->dataapi; 
 
        $data   = !empty($table['data']) ? $table['data'] : array();
        return $data; 
    }
    
    public function index()
    {                 
        $this->data['form']     = base_url().'pusat/'. $this->page.'/addData';
        $this->data['table']    = $this->generateTable();

        if(isset($_SESSION[$this->data['key']])){
            $this->data = array_merge($this->data, $_SESSION[$this->data['key']]);
            unset($_SESSION[$this->data['key']]);
        } 

		$this->view('gudang/stokbarang_v',$this->data);
    } 

}

/* End of file Kloter.php */
