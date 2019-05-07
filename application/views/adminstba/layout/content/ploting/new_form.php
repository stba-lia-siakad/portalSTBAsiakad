		<?php $this->load->view("adminstba/layout_more/top") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/kajur/mk/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Kode MK*</label>
								<input class="form-control <?php echo form_error('kode_mk') ? 'is-invalid':'' ?>"
								 type="text" name="kode_mk" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_mk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Matakuliah*</label>
								<input class="form-control <?php echo form_error('nama_mk') ? 'is-invalid':'' ?>"
								 type="text" name="nama_mk" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_mk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah SKS*</label>
								<input class="form-control <?php echo form_error('sks_mk') ? 'is-invalid':'' ?>"
								 type="text" name="sks_mk" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('sks_mk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Semester*</label>
								<input class="form-control <?php echo form_error('semester') ? 'is-invalid':'' ?>"
								 type="number" name="semester" min="0" placeholder="Product price" />
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Syarat*</label>
								<input class="form-control <?php echo form_error('syarat') ? 'is-invalid':'' ?>"
								 type="text" name="syarat" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('syarat') ?>
								</div>
							</div>

													

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("adminstba/layout_more/bottom") ?>