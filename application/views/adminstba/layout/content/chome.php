
                             <div class="card">  
    <div class="header" >
                 <h4 class="title">Kalender Akademik</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <tr style="background-color: #4091e2;">
                                <th style="color: white;">Kegiatan</th>
                                <th style="color: white;">Tanggal Mulai</th>
                                <th style="color: white;">Tanggal Selesai</th>
                            </tr>
                        <?php
                        
                        if($fetch_data->num_rows() > 0)
                        {
                            foreach ($fetch_data->result() as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->nama_kegiatan;?></td>
                                <td><?php echo date('d F Y',strtotime($row->tanggal_kegiatan_m)) ?></td>                      
                                <td><?php echo date('d F Y',strtotime($row->tanggal_kegiatan_s)) ?></td>
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


 
