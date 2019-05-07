<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Data Barang</title>
    
<?php $this->load->view('adminstba/layout/header/head.php')?>
</head>
<body>
 
<div class="container">
    <h1>Data <small>Barang!</small>
        <div class="pull-right"><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_newa"> Add New</a></div>       
    </h1>
 
     
</div>
 
 
<!-- ============ MODAL ADD BARANG =============== -->
       
 

 <div class="modal fade" id="modal_add_newa" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <title></title>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
    <h2 align="center" >Contoh</h2>
    <script src="<?php echo base_url().'assets/js/jquery-3.3.0.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/Chart.min.js'?>"></script>
    
    <canvas id="popChart" width="100" height="25" style="margin-top: 50px;">

<script>

var ctx = document.getElementById("popChart").getContext("2d");
    var data_nama = [];
    var data_jumlah = [];

    $.post("<?= base_url('admin/baak/barang/getData') ?>",
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
            backgroundColor: "rgba(17, 28, 238, 0.55)",
            borderColor: "rgba(17, 28, 238, 0.55)",
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
</body>
</body>
</div>
</div>
</div>
</div>
<?php $this->load->view('adminstba/layout/footer/js.php')?>
</html>
