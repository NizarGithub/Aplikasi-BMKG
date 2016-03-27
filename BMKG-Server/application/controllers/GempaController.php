<!--
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-27T13:46:24+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-27T14:30:57+07:00
@License: apache2
-->

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GempaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gempa');
    }

    public function index()
    {
        $data['gempa'] = $this->Gempa->ambilDataGempa();
        $this->load->view('GempaView', $data);
    }

    public function refreshDataGempa()
    {
        $list_gempa = new SimpleXMLElement('http://data.bmkg.go.id/gempaterkini.xml', null, true);

        foreach ($list_gempa as $lg) {
            $tanggal   = date_create($lg->Tanggal);
            $latitude  = explode(',', $lg->point->coordinates)[0];
            $longitude = explode(',', $lg->point->coordinates)[1];

            if ($this->Gempa->ambilDataGempaBerdasarkanTanggalDanJam(date_format($tanggal, 'Y-m-d'), $lg->Jam, $latitude, $longitude) == 0) {

                $valGempa = array(
                    'id_gempa'  => $this->uuid->v4(),
                    'tanggal'   => date_format($tanggal, 'Y-m-d'),
                    'jam'       => $lg->Jam,
                    'latitude'  => $latitude,
                    'longitude' => $longitude,
                    'lintang'   => $lg->Lintang,
                    'bujur'     => $lg->Bujur,
                    'magnitude' => $lg->Magnitude,
                    'kedalaman' => $lg->Kedalaman,
                    'wilayah'   => $lg->Wilayah,
                );

                $this->Gempa->simpanGempa($valGempa);
            }
        }

        redirect('gempa');
    }
}
