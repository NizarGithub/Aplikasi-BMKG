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
                    <?php foreach ($gempa->gempa as $g) { ?>
                        <tr>
                            <td class="text-center"><?php echo $g->Tanggal; ?>, <?php echo $g->Jam; ?></td>
                            <td class="text-center"><?php echo $g->point->coordinates; ?></td>
                            <td class="text-center"><?php echo $g->Lintang; ?></td>
                            <td class="text-center"><?php echo $g->Bujur; ?></td>
                            <td class="text-center"><?php echo $g->Magnitude; ?></td>
                            <td class="text-center"><?php echo $g->Kedalaman; ?></td>
                            <td class="text-center"><?php echo $g->Wilayah; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php $this->load->view('layout/js') ?>
    </body>

</html>
