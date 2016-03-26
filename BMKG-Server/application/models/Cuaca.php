<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-26T20:46:31+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-26T22:32:43+07:00
@License: apache2
 */

class Cuaca extends CI_Model
{
    public function ambilDataCuaca()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get('tb_cuaca')->result();
    }

    public function ambilDataCuacaBerdasarkanTanggal($tanggal)
    {
        $this->db->where('tanggal', $tanggal);
        return $this->db->get('tb_cuaca')->num_rows();
    }

    public function simpanCuaca($cuaca)
    {
        $this->db->insert('tb_cuaca', $cuaca);
    }
}
