<?php $this->load->view('adminstba/layout_more/top')?>
<div class="card">  
    <div class="header" >
	<div class="container">
		 <div class="header" >
                 <h4 class="title">Pengumuman</h4>
                 <p class="category">STBA LIA Yogyakarta</p>
             <hr/>
         </br>
    </div>
    	<a text-align="center">
		<?php
			function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
			foreach ($data->result_array() as $i) :
				$id=$i['berita_id'];
				$judul=$i['berita_judul'];
				$image=$i['berita_image'];
				$isi=$i['berita_isi'];				
				$tgl=$i['berita_tanggal'];
				$pj=$i['pj'];
		?>
	</a>
		<div class="col-md-8 col-md-offset-2">
			<div class="card">
				<div class="container">
				</br>
					 <div style="background-color: #4091e2;" class="alert alert-info">
			<h5 style="text-transform: uppercase;"><?php echo $judul;?></h5><h6 style="text-transform: capitalize;">created on <?php echo $tgl;?></h6><h6 style="text-transform: capitalize;">By <?php echo $pj;?></h6></div><hr/>

                                
			<img src="<?php echo base_url().'assets/images/'.$image;?>" width="500px" height="500pxa">
			<?php echo limit_words($isi,30);?><a class="btn btn-default btn-block" style="background-color: #4091e2; color:white;" href="<?php echo base_url().'index.php/post_berita/view/'.$id;?>"> Selengkapnya </a>
<hr/></br>
		</div>
		</div>
		</div>
		<?php endforeach;?>
	</div>

</div>
</div>
<?php $this->load->view('adminstba/layout_more/bottom')?>