<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->page = 'Investor';
        $this->dataapi = $this->apilib->investor('GET');

        $this->data['title'] = 'Investor';
        $this->data['key']   = 'investor';
    }

    public function generateTable()
    {
        $table  = $this->dataapi;

        $data   = !empty($table['data']) ? $table['data'] : array();
 
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
        $this->data['store'] = $this->apilib->stores('GET')['data'];
        // print_arr($this->data['table'] );exit;
        if(isset($_SESSION[$this->data['key']])){
            $this->data = array_merge($this->data, $_SESSION[$this->data['key']]);
            unset($_SESSION[$this->data['key']]);
        } 

		$this->view('pusat/investor_v',$this->data);
    } 

    public function addData()
    { 
        $_POST['list_outlet'] = implode(',',$_POST['list_outlet']);
        
        $save = $this->apilib->investor('POST', $_POST );
         
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

        redirect(base_url().'pusat/'.$this->page);
    }

    public function edit($id)
    {
        $data = $this->dataapi['data'][searchArray($id, 'id', $this->dataapi['data'])];
        
        if(!empty($data)){
            $this->session->set_userdata($this->data['key'],array(
                "edit_data" => $data,
                "form"      => base_url()."pusat/".$this->page."/editData/".$id
                )
            );
        }else{
            $this->session->set_userdata($this->data['key'],"Data tidak ditemukan");
        }
        
        redirect(base_url().'pusat/'.$this->page);
    }

    public function editData($id)
    {
        $_POST['supplier_id'] = $id;
        
        $update = $this->apilib->investor('PUT', $_POST );

        if(strpos($update['message'], 'Succes') !== false ){
            $this->session->set_userdata($this->data['key'], array(
                "alert"     => "alert-success",
                "title_c"   => "Success",
                "caption"   => $update['message']
            ));
        }else{
            $this->session->set_userdata($this->data['key'], array(
                "alert"     => "alert-danger",
                "title_c"   => "Error",
                "caption"   => $update['message']
            ));
        }
          
        redirect(base_url().'pusat/'.$this->page);
    } 
}

/* End of file Kloter.php */
