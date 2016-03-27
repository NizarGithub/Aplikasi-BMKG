<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 27, 2016
 * Time 7:59:44 PM
 * Encoding UTF-8
 * Project BMKG-Server
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class CuacaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cuaca');
    }

    public function index() {
        $data['cuaca'] = $this->Cuaca->ambilDataCuaca();
        $this->load->view('CuacaView', $data);
    }

    public function lihatCuacaDetail($idCuaca) {
        $data['cuacaDetail'] = $this->Cuaca->ambilDataCuacaDetail($idCuaca);
        $this->load->view('CuacaDetailView', $data);
    }

    public function refreshDataCuaca() {

        $url = 'http://data.bmkg.go.id/cuaca_indo_1.xml';
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

        $list_cuaca = simplexml_load_string($cURLxml);

        $tanggalMulai = date_create($list_cuaca->Tanggal->Mulai);

        if ($this->Cuaca->ambilDataCuacaBerdasarkanTanggal(date_format($tanggalMulai, "Y-m-d")) == 0) {
            $idCuaca = $this->uuid->v4();

            $valCuaca = array(
                'id_cuaca' => $idCuaca,
                'tanggal' => date_format($tanggalMulai, "Y-m-d")
            );

            $this->Cuaca->simpanCuaca($valCuaca);

            foreach ($list_cuaca->Isi->Row as $c) {
                $valCuacaDetail = array(
                    'id_cuaca_detail' => $this->uuid->v4(),
                    'kota' => $c->Kota,
                    'cuaca' => $c->Cuaca,
                    'suhu_min' => $c->SuhuMin,
                    'suhu_max' => $c->SuhuMax,
                    'kelembapan_min' => $c->KelembapanMin,
                    'kelembapan_max' => $c->KelembapanMax,
                    'id_cuaca' => $idCuaca
                );

                $this->Cuaca->simpanCuacaDetail($valCuacaDetail);
            }
        }

        redirect('/');
    }

}
