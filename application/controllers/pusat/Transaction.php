<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->page = 'Transaction';
        $this->data['title'] = 'Transaction';
        $this->data['key']   = 'transaction'; 
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
        // print_arr($data);exit;
        return $data; 
    }

    public function index($by="true")
    {
        // print_arr($this->apilib->getHistory());exit;
        $this->data['table'] = $this->generateTable($by);

        $this->view('pusat/transaction_v',$this->data); 
    }

}

/* End of file Kloter.php */
