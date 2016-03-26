<!--
@Author: Rizki Mufrizal <rizki>
@Date:   2016-03-26T21:20:50+07:00
@Email:  mufrizalrizki@gmail.com
@Last modified by:   rizki
@Last modified time: 2016-03-26T22:52:21+07:00
@License: apache2
-->

<!DOCTYPE html>
<html>

<head>
  <title>Aplikasi BMKG</title>
  <?php $this->load->view('layout/css')?>
</head>

<body>
  <?php $this->load->view('layout/header')?>

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
          <?php foreach ($cuaca as $c) {?>
            <tr>
              <td class="text-center">
                <?php echo $c->id_cuaca; ?>
              </td>
              <td class="text-center">
                <?php echo $c->tanggal; ?>
              </td>
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

    <?php $this->load->view('layout/js')?>
</body>

</html>
