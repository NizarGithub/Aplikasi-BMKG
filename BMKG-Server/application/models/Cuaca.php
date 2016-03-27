<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 27, 2016
 * Time 7:58:07 PM
 * Encoding UTF-8
 * Project BMKG-Server
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class Cuaca extends CI_Model {

    public function ambilDataCuaca() {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('tb_cuaca')->result();
    }

    public function ambilDataCuacaBerdasarkanTanggal($tanggal) {
        $this->db->where('tanggal', $tanggal);
        return $this->db->get('tb_cuaca')->num_rows();
    }

    public function simpanCuaca($cuaca) {
        $this->db->insert('tb_cuaca', $cuaca);
    }

    public function ambilDataCuacaDetail($idCuaca) {
        $this->db->where('id_cuaca', $idCuaca);
        return $this->db->get('tb_cuaca_detail')->result();
    }

    public function simpanCuacaDetail($cuacaDetail) {
        $this->db->insert('tb_cuaca_detail', $cuacaDetail);
    }

}
