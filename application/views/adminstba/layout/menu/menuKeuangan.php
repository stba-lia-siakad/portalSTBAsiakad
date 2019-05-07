

            <ul class="nav">
                <li>
                    <a href="<?php echo site_url('admin/home') ?>">
                        <i class="pe-7s-home"></i>
                        <p>HOME</p>
                    </a>
                </li>
                
                <li>
                   <a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/input_pembayaran') ?>">
                        <i class="pe-7s-pen"></i>
                        <p>Input Pembayaran</p>
                        </a>
                </li>
               <li>
                    <a href="<?php echo site_url('admin/keuangan/Keuangan_daftarPembayaran') ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Daftar Pembayaran</p>
                        </a>
                </li>
                
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-notebook"></i><p>Data Pembayaran<b class="caret"></b></p></a>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/SPPVariabel') ?>"><font color="black"><i class="pe-7s-ribbon"></i>SPP Variabel</a></font></li>
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/SPPTetap') ?>"><font color="black"><i class="pe-7s-ribbon"></i>SPP Tetap</a></font></li>
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/SPA') ?>"><font color="black"><i class="pe-7s-ribbon"></i>SPA</a></font></li>
                  </ul>
                </li> -->
               <!--  <li>
                    <a href="<?php echo site_url('admin/keuangan/Keuangan_rekap') ?>">
                        <i class="pe-7s-notebook"></i>
                        <p>Rekap Pembayaran</p>
                        </a>
                </li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-notebook"></i><p>Rekap Pembayaran<b class="caret"></b></p></a>
                  <ul class="dropdown-menu pull-right">
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap') ?>"><font color="black"><i class="pe-7s-ribbon"></i>Semua Data</a></font></li>
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/list_ganjil') ?>"><font color="black"><i class="pe-7s-ribbon"></i>Ganjil</a></font></li>
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/list_genap') ?>"><font color="black"><i class="pe-7s-ribbon"></i>Genap</a></font></li>
                    <li><a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/belum_lunas') ?>"><font color="black"><i class="pe-7s-ribbon"></i>Belum Lunas</a></font></li>
                  </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/data_pembayaran') ?>">
                        <i class="pe-7s-graph2"></i>
                        <p>DATA PEMBAYARAN</p>
                    </a>
                </li>
                               
                <li>
                    <a href="<?php echo site_url('admin/keuangan/Keuangan_rekap/laporan_pembayaran') ?>">
                        <i class="pe-7s-graph2"></i>
                        <p>LAPORAN</p>
                    </a>
                </li>
            </ul>
        </div>