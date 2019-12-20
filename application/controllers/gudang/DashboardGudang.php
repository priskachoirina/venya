<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardGudang extends MY_Controller {
 
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->page = 'DashboardGudang';       

        $this->data['title']    = 'DashboardGudang';
        $this->data['key']      = 'dashboardGudang';
        $this->data['menu']     = 'template/menu_gudang';
        $this->data['logout']   = 'PanelGudang/logout';
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
        }else{
            $this->data['list']  = $this->apilib->company('GET')['data'];  
            if(empty($this->data['list'])){
                $this->data['msg']   = 'List Company Kosong';
            }else{
                $this->data['msg']   = 'Pilih Company untuk melakukan aktivitas pada sistem ini.';
            } 
            $this->data['form']  = 'signincompany';
        }

		$this->view('gudang/dashboard_gudang_v',$this->data);
    } 

    public function signincompany($id)
    { 
        if(isset($id)){ 
            $company = $this->apilib->checkinowncompany(array('company_id'=>$id));
             
            setcookie("token_company", $company['data'][0]['newToken'], time() + (86400 * 30), "/");  
            setcookie("company_sign", $id, time() + (86400 * 30), "/");  

            redirect(base_url().'gudang/'.$this->page);
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
        
        redirect(base_url().'gudang/'.$this->page);
    }

    public function change_store()
    {
        if(isset($_COOKIE['token_store'])){ 
            unset($_COOKIE['token_store']); 
            unset($_COOKIE['store_sign']); 
            setcookie('token_store', null, -1, '/'); 
            setcookie('store_sign', null, -1, '/'); 
        }
        redirect(base_url().'gudang/'.$this->page);
    }
}

/* End of file Kloter.php */
