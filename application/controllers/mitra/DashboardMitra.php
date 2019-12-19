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
        $this->data['logout']   = 'PanelMitra/logout';
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
        $this->data['info'] = array();
        if(isset($_COOKIE['token_company'])){
            $this->data['nameCom'] = $this->getCompanySign();
            $this->data['list']  = $this->apilib->assignstore('GET')['data'];  

            if(empty($this->data['list'])){
                $this->data['msg']   = 'List Store Kosong';
            }else{
                $this->data['msg']   = 'Pilih Store untuk melakukan aktivitas pada sistem ini.';
            }
            $this->data['form']  = 'signinstore'; 
            $this->data['info'] = $this->getInfoTrans();
        }else{
            $this->data['list']  = $this->apilib->company('GET')['data'];  
            if(empty($this->data['list'])){
                $this->data['msg']   = 'List Company Kosong';
            }else{
                $this->data['msg']   = 'Pilih Company untuk melakukan aktivitas pada sistem ini.';
            } 
            $this->data['form']  = 'signincompany';
        }

		$this->view('mitra/dashboard_mitra_v',$this->data);
    } 

    public function signincompany($id)
    { 
        if(isset($id)){ 
            $company = $this->apilib->checkinowncompany(array('company_id'=>$id));
             
            setcookie("token_company", $company['data'][0]['newToken'], time() + (86400 * 30), "/");  
            setcookie("company_sign", $id, time() + (86400 * 30), "/");  

            redirect(base_url().'mitra/'.$this->page);
        }

    }

    public function signinstore($id)
    {
        if(isset($id)){
            // get token store
            $t_store = $this->apilib->checkinownstore(array('stores_id'=> $id));

            setcookie("token_store", $t_store['data'][0]['newToken'], time() + (86400 * 30), "/");  
            setcookie("store_sign", $id, time() + (86400 * 30), "/");  
        }
        
        redirect(base_url().'mitra/'.$this->page);
    }

    public function change_store()
    {
        if(isset($_COOKIE['token_store'])){ 
            unset($_COOKIE['token_store']); 
            unset($_COOKIE['store_sign']); 
            setcookie('token_store', null, -1, '/'); 
            setcookie('store_sign', null, -1, '/'); 
        }
        redirect(base_url().'mitra/'.$this->page);
    }
}

/* End of file Kloter.php */
