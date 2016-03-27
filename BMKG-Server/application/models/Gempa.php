<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Mar 27, 2016
 * Time 7:58:24 PM
 * Encoding UTF-8
 * Project BMKG-Server
 * Package Expression package is undefined on line 12, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class Gempa extends CI_Model {

    public function ambilDataGempa() {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('tb_gempa')->result();
    }

    public function ambilDataGempaBerdasarkanTanggalDanJam($tanggal, $jam, $latitude, $longitude) {
        $this->db->where('tanggal', $tanggal);
        $this->db->where('jam', $jam);
        $this->db->where('latitude', $latitude);
        $this->db->where('longitude', $longitude);
        return $this->db->get('tb_gempa')->num_rows();
    }

    public function simpanGempa($gempa) {
        $this->db->insert('tb_gempa', $gempa);
    }

}
