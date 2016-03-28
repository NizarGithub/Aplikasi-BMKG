<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 27, 2016
 Time 8:01:46 PM
 Encoding UTF-8
 Project BMKG-Server
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->

<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tabel').DataTable();
        $('#tabelDetail').DataTable();
    });
</script>