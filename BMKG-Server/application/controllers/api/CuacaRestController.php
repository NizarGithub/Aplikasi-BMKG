<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 27, 2016
 * Time 7:59:53 PM
 * Encoding UTF-8
 * Project BMKG-Server
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
require APPPATH . '/libraries/REST_Controller.php';

class CuacaRestController extends REST_Controller {

    public function __construct($config = 'rest') {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        parent::__construct();
        $this->load->model('Cuaca');
    }

    public function cuaca_get() {
        $cuaca = $this->Cuaca->ambilDataCuaca()[0];

        $tanggal = $cuaca->tanggal;
        $idCuaca = $cuaca->id_cuaca;

        $cuacaDetail = $this->Cuaca->ambilDataCuacaDetail($idCuaca);

        $response = array(
            'tanggal' => $tanggal,
            'content' => $cuacaDetail
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
