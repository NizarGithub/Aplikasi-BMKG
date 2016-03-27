/**
* @Author: Rizki Mufrizal <rizki>
* @Date:   2016-03-26T22:24:57+07:00
* @Email:  mufrizalrizki@gmail.com
* @Last modified by:   rizki
* @Last modified time: 2016-03-27T12:25:48+07:00
* @License: apache2
*/

CREATE TABLE IF NOT EXISTS tb_cuaca(
  	id_cuaca VARCHAR(150) NOT NULL PRIMARY KEY,
  	tanggal DATE NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS tb_cuaca_detail(
	  id_cuaca_detail VARCHAR(150) NOT NULL PRIMARY KEY,
  	kota VARCHAR(50) NOT NULL,
  	cuaca VARCHAR(50) NOT NULL,
  	suhu_min INT(10) NOT NULL,
  	suhu_max INT(10) NOT NULL,
  	kelembapan_min INT(10) NOT NULL,
  	kelembapan_max INT(10) NOT NULL,
  	id_cuaca VARCHAR(150) NOT NULL,
  	FOREIGN KEY(id_cuaca) REFERENCES tb_cuaca(id_cuaca)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS tb_gempa(
    id_gempa VARCHAR(150) NOT NULL PRIMARY KEY,
    tanggal DATE NOT NULL,
    jam VARCHAR(50) NOT NULL,
    latitude VARCHAR(150) NOT NULL,
    longitude VARCHAR(150) NOT NULL,
    lintang VARCHAR(50) NOT NULL,
    bujur VARCHAR(50) NOT NULL,
    magnitude VARCHAR(50) NOT NULL,
    kedalaman VARCHAR(50) NOT NULL,
    wilayah VARCHAR(200) NOT NULL
)ENGINE= InnoDB;
