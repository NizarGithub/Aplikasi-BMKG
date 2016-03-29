<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 27, 2016
 * Time 8:00:08 PM
 * Encoding UTF-8
 * Project BMKG-Server
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
require APPPATH . '/libraries/REST_Controller.php';

class GempaRestController extends REST_Controller {

    public function __construct($config = 'rest') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        parent::__construct();
    }

    public function gempa_get() {
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

        $this->response($list_gempa, REST_Controller::HTTP_OK);
    }

}
