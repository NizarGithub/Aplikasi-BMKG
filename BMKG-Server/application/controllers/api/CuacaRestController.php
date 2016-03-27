<?php

/*
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-26T22:26:04+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-26T22:48:22+07:00
@License: apache2
 */

require APPPATH . '/libraries/REST_Controller.php';

class CuacaRestController extends REST_Controller
{
    public function __construct($config = 'rest')
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        $this->load->model('Cuaca');
        $this->load->model('CuacaDetail');
    }

    public function cuaca_get()
    {
        $cuaca = $this->Cuaca->ambilDataCuaca()[0];

        $tanggal = $cuaca->tanggal;
        $idCuaca = $cuaca->id_cuaca;

        $cuacaDetail = $this->CuacaDetail->ambilDataCuacaDetail($idCuaca);

        $response = array(
            'tanggal' => $tanggal,
            'content' => $cuacaDetail,
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }
}
