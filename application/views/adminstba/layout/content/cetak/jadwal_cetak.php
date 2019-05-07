
<!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <script type="text/javascript">
            window.print();
            </script>
        </head>
        <body>
        <table>
            <tr>
                <td colspan="9"></td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td colspan="2"><img style="height:50px;width:auto" src="<?= base_url() ?>assets/img/stbawite.png"></td>
                <td colspan="7" align="center"><h2>Sekolah Tinggi Bahasa Asing</h2><h3 style="margin-top:-20px">(STBA) LIA Yogyakarta</h3></td>
            </tr>
            <tr>
                <td colspan="9" align="center"><h3>Bukti Pembayaran Mahasiswa</h3></td>
            </tr>
            <tr>
                <td colspan="9"><hr><hr><br></td>
            </tr>
        <tr style="border:1px;outline: thin solid">
         <?php
                                              if($cetak_data->num_rows() > 0)
                                              {
                                                  foreach ($cetak_data->result() as $row) {
                                              ?>                            
                                        <tr>
                                            <td>NIM</td>
                                            <td>:</td>
                                            <td><?php echo $row->nim;?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $row->nama_mhs;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>:</td>
                                            <td><?php echo $row->nama_jurusan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenjang</td>
                                            <td>:</td>
                                            <td><?php echo $row->nama_jenjang;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Pembayaran</td>
                                            <td>:</td>
                                            <td><?php echo $row->jenis_pembayaran;?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Ajaran</td>
                                            <td>:</td>
                                            <td><?php echo $row->th_ajaran;?></td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>:</td>
                                                      <td><?php echo $row->nama_semester;?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pembayaran</td>
                                            <td>:</td>
                                                      <td><?php echo $row->tanggal;?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>:</td>
                                                      <td>Rp<?php echo  $row->jumlah;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Dibayarkan</td>
                                            <td>:</td>
                                                      <td>Rp<?php echo  $row->jumlah_dibayarkan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Kekurang</td>
                                            <td>:</td>
                                            <?php
                                                        $kurang = $row->jumlah-$row->jumlah_dibayarkan;

                                                      ?>
                                                      <td>Rp<?php echo $kurang;?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                                      <td><?php 
                                                        if($row->status_bayar == 2){
                                                          echo "Lunas";
                                                          }else if($row->status_bayar == 1){
                                                          echo "Belum Lunas";
                                                          };



                                                      ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                                      <td><?php echo $row->catatan;?></td>
                                        </tr>
        </tr>
        
<?php ;
                                                  }
                                              }
                                              
                                      ?> 
                                      <tr>
                                        <td></td>
                                            <td></td>
                                        <td><center>TTD
                                      
                                            <br><br><br><br>

                                     
                                              Bagian Keuangan</center>
                                          </td>
                                      </tr>
    
</table>
</body>
</html>