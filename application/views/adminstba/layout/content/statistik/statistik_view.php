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
                <?php elseif($this->session->userdata('level')==='4'):?>
                  <?php $this->load->view("adminstba/layout/mainlogo/mainlogoKeuangan") ?>
                
                <?php endif;?>        
            </div>
         
                <?php if($this->session->userdata('level')==='1'):?>
                  <?php $this->load->view("adminstba/layout/menu/menukajur") ?>
                <!--ACCESS MENUS FOR STAFF-->
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <?php $this->load->view("adminstba/layout/menu/menubaak") ?>
                  
                <?php elseif($this->session->userdata('level')==='4'):?>
                  <?php $this->load->view("adminstba/layout/menu/menukeuangan") ?>
                <!--ACCESS MENUS FOR AUTHOR-->
                
                <?php endif;?>  
        </div>
    
   <div class="main-panel">
        
        <?php $this->load->view("adminstba/layout/mainpanel/mainpanel") ?>

        <div class="content">
                       
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<div class="card">  
    <div class="header" >
                 <h4 class="title">Statistik</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
    </div>
    <hr/>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
	<h4 align="center" ><?php echo $title ?></h4>
	<script src="<?php echo base_url().'assets/js/jquery-3.3.0.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/Chart.min.js'?>"></script>
	
	<canvas id="popChart" width="100" height="25" style="margin-top: 50px;">
<h1>Data <small>Barang!</small>
        <div class="pull-right"><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_newa"> Add New</a></div>       
</h1>
<script>

var ctx = document.getElementById("popChart").getContext("2d");
	var data_nama = [];
	var data_jumlah = [];

	$.post("<?= base_url('admin/baak/statistik/getData') ?>",
		function (data) {
			var obj = JSON.parse(data);
		$.each(obj, function(test, item){
			data_nama.push(item.nama_angkatan);
			data_jumlah.push(item.jumlah);
		});

var lineChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: data_nama,
		datasets: [{
			label: "Jumlah Mahasiswa",
			data: data_jumlah,
			backgroundColor: "#4091e2",
            hoverBackgroundColor : "#2755ba",
			borderColor: "#000",
            backgroundBorderColor : "#000",
			pointBorderColor: "#000",
			pointBorderColor: "rgba(17, 28, 238, 0.55)",
			pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
			pointHoverBackgroundColor: "#fff",
			pointHoverBorderColor: "rgba(220, 220, 220, 1)",
			pointBorderWidth: 1
		}]
	},

options: {
	scales: {
		yAxes : [{
			ticks: {
				beginAtZero: true
			}
		}]
	}
}

});

});
</script>


                                </div>
                                <p class="pull-right">
                                <a href="javascript:window.print()"><button style="background-color: #4091e2;" class="btn btn-fill "><i class="pe-7s-print"></i></button></a>
                                  </p>
                               
                                <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
              
                                <script src="<?php echo base_url('assets/js/ddtf.js') ?>"></script>
                                <script>
                                jQuery('#table_format').ddTableFilter();
                                </script>
                                </div>


                                <footer class="footer">
            <?php $this->load->view("adminstba/layout/footer/footer") ?>
        </footer>
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


</body>


</html>
 <?php $this->load->view("adminstba/layout/footer/js2") ?> 
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                
                icon: 'pe-7s-gift',
                message: "Selamat datang di Admin Panel"

            },{
                type: 'info',
                timer: 2
            });

        });
    </script>

