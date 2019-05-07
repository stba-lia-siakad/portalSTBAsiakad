    <div class="card">  
    <div class="header" >
    <div class="container">
         <div class="header" >
                 <h4 class="title">Statistik</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>                                

    <h2 align="center" ><?php echo $title ?></h2>
    
    <canvas id="popChart" width="100" height="25" style="margin-top: 50px;">
                        
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
</canvas>
                    </div>