<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'Company';
        $this->dataapi = $this->apilib->company('GET');

        $this->data['title'] = 'Company';
        $this->data['key']   = 'company';
    }

    public function generateTable()
    {
        $table      = $this->dataapi;

        $data = $table['data'];
 
        foreach ($data as $key => $value) {            
            
            $data[$key]['subscription_end'] = getDateIndo($value['subscription_end']);
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

		$this->view('pusat/company_v',$this->data);
    } 

    public function addData()
    { 

        $save = $this->apilib->company('POST', $_POST );

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
        $_POST['company_id'] = $id;
        
        $update = $this->apilib->company('PUT', $_POST );

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

        $update = $this->apilib->company('DELETE', array(
            'company_id' => $id
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
