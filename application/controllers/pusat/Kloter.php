<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kloter extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'Kloter';
        $this->dataapi = $this->apilib->kloter('GET');

        $this->data['title'] = 'Kloter';
        $this->data['key']   = 'kloter';
    }

    public function generateTable()
    {
        $table      = $this->dataapi;
        $company    = $this->apilib->company('GET');

        $data = $table['data'];
 
        foreach ($data as $key => $value) {            
            
            $company_key = searchArray($value['id_company'], 'id', $company['data']);

            $data[$key]['date_created'] = getDateIndo($value['date_created']);
            $data[$key]['date_start']   = getDateIndo($value['date_start']);
            $data[$key]['date_end']     = getDateIndo($value['date_end']);
            $data[$key]['name_company'] = $company['data'][$company_key]['name']; 
        }

        return $data; 
    }
    
    public function index()
    {                 
        $this->data['form']  = base_url().'pusat/Kloter/addData';
        $this->data['table'] = $this->generateTable();

        if(isset($_SESSION[$this->data['key']])){
            $this->data = array_merge($this->data, $_SESSION[$this->data['key']]);
            unset($_SESSION[$this->data['key']]);
        } 

		$this->view('pusat/kloter_v',$this->data);
    } 

    public function addData()
    {
        $data = array(
            'nama_kloter'   => $_POST['nama_kloter']
        );

        $save = $this->apilib->kloter('POST', $data );

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
        $data = array(
            'id_kloter'     => $id,
            'nama_kloter'   => $_POST['nama_kloter']
        );
        
        $update = $this->apilib->kloter('PUT', $data );

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

        $update = $this->apilib->kloter('DELETE', array(
            'id_kloter' => $id
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
