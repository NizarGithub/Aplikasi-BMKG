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
        <title>Aplikasi BMKG</title>
        <?php $this->load->view('layout/css') ?>
    </head>

    <body>
        <?php $this->load->view('layout/header') ?>

        <div class="container">

            <table id="tabel" class="table table-bordered table-hover table-responsive table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Kota</th>
                        <th class="text-center">Cuaca</th>
                        <th class="text-center">Suhu Minimal</th>
                        <th class="text-center">Suhu Maksimal</th>
                        <th class="text-center">Kelembapan Minimal</th>
                        <th class="text-center">Kelembapan Maksimal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cuaca->Isi->Row as $c) { ?>
                        <tr>
                            <td class="text-center"><?php echo $c->Kota; ?></td>
                            <td class="text-center"><?php echo $c->Cuaca; ?></td>
                            <td class="text-center"><?php echo $c->SuhuMin; ?>&deg</td>
                            <td class="text-center"><?php echo $c->SuhuMax; ?>&deg</td>
                            <td class="text-center"><?php echo $c->KelembapanMin; ?>&deg</td>
                            <td class="text-center"><?php echo $c->KelembapanMax; ?>&deg</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php $this->load->view('layout/js') ?>
    </body>

</html>
