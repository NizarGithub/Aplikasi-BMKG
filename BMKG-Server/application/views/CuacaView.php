<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 27, 2016
 Time 8:01:46 PM
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

        <meta http-equiv=refresh content="<?php echo $refreshTime; ?>; url=<?php echo base_url(); ?>index.php/CuacaController/refreshDataCuaca">

        <title>Aplikasi BMKG</title>
        <?php $this->load->view('layout/css') ?>
    </head>

    <body>
        <?php $this->load->view('layout/header') ?>

        <div class="container">

            <a href="<?php echo base_url(); ?>index.php/CuacaController/refreshDataCuaca">
                <button type="button" class="btn btn-default">
                    refresh
                </button>
            </a>

            <p></p>

            <table id="tabel" class="table table-bordered table-hover table-responsive table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID Cuaca</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cuaca as $c) { ?>
                        <tr>
                            <td class="text-center"><?php echo $c->id_cuaca; ?></td>
                            <td class="text-center"><?php echo $c->tanggal; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url(); ?>index.php/CuacaController/lihatCuacaDetail/<?php echo $c->id_cuaca ?>">
                                    <button type="button" class="btn btn-default">
                                        Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php $this->load->view('layout/js') ?>
    </body>

</html>
