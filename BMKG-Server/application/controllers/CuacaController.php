<!--
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-26T21:16:13+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-26T22:21:25+07:00
@License: apache2
-->

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CuacaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cuaca');
        $this->load->model('CuacaDetail');
    }

    public function index()
    {
        $data['cuaca'] = $this->Cuaca->ambilDataCuaca();
        $this->load->view('CuacaView', $data);
    }

    public function lihatCuacaDetail($idCuaca)
    {
      $data['cuacaDetail'] = $this->CuacaDetail->ambilDataCuacaDetail($idCuaca);
      $this->load->view('CuacaDetailView', $data);
    }

    public function refreshDataCuaca()
    {
        $list_cuaca = new SimpleXMLElement('http://data.bmkg.go.id/cuaca_indo_1.xml', null, true);
        $tanggalMulai = date_create($list_cuaca->Tanggal->Mulai);

        if ($this->Cuaca->ambilDataCuacaBerdasarkanTanggal(date_format($tanggalMulai,"Y-m-d")) == 0) {
            $idCuaca = $this->uuid->v4();

            $valCuaca = array(
              'id_cuaca' => $idCuaca,
              'tanggal' => date_format($tanggalMulai,"Y-m-d")
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

                $this->CuacaDetail->simpanCuacaDetail($valCuacaDetail);
            }
        }

        redirect('/');
    }
}
