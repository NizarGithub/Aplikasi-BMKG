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
        $this->load->model('Gempa');
    }

    public function gempa_get() {
        $gempa = $this->Gempa->ambilDataGempa()[0];

        $response = array(
            'content' => $gempa,
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
