                <ul class="nav">
                <li class="<?php echo activate_menu('home'); ?>">
                    <a href="<?php echo site_url('admin/home') ?>">
                        <i class="pe-7s-home"></i>
                        <p>HOME</p>
                    </a>
                </li>
                
        
              <li class="dropdown <?php echo activate_menu('ploting'); echo activate_menu('plot_kelas'); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-notebook"></i><p>PLOTING<b class="caret"></b></p></a>
              <ul class="dropdown-menu">
                <li class="<?php echo activate_menu('ploting'); ?>"><a href="<?php echo site_url('admin/kajur/ploting') ?>"><font color="black"><i class="pe-7s-door-lock"></i><p>Kelas</p></a></font></li>
                <li class="<?php echo activate_menu('plot_kelas'); ?>"><a href="<?php echo site_url('admin/kajur/plot_kelas') ?>"><font color="black"><i class="pe-7s-paperclip"></i><p>Mata Kuliah</p></a></font></li>
              </ul>
                </li>
                
                <li class="dropdown <?php echo activate_menu('krs'); echo activate_menu('jadwal'); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-date"></i><p>PENJADWALAN<b class="caret"></b></p></a>
              <ul class="dropdown-menu">
                <li class="<?php echo activate_menu('krs'); ?>"><a href="<?php echo site_url('krs/jadwalkrs') ?>"><font color="black"><i class="pe-7s-file"></i><p>KRS</p></a></font></li>
                <li class="<?php echo activate_menu('jadwal'); ?>"><a href="<?php echo site_url('jadwal') ?>"><font color="black"><i class="pe-7s-paperclip"></i><p>Mata Kuliah</p></a></font></li>
              </ul>
                </li>
                <li class="dropdown <?php echo activate_menu('post_berita'); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-pin"></i><p>PENGUMUMAN<b class="caret"></b></p></a>
              <ul class="dropdown-menu">
                <li class="<?php echo activate_menu('post_berita'); ?>"><a href="<?php echo site_url('post_berita/lists') ?>"><font color="black"><i class="pe-7s-file"></i><p>Lihat Pengumuman</p></a></font></li>
                <li class="<?php echo activate_menu('post_berita'); ?>"><a href="<?php echo site_url('post_berita') ?>"><font color="black"><i class="pe-7s-paperclip"></i><p>Buat Pengumuman</p></a></font></li>
              </ul>
                </li>                                
                </li>
                <li class="dropdown <?php echo activate_menu('statistik'); ?>">
                    <a href="<?php echo site_url('admin/kajur/statistik') ?>">
                        <i class="pe-7s-graph2"></i>
                        <p>STATISTIK</p>
                    </a>
                </li>
             <li class="dropdown <?php echo activate_menu('akun'); echo activate_menu('kalender_akademik'); echo activate_menu('kalender_pembayaran'); echo activate_menu('pengumuman'); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-config"></i><p>KONFIGURASI<b class="caret"></b></p></a>
              <ul class="dropdown-menu">
                <li class="<?php echo activate_menu('akun'); ?>"><a href="<?php echo site_url('akun/konfig') ?>"><font color="black"><i class="pe-7s-key"></i><p>Semester Aktif</p></a></font></li>
                <li class="<?php echo activate_menu('kalender_akademik'); ?>"><a href="<?php echo site_url('admin/kajur/kalender_akademik') ?>"><font color="black"><i class="pe-7s-portfolio"></i><p>Kalender Akademik</p></a></font></li>
                <li class="<?php echo activate_menu('kalender_pembayaran'); ?>"><a href="<?php echo site_url('admin/kajur/kalender_pembayaran') ?>"><font color="black"><i class="pe-7s-cash"></i><p>Kalender Pembayaran</p></a></font></li>
                <li class="<?php echo activate_menu('pengumuman'); ?>"><a href="<?php echo site_url('admin/kajur/pengumuman') ?>"><font color="black"><i class="pe-7s-cash"></i><p>Pengumuman</p></a></font></li>
              </ul>
                </li>
                
                <br/>
                <br/>
                <br/>
                <hr/>
        <div class="alert alert-white" role="alert">
            <center style="color: #fff;">

        <?php echo date('l, d F Y');?>
        <hr/>
        </center>
<html>
<head>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
</head>
<center>
<body style="color: #000;" onload="startTime()">
<div style="color: #fff;" id="txt"></div>
</center>
</body>
</html>
</div>

<hr/>
              </ul>
            </li>
            </ul>
        </div>