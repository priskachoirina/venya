<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class DetailKloter extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'DetailKloter';
        $this->dataapi = $this->apilib->detailkloter('GET',array('id_kloter'=> $this->uri->segment(4)));

        $this->data['title'] = 'DetailKloter';
        $this->data['key']   = 'detailkloter';
    }

    public function generateTable()
    {
        $table  = $this->dataapi;

        $data   = !empty($table['data']) ? $table['data'] : array();
        $user   = $data['user'];

        $datastore = $this->apilib->stores('GET')['data'];

        foreach ($user as $key => $value) {
            $data['storelist'][$key]['id'] = $value['id'];

            $store = explode(',', $value['list_outlet']); 

            foreach ($store as $k => $v) {
                $data['storelist'][$key]['list'][]  = $datastore[searchArray($v, 'id', $datastore)]['name'];
                $data['store_u'][]                  = $datastore[searchArray($v, 'id', $datastore)]['name'];
            }    
        } 
        
        $percent_div = 100 / count($data['store_u']); 

        foreach ($user as $key => $value) {
            $store = explode(',', $value['list_outlet']); 
            $data['user'][$key]['percentage'] = $percent_div * count($store);
        }

        $data['store_u'] = array_unique($data['store_u']); 
        return $data; 
    }
    
    public function index()
    {                  
        $this->data['form']  = base_url().'pusat/'.$this->page.'/addData/'.$this->uri->segment(4);
        $this->data['table'] = $this->generateTable(); 
        $this->data['investor'] = $this->apilib->investor('GET')['data'];
        
        if(isset($_SESSION[$this->data['key']])){
            $this->data = array_merge($this->data, $_SESSION[$this->data['key']]);
            unset($_SESSION[$this->data['key']]);
        } 

		$this->view('pusat/detailkloter_v',$this->data);
    } 

    public function addData()
    {
        $investor = $this->apilib->investor('GET')['data'];
        // print_arr($_POST);exit;
        $_POST['id_kloter'] = $this->uri->segment(4);

        foreach ($_POST['list_investor']  as $key => $value) {
            $inv = $investor[searchArray($value, 'id', $investor)];
            $listinv[] = $inv['list_outlet'];
        }
        
        $_POST['list_investor'] = implode(',',$_POST['list_investor']);
        $_POST['list_store'] = implode(',',$listinv); 
        
        $save = $this->apilib->detailkloter('POST',  $_POST );
        
        if(strpos($save['message'], 'Succes') !== false ){
            $this->session->set_userdata($this->data['key'], array(
            "alert"     => "alert-success",
            "title_c"   => "Success",
            "caption"   => $save['message']
            ));
        }else{
            $this->session->set_userdata($this->data['key'], array(
            "alert"     => "alert-danger",
            "title_c"   => "Error",
            "caption"   => $save['message']
            ));
        }

        redirect(base_url().'pusat/'.$this->page.'/index/'.$this->uri->segment(4));
    }

}

/* End of file Kloter.php */
