<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-26T21:14:44+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-26T22:33:25+07:00
@License: apache2
 */

class CuacaDetail extends CI_Model
{
    public function ambilDataCuacaDetail($idCuaca)
    {
        $this->db->where('id_cuaca', $idCuaca);
        return $this->db->get('tb_cuaca_detail')->result();
    }

    public function simpanCuacaDetail($cuacaDetail)
    {
        $this->db->insert('tb_cuaca_detail', $cuacaDetail);
    }
}
