<?php

/*
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-26T22:26:04+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-27T14:33:49+07:00
@License: apache2
 */

require APPPATH . '/libraries/REST_Controller.php';

class GempaRestController extends REST_Controller
{
    public function __construct($config = 'rest')
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        $this->load->model('Gempa');
    }

    public function gempa_get()
    {
        $gempa = $this->Gempa->ambilDataGempa()[0];

        $response = array(
            'content' => $gempa,
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
