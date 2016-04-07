<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 27, 2016
 * Time 8:00:00 PM
 * Encoding UTF-8
 * Project BMKG-Server
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class GempaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $url = 'http://data.bmkg.go.id/gempaterkini.xml';
        $curl = curl_init($url);

        $header = array(
            "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
            "Cache-Control: max-age=0",
            "Accept-Charset: UTF-8;q=0.7,*;q=0.7",
            "Pragma: "
        );

        $ua = $_SERVER['HTTP_USER_AGENT'];

        $referer = "";

        $timeout = 30;

        curl_setopt($curl, CURLOPT_USERAGENT, $ua);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_REFERER, $referer);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $cURLxml = curl_exec($curl);

        curl_close($curl);

        $list_gempa = simplexml_load_string($cURLxml);

        $data['gempa'] = $list_gempa;
        $this->load->view('GempaView', $data);
    }

    public function tampilGempa() {

        $url = 'http://data.bmkg.go.id/en_autogempa.xml';
        $curl = curl_init($url);

        $header = array(
            "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
            "Cache-Control: max-age=0",
            "Accept-Charset: UTF-8;q=0.7,*;q=0.7",
            "Pragma: "
        );

        $ua = $_SERVER['HTTP_USER_AGENT'];

        $referer = "";

        $timeout = 30;

        curl_setopt($curl, CURLOPT_USERAGENT, $ua);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_REFERER, $referer);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $cURLxml = curl_exec($curl);

        curl_close($curl);

        $list_gempa = simplexml_load_string($cURLxml);

        $this->load->library('googlemaps');

        $marker = array();

        foreach ($list_gempa->gempa as $g) {
            $config['center'] = explode(",", $g->point->coordinates)[1] . ',' . explode(",", $g->point->coordinates)[0];
            $marker['position'] = explode(",", $g->point->coordinates)[1] . ',' . explode(",", $g->point->coordinates)[0];
        }

        $config['zoom'] = '5';
        $this->googlemaps->initialize($config);

        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        $data['gempaMap'] = $list_gempa;
        $this->load->view('GempaMapView', $data);
    }

}
