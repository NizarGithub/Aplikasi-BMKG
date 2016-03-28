<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 27, 2016
 Time 8:01:46 PM
 Encoding UTF-8
 Project BMKG-Server
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Aplikasi BMKG</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/cuaca">Cuaca</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/gempa">Gempa</a></li>
            </ul>
        </div>
    </div>
</nav>
