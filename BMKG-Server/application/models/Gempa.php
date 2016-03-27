<?php

defined('BASEPATH') or exit('No direct script access allowed');
/*
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-27T12:27:14+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-27T14:28:17+07:00
@License: apache2
 */

class Gempa extends CI_Model
{
    public function ambilDataGempa()
    {
        $this->db->order_by('tanggal', 'DESC');

        return $this->db->get('tb_gempa')->result();
    }

    public function ambilDataGempaBerdasarkanTanggalDanJam($tanggal, $jam, $latitude, $longitude)
    {
        $this->db->where('tanggal', $tanggal);
        $this->db->where('jam', $jam);
        $this->db->where('latitude', $latitude);
        $this->db->where('longitude', $longitude);

        return $this->db->get('tb_gempa')->num_rows();
    }

    public function simpanGempa($gempa)
    {
        $this->db->insert('tb_gempa', $gempa);
    }
}
