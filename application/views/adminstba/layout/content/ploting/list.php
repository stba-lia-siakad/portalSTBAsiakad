
<!doctype html>
<html lang="en">
<head>
   <?php $this->load->view("adminstba/layout/header/head") ?> 
</head>
<body>

<div class="wrapper">
    
<?php $this->load->view("adminstba/layout/sidelogo/sidelogo") ?>

        
        <div class="sidebar-wrapper">
            <div class="logo">
                <?php if($this->session->userdata('level')==='1'):?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogo") ?>
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogoBAK") ?>
                <!--ACCESS MENUS FOR AUTHOR-->
                <?php else:?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogoBAK") ?>
                <?php endif;?>        
            </div>
         
                <?php if($this->session->userdata('level')==='1'):?>
                  <?php $this->load->view("adminstba/layout/menu/menukajur") ?>
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <?php $this->load->view("adminstba/layout/menu/menubaak") ?>
                <!--ACCESS MENUS FOR AUTHOR-->
                <?php else:?>
                  <?php $this->load->view("adminstba/layout/menu/menubaak") ?>
                <?php endif;?>  
        </div>
    
   <div class="main-panel">
        
        <?php $this->load->view("adminstba/layout/mainpanel/mainpanel") ?>

        <div class="content">
                    <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/kajur/mk/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: #4091e2;">
                                    <tr>
                                        <th style="color: white;">No.</th>
                                        <th style="color: white;">ID Matakuliah</th>
                                        <th style="color: white;">ID Dosen</th>
                                        <th style="color: white;">Tanggal</th>
                                        <th style="color: white;">ID Akun Ploting</th>
                                        <th style="color: white;">Status</th>
                                        <th style="color: white;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td width="150">
                                            <?php echo $product->id_ploting ?>
                                        </td>
                                        <td>
                                            <?php echo $product->ploting_id_matakuliah ?>
                                        </td>
                                        <td>
                                            <?php echo $product->ploting_id_dosen ?>
                                        </td>
                                        <td>
                                            <?php echo $product->ploting_date ?>
                                        </td>
                                        <td>
                                            <?php echo $product->ploting_id_akun ?>
                                        </td>
                                        <td>
                                            <?php echo $product->ploting_status ?>
                                        </td>

                                        
                                        
                                        <td>
                                            <a href="<?php echo site_url('admin/products/edit/'.$product->id_ploting) ?>"
                                             class="btn btn-small"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/products/delete/'.$product->id_ploting) ?>')"
                                             href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
        </div>


        <footer class="footer">
            <?php $this->load->view("adminstba/layout/footer/footer") ?>
        </footer>

    </div>
</div>

<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

    <?php $this->load->view("adminstba/layout/footer/js") ?>

</html>


