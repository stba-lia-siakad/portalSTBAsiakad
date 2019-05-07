<div class="card">  
    <div class="header" >
                 <h4 class="title">Kalender Pembayaran</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        <?php
                        
                        if($fetch_data->num_rows() > 0)
                        {
                            foreach ($fetch_data->result() as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->nama_kegiatan;?></td>
                                <td><?php echo $row->tanggal_kegiatan_m;?></td>
                                <td><?php echo $row->tanggal_kegiatan_s;?></td>
                            </tr>
                        <?php
                            }
                        }
                        else
                        {
                        ?>
                            <tr>
                                <td colspan="3">No data Found</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </table>
                    </div>
                    </div>