<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/include/head.php") ?>

</head>

<body class="sb-nav-fixed">
	<?php $this->load->view("admin/include/navbar.php") ?>
	<?php $this->load->view("admin/include/sidebar.php") ?>

	<div id="layoutSidenav_content">
		<main>
			<!--isi-->
			<div class="container-fluid">


				<h1 class="mt-4"> Transaksi</h1>
				<?php $this->load->view("admin/include/breadcumb.php") ?>
				<!-- Isi -->
				<div class="card ">
					<div class="card-header">

						Menu

					</div>
					<div class="row">
						<div class="col-sm-10">
							<div class="card-body">
								<?php
										$q=$this->db->select('id_trans')->from('transaksi')->order_by('id_trans','desc')->limit(1)->get();
										$hasil=$q->result();
										foreach($hasil as $row){
											$id=$row->id_trans;
										}
										if($q->num_rows() > 0){
											$a=substr($id,2);
											$id_m=$a+1;
										}else{
								
											$id_m='1';
								
										}
									?>
								<form action="<?php echo base_url('admin/kasirs/add') ?>" method="post"
									enctype="multipart/form-data">


									<div class="form-group row">
										<label for="id_trans" class="col-sm-2 col-form-label">Transaksi No.</label>
										<div class="col-md-7">
											<input id="id_trans" name="id_trans" type="text"
												class="form-control<?php echo form_error('nama_menu') ? 'is-invalid':'' ?> form-control-sm "
												value="<?php echo 'TR'.$id_m;?>" readonly>
										</div>
										<div class="invalid-feedback">
											<?php echo form_error('nama_menu') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu </label>
										<div class="col-md-7">
											
											<input name="nama_menu" type="text"
												class="form-control<?php echo form_error('nama_menu') ? 'is-invalid':'' ?>  form-control-sm"
												id="id_menu" placeholder="Jeneg.e menu">
										</div>
										<div class="invalid-feedback">
											<?php echo form_error('nama_menu') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Harga Menu
											Rp.</label>
										<div class="col-md-7">
											<input name="harga_menu" type="text" 
												class="form-control <?php echo form_error('harga_menu') ? 'is-invalid':'' ?> form-control-sm"
												id="harga_menu" placeholder="Rego.e piro" onkeypress="validate(event)">
										</div>
										<div class="invalid-feedback">
											<?php echo form_error('harga_menu') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="id_menu" class="col-sm-2 col-form-label">Jumlah

										</label>
										<div class="col-md-7">
											<input name="jumlah" type="text"
												class="form-control<?php echo form_error('nama_menu') ? 'is-invalid':'' ?>  form-control-sm"
												id="nama_menu" placeholder="piro?" onkeypress="validate(event)">
										</div>
										<div class="invalid-feedback">
											<?php echo form_error('nama_menu') ?>
										</div>
									</div>
									<input class="btn btn-success" type="submit" name="btn" value="Simpan" />

								</form>

							</div>
						</div>
					</div>

				</div>
				<div class="card">
					<div class="card mb-4">
						<div class="card-header">

							Kasir e
						</div>
						<div class="card-body">

							<div class="table-responsive-sm">
								<table class="table table-striped" width="100%" cellspacing="0">
									<thead>
										<tr>
											<td>Nama Menu</td>
											<td>Jumlah</td>
											<td>total</td>

											<td>Aksi</td>
										</tr>
									</thead>
									<tbody>
										<?php 
										
										foreach ($a as $has):
											
											?>
										<tr>

											<td><?php echo $has->nama_menu?></td>
											<td><?php echo $has->jumlah?></td>
											<td><?php echo 'Rp. '.number_format($has->total)?></td>

											<td>

												<a onclick="deleteConfirm('<?php echo base_url('admin/menus/delete/') ?>')"
													href="#!" class="btn btn-danger"><i class="fas fa-trash"></i>
													Hapus</a>
											</td>

										</tr>
										<?php endforeach;?>
									</tbody>

								</table>
							</div>
							<form action="<?php echo base_url('admin/bayar/add') ?>" method="post">
								<div class="form-group row">
									<label for="total" class="col-sm-2 col-form-label">Total</label>
									<div class="col-md-7">
										<input id="total" name="total" type="text" class="form-control-plaintext"
											value="<?php echo number_format($has->total)?>" onkeyup="sum()" readonly>
									</div>
									<div class="invalid-feedback">
										<?php echo form_error('nama_menu') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="id_menu" class="col-sm-2 col-form-label">Bayar Rp.</label>
									<div class="col-md-7">
										<input id="bayar" name="bayar" type="text" class="form-control form-control-sm"
											onkeyup="sum();" onkeypress="validate(event)">
									</div>

								</div>
								<div class="form-group row">
									<label for="susuk" class="col-sm-2 col-form-label">Susuk.e</label>
									<div class="col-md-7">
										<input id="susuk" name="susuk" type="text" class="form-control-plaintext" readonly>
									</div>

								</div>
								
							</form>

						</div>
					</div>
		</main>
		<!--end-->
		<?php $this->load->view("admin/include/footer.php") ?>
		<?php $this->load->view("admin/include/modal.php") ?>
	</div>
	</div><?php $this->load->view("admin/include/js.php") ?>

	</body>

</html>
