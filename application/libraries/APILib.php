<?php defined('BASEPATH') OR exit('No direct script access allowed');

class APILib
{
    protected $ci;
    public $api, $token;

    public function __construct()
    {
        $this->ci =& get_instance();

        $this->api = 'http://103.129.223.136:2053/';

        $this->token = array(
			'user'      => isset($_COOKIE['token_user']) ? $_COOKIE['token_user'] : '',
			'store'     => isset($_COOKIE['token_store']) ? $_COOKIE['token_store'] : '',
			'company'   => isset($_COOKIE['token_company']) ? $_COOKIE['token_company'] : ''
		);

    }

    protected function callAPI($method, $url,$key='', $data=''){
		$curl = curl_init();
	 
		switch ($method){
		   case "POST":
			  curl_setopt($curl, CURLOPT_POST, 1);
			  if ($data)
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			  break;
		   case "PUT":
			  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			  if ($data)
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                if ($data)
                   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
                break;
		   default:
			  if ($data)
				 $url = sprintf("%s?%s", $url, http_build_query($data));
		}
	 
		// OPTIONS:
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"Access-Token: ".$key,
		   'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		
		// EXECUTE:
		$result = curl_exec($curl); 
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return $result;
    }

    protected function format($method, $url, $token,$data=array()){
         
        if(!empty($data)){
            $url  = sprintf("%s?%s", $this->api.$url, http_build_query($data));
        }else{
            $url  = $this->api.$url;
        }
        
        $data = $this->callAPI($method,$url,$token); 
        $data = json_decode($data,1);

        return $data;
    }
    
    // ================================= USER ================================
    public function register($data)
    {        
        return $this->format("POST",'register','1111111111111',$data);
    }

    public function login($data)
    {        
        return $this->format("POST",'login','1111111111111',$data);
    }

    public function me($method, $data = array())
    {        
        return $this->format($method,'me',$this->token['user'],$data);
    }

    public function assignstore()
    {        
        return $this->format('GET','assignstore',$this->token['user']);
    }

    public function assigncompany()
    {        
        return $this->format('GET','assigncompany',$this->token['user']);
    }

    // parameter : store_id
    public function checkinstore($data)
    {        
        return $this->format('POST','checkinstore',$this->token['store'],$data);
    }

    // parameter : company_id 
    public function checkincompany($data)
    {        
        return $this->format('POST','checkincompany',$this->token['company'],$data);
    }

    // parameter : company_id 
    public function checkinowncompany($data)
    {        
        return $this->format('POST','checkinowncompany',$this->token['user'],$data);
    }

    // parameter : stores_id  
    public function checkinownstore($data)
    {        
        return $this->format('POST','checkinownstores',$this->token['company'],$data);
    }

    public function checkout()
    {        
        return $this->format('POST','checkout',$this->token['store']);
    }

    /* Parameter Function Company
        GET : no param
        POST : company_name, company_address 
        PUT : company_id, company_name , company_address 
        DELETE : company_id
     */
    public function company($method, $data = array())
    {        
        return $this->format($method,'company',$this->token['user'],$data);
    }

    /* Parameter Function Manajemen Employee
        GET : no param
        POST : email , isPic (IsPIC 0 = false, 1 = true), isOwner (IsOwner 0 = false, 1 = true), isEmployee (IsEmployee 0 = false, 1 = true)
        PUT : email , isPic (IsPIC 0 = false, 1 = true), isOwner (IsOwner 0 = false, 1 = true), isEmployee (IsEmployee 0 = false, 1 = true)
        DELETE : email
     */
    public function employee($method, $data = array())
    {        
        return $this->format($method,'employee',$this->token['store'],$data);
    }

    /* Parameter Function Investor
        GET : no param
        POST : email, password , list_outlet (List Outlet : [1, 2, 3]) , percentage 
        PUT : id_investor , percentage 
     */
    public function investor($method, $data = array())
    {        
        return $this->format($method,'investor',$this->token['company'],$data);
    }

    /* Parameter Function Kloter
        GET : no param
        POST : nama_kloter
        PUT : id_kloter , nama_kloter  
        DELETE : id_kloter
     */
    public function kloter($method, $data = array())
    {         
        return $this->format($method,'kloter',$this->token['company'],$data);
    }

    /* Parameter Function DetailKloter
        POST : id_kloter ,list_investor , list_store 
        GET : id_kloter
     */
    public function detailkloter($method, $data = array())
    {         
        return $this->format($method,'detailkloter',$this->token['company'],$data);
    }

     /* Parameter Function materials
        GET : no param
        POST : name, sku, uom, supplier_id
        PUT : name, sku, uom, supplier_id
        DELETE : materials_id 
     */
    public function materials($method, $data = array())
    {        
        return $this->format($method,'materials',$this->token['store'],$data);
    }

    /* Parameter Function buymaterialfromsupplier
        POST : materials_id , buy_price , supplier_id ,uom ,qty 
     */
    public function buymaterialfromsupplier($data)
    {
        return $this->format('POST','materials',$this->token['store'],$data);
    }

    /* Parameter Function buymaterialfromsupplier
        POST : materials_id , buy_price , store_id ,uom ,qty 
     */
    public function buymaterialfromstore($data)
    {
        return $this->format('POST','buymaterialfromstore',$this->token['store'],$data);
    }

    /* Parameter Function products
        GET : no param
        POST : name  , sku  , uom  ,desc  ,status , image, price  
        PUT : name, sku, uom, desc, status,image, products_id,price
        DELETE : products_id 
     */
    public function products($method,$data=array())
    {
        return $this->format($method,'products',$this->token['store'],$data);
    }

    /* Parameter Function buymaterialfromsupplier
        POST : materials_id , buy_price , store_id ,uom ,qty 
     */

    public function bestselling($data)
    {
        return $this->format('POST','/bestselling',$this->token['store'],$data);
    }

    /* Parameter Function recipe
        GET : product_id
        POST : product_id, material_id, qty,uom 
        DELETE : recipe_id  
     */
    public function recipe($method,$data)
    {
        return $this->format($method,'recipe',$this->token['store'],$data);
    }

    public function revenue_user()
    {
        return $this->format('GET','revenue_user',$this->token['store']);
    }

    public function revenue_store()
    {
        return $this->format('GET','revenue_store',$this->token['store']);
    }

    public function revenue_company()
    {
        return $this->format('GET','revenue_company',$this->token['store']);
    }

     /* Parameter Function stores
        GET : no param
        POST : name, address, store_type,status,open,close
        PUT : name, address, store_type,status,open,close,store_id 
        DELETE : store_id 
     */
    public function stores($method,$data=array())
    {
        return $this->format($method,'stores',$this->token['company'],$data);
    }

    public function customer()
    {
        return $this->format('GET','customer',$this->token['store']);
    }

    /* Parameter Function supplier
        GET : no param
        POST : name
        PUT : name, supplier_id
        DELETE : supplier_id 
     */
    public function supplier($method,$data=array())
    {
        return $this->format($method,'suppliers',$this->token['store'],$data);
    }

    /* Parameter Function order
        POST : buyer, total_price, tax,service,discount, list_item  

        list_item json format :
        {
            "items": [
                {
                "product_id": 1,
                "qty": 2
                }
            ]
        }
     */
    public function order($data)
    {
        return $this->format("POST",'order',$this->token['store'],$data);
    }

    /* Parameter Function validateitem
        POST : product_id
     */

    public function validateitem($data)
    {
        return $this->format("POST",'validateitem',$this->token['store'],$data);
    }

    /* Parameter Function history
        GET : by_user (By User (true / false))
     */
    public function history($data)
    {
        return $this->format("GET",'history',$this->token['store'],$data);
    }

    /* Parameter Function invoice
        GET : transaction_id
        POST : transaction_id
     */
    public function invoice($method,$data)
    {
        return $this->format($method,'invoice',$this->token['store'],$data);
    }

    public function getHistory()
    {
        return $this->format('GET','Order/get_history',$this->token['store']);
    }

}

/* End of file APILib.php */
