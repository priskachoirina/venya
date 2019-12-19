<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Ketersediaan extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'Products';
        $this->dataapi = $this->apilib->products('GET');

        $this->data['title'] = 'Products';
        $this->data['key']   = 'products';
    }

    public function generateTable()
    {
        $table  = $this->dataapi;

        $data   = !empty($table['data']) ? $table['data'] : array();
        // print_arr($data);exit;
        foreach ($data as $key => $value) {            
            
            $data[$key]['date_created']     = getDateIndo($value['date_created']);
            $data[$key]['date_modified']    = getDateIndo($value['date_modified']);
            
        }

        return $data; 
    }
    
    public function index()
    {                 
        $this->data['form']  = base_url().'pusat/'. $this->page.'/addData';
        $this->data['table'] = $this->generateTable();

        if(isset($_SESSION[$this->data['key']])){
            $this->data = array_merge($this->data, $_SESSION[$this->data['key']]);
            unset($_SESSION[$this->data['key']]);
        } 

		$this->view('pusat/ketersediaan_v',$this->data);
    } 
}

/* End of file Kloter.php */
