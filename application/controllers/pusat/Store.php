<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'Store';
        $this->dataapi = $this->apilib->stores('GET');

        $this->data['title'] = 'Store';
        $this->data['key']   = 'store';
    }

    public function generateTable()
    {
        $table      = $this->dataapi;
        $company    = $this->apilib->company('GET');
        
        $data   = !empty($table['data']) ? $table['data'] : array();
 
        foreach ($data as $key => $value) {            
            $company_key = searchArray($value['id'], 'id', $company['data']);
            
            $data[$key]['date_created']     = getDateIndo($value['date_created']);
            $data[$key]['date_modified']    = getDateIndo($value['date_modified']);
            $data[$key]['name_company']     = $company['data'][$company_key]['name']; 
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

		$this->view('pusat/stores_v',$this->data);
    } 

    public function addData()
    { 

        $save = $this->apilib->stores('POST', $_POST );

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
        $_POST['store_id'] = $id;
        
        $update = $this->apilib->stores('PUT', $_POST );
        
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

    public function delete($id)
    {  
        $update = $this->apilib->stores('DELETE', array(
            'store_id' => $id
        ));

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
