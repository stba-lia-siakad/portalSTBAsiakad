            <ul class="nav">
                <li>
                    <a href="<?php echo site_url('admin/home') ?>">
                        <i class="pe-7s-home"></i>
                        <p>HOME</p>
                    </a>
                </li>
                
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-news-paper"></i><p>DATA MASTER<b class="caret"></b></p></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('admin/baak/mahasiswa') ?>"><font color="black"><i class="pe-7s-study"></i><p>Mahasiswa</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/dosen') ?>"><font color="black"><i class="pe-7s-users"></i><p>Dosen</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/room') ?>"><font color="black"><i class="pe-7s-way"></i><p>Ruangan</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/jam') ?>"><font color="black"><i class="pe-7s-stopwatch"></i><p>Jam</p></a></font></li>
                 <li><a href="<?php echo site_url('admin/baak/beasiswa') ?>"><font color="black"><i class="pe-7s-medal"></i><p>Beasiswa</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/nilai') ?>"><font color="black"><i class="pe-7s-star"></i><p>Nilai</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/jurusan') ?>"><font color="black"><i class="pe-7s-science"></i><p>Prodi</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/jenjang') ?>"><font color="black"><i class="pe-7s-shuffle"></i><p>Jenjang</p></a></font></li>
                <li><a href="<?php echo site_url('admin/baak/matakuliah') ?>"><font color="black"><i class="pe-7s-paperclip"></i><p>Mata Kuliah</p></a></font></li>
              </ul>
                </li>
                <li>
                    <a href="?page=dashboard">
                        <i class="pe-7s-file"></i>
                        <p>KRS</p>
                    </a>
                </li>
                <li>
                    <a href="?page=dashboard">
                        <i class="pe-7s-copy-file"></i>
                        <p>KHS</p>
                    </a>
                </li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-pin"></i><p>PENGUMUMAN<b class="caret"></b></p></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('post_berita/lists') ?>"><font color="black"><i class="pe-7s-file"></i><p>Lihat Pengumuman</p></a></font></li>
                <li><a href="<?php echo site_url('post_berita') ?>"><font color="black"><i class="pe-7s-paperclip"></i><p>Buat Pengumuman</p></a></font></li>
              </ul>
                </li>
                
                <li>
                    <a href="<?php echo site_url('admin/baak/jadwal_rekap/kelas') ?>">
                        <i class="pe-7s-date"></i>
                        <p>Jadwal Matakuliah</p>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo site_url('admin/baak/Statistik') ?>">
                        <i class="pe-7s-graph2"></i>
                        <p>Statistik</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('akun/konfig') ?>">
                        <i class="pe-7s-config"></i>
                        <p>Konfigurasi</p>
                    </a>
                </li>
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