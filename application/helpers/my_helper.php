<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers MY_Helper_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('print_arr')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function print_arr($arr)
  {
    echo '<pre>'.print_r($arr,1).'</pre>';
  }
}

// ------------------------------------------------------------------------


if(!function_exists('getDateIndo')){
  function getDateIndo($date){
    $hari     = strftime("%A",strtotime($date));
    $tanggal  = strftime("%d",strtotime($date));
    $bulan    = strftime("%B",strtotime($date));
    $tahun    = strftime("%Y",strtotime($date));

    $jam      = date("H",strtotime($date));
    $menit    = date("m",strtotime($date));
    $detik    = date("s",strtotime($date));

    $arr_hari   = array("Sunday"=>"Minggu","Monday"=>"Senin","Tuesday"=>"Selasa","Wednesday"=>"Rabu","Thursday"=>"Kamis","Friday"=>"Jumat","Saturday"=>"Sabtu");
    $arr_bulan  = array("January"=> "Januari","February"=>"Februari","March"=>"Maret","April"=>"April","May"=>"Mei","June"=>"Juni","July"=>"Juli","August"=>"Agustus","September"=>"September","October"=>"Oktober","November"=>"Nopember","December"=>"Desember");

    return $arr_hari[$hari].", ".$tanggal." ".$arr_bulan[$bulan].' '.$tahun." ".$jam.":".$menit.":".$detik;
  }
}

if(!function_exists('getDateOnly')){
    function getDateOnly($date){
      $tanggal  = strftime("%d",strtotime($date));
      $bulan    = strftime("%m",strtotime($date));
      $tahun    = strftime("%Y",strtotime($date));
  
      return $tanggal.'-'.$bulan.'-'.$tahun;
    }
  }


  if(!function_exists('GenRupiah')){
    function GenRupiah($value)
    {
      $hasil_rupiah = "Rp " . number_format($value,2,',','.');
	    return $hasil_rupiah;
    }
  }

  if(!function_exists('CheckInRangeDate')){
    function CheckInRangeDate($start, $end, $date_in)
    {
      $start_ts = strtotime($start);
      $end_ts = strtotime($end);
      $user_ts = strtotime($date_in);

      //echo $start."<br>".$end."<br>".$date_in;

      return (($user_ts >= $start_ts) && ($user_ts <= $end_ts)) ? true :false;
    }
  }
  
  if (!function_exists('random_color')){
    function random_color_part() {
      return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
      return random_color_part() . random_color_part() . random_color_part();
    }
  }

  if (!function_exists('searchArray')){
    function searchArray($value, $index, $array){
      return array_search($value, array_column($array, $index));
    }
  }

/* End of file MY_Helper.php */
/* Location: ./application/helpers/MY_Helper.php */