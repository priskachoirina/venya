<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardMitra extends MY_Controller {
 
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->page = 'DashboardMitra';       

        $this->data['title']    = 'DashboardMitra';
        $this->data['key']      = 'dashboardmitra';
        $this->data['menu']     = 'template/menu_mitra';
        $this->data['logout']   = 'mitra/PanelMitra/logout';
    }

    public function getInfoTrans()
    {
        $table      = $this->apilib->history(array('by_user',false));
        
        $data['all']        = !empty($table['data']) ? $table['data'] : array();
        $listdate           = [];
        
        foreach ($data['all'] as $key => $value) {            
            $data['all'][$key]['date_created']     = getDateOnly($value['date_created']); 

            $listdate[] = $data['all'][$key]['date_created'];
        }

        $listdate = array_unique($listdate);

        $date = []; $i = 0;
        foreach($listdate as $key => $value){
            $data['countdata'][$i]['date'][] = $value;
            foreach($data['all'] as $k => $v){
                if($v['date_created'] == $value){ 
                    $data['countdata'][$i]['price'][] = $v['total_price'];
                }
            }
            $data['countdata'][$i]['sum'][] = array_sum($data['countdata'][$i]['price']);
            $i++;
        } 
        return $data; 
    }
    
    public function index()
    { 
        $this->data['me'] =  $this->apilib->me('GET')['data'][0];

		$this->view('mitra/dashboard_mitra_v',$this->data);
    }  
}

/* End of file Kloter.php */
