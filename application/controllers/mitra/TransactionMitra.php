<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionMitra extends MY_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->page = 'TransactionMitra';
        $this->data['title'] = 'TransactionMitra';
        $this->data['key']   = 'transactionmitra'; 
        $this->data['menu']     = 'template/menu_mitra';
        $this->data['logout']   = 'PanelMitra/logout';
    }

    public function generateTable($by)
    {
        $table      = $this->apilib->history(array('by_user',$by));
        $employee   = $this->apilib->employee('GET')['data'];
        $store      = $this->apilib->stores('GET')['data'];
        
        $data   = !empty($table['data']) ? $table['data'] : array();
        // print_arr($data);
        foreach ($data as $key => $value) {            
            $storecurr      = $store[searchArray($value['store_id'], 'id', $store)];
            $employecurr    = $employee[searchArray($value['trx_by'], 'id', $employee)];
             
            $data[$key]['date_created']     = getDateIndo($value['date_created']); 
            $data[$key]['store']            = $storecurr['name']; 
            $data[$key]['employee']         = $employecurr['name']; 
        }
        return $data; 
    }

    public function index($by="true")
    {
        $this->data['table'] = $this->generateTable($by);

        $this->view('mitra/transaction_v',$this->data); 
    }

}

/* End of file Kloter.php */
