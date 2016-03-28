<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 27, 2016
 Time 8:01:55 PM
 Encoding UTF-8
 Project BMKG-Server
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->
<html>

    <head>

        <?php
        $now = time();
        $today = strtotime('3:00');
        $tomorrow = strtotime('tomorrow 3:00');
        if (($today - $now) > 0) {
            $refreshTime = $today - $now;
        } else {
            $refreshTime = $tomorrow - $now;
        }
        ?>

        <meta http-equiv=refresh content="<?php echo $refreshTime; ?>; url=<?php echo base_url(); ?>index.php/GempaController/refreshDataGempa">

        <title>Aplikasi BMKG</title>
        <?php $this->load->view('layout/css') ?>
    </head>

    <body>
        <?php $this->load->view('layout/header') ?>

        <div class="container">

            <a href="<?php echo base_url(); ?>index.php/GempaController/refreshDataGempa">
                <button type="button" class="btn btn-default">
                    refresh
                </button>
            </a>

            <p></p>

            <table id="tabel" class="table table-bordered table-hover table-responsive table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID Gempa</th>
                        <th class="text-center">Tanggal Dan Jam</th>
                        <th class="text-center">Latitude Dan Longitude</th>
                        <th class="text-center">Lintang</th>
                        <th class="text-center">Bujur</th>
                        <th class="text-center">Magnitude</th>
                        <th class="text-center">Kedalaman</th>
                        <th class="text-center">Wilayah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($gempa as $g) { ?>
                        <tr>
                            <td class="text-center"><?php echo $g->id_gempa; ?></td>
                            <td class="text-center"><?php echo $g->tanggal; ?>, <?php echo $g->jam; ?></td>
                            <td class="text-center"><?php echo $g->latitude; ?>, <?php echo $g->longitude; ?></td>
                            <td class="text-center"><?php echo $g->lintang; ?></td>
                            <td class="text-center"><?php echo $g->bujur; ?></td>
                            <td class="text-center"><?php echo $g->magnitude; ?></td>
                            <td class="text-center"><?php echo $g->kedalaman; ?></td>
                            <td class="text-center"><?php echo $g->wilayah; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php $this->load->view('layout/js') ?>
    </body>

</html>
