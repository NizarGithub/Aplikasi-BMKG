<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Apr 7, 2016
 Time 8:43:08 AM
 Encoding UTF-8
 Project BMKG-Server
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->
<html>

    <head>
        <title>Aplikasi BMKG</title>
        <?php echo $map['js']; ?>
        <?php $this->load->view('layout/css') ?>
    </head>

    <body>
        <?php $this->load->view('layout/header') ?>

        <div class="container">
            <?php echo $map['html']; ?>

            <p></p>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi</h3>
                </div>
                <div class="panel-body">
                    <?php foreach ($gempaMap->gempa as $g) { ?>
                    <p>Daerah : <?php echo $g->Wilayah1; ?></p>
                    <p>Tanggal : <?php echo $g->Tanggal; ?></p>
                    <p>Jam : <?php echo $g->Jam; ?></p>
                    <p>Lintang : <?php echo $g->Lintang; ?></p>
                    <p>Bujur : <?php echo $g->Bujur; ?></p>
                    <p>Magnitude : <?php echo $g->Magnitude; ?></p>
                    <p>Kedalaman : <?php echo $g->Kedalaman; ?></p>
                    <p>Potensi : <?php echo $g->Potensi; ?></p>
                    <?php } ?>
                </div>
            </div>

        </div>

        <?php $this->load->view('layout/js') ?>
    </body>

</html>

