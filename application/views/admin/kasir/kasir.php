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
			<!-- isi -->
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
											$id_a=$a+1;
											$id_m='TR'.$id_a;
										}else{
								
											$id_m='TR1';
								
										}
									?>
								<form action="<?php echo base_url('admin/kasirs/add') ?>" method="post"
									enctype="multipart/form-data">


									<div class="form-group row">
										<label for="id_trans" class="col-sm-2 col-form-label">Transaksi No.</label>
										<div class="col-md-7">
											<input id="id_trans" name="id_trans" type="text"
												class="form-control<?php echo form_error('nama_menu') ? 'is-invalid':'' ?> form-control-sm "
												value="<?php echo $id_m;?>" readonly>
										</div>
										<div class="invalid-feedback">
											<?php echo form_error('nama_menu') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu </label>
										<div class="col-md-7">

											<input name="id_menu" type="text"
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
										var_dump($a);
										foreach ($a as $has): 
											$quer=$this->db->select('*')->from('transaksi_detail')->where('id_trans',$id_m)->get();
											if($quer->num_rows() > 0){
												$nama=$has->nama_menu;
												$jumlah=$has->harga_menu;
												$total=$has->total;
											}else{
												$nama='-';
												$jumlah='-';
												$total='-';
											}
											?>
										<tr>

											<td><?php echo $nama?></td>
											<td><?php echo $jumlah?></td>
											<td><?php echo 'Rp. '.number_format($total)?></td>

											<td>
											<a href="<?php echo base_url('admin/kasirs/delete/'.$has->id) ?>" 
											onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger"><i class="fas fa-trash"></i>
													Hapus</a>											
											</td>

										</tr>
										<?php endforeach;?>
									</tbody>

								</table>
							</div>
							<form action="<?php echo base_url('admin/kasirs/mbayar') ?>" method="post">
								<div class="form-group row">
									<label for="total" class="col-sm-2 col-form-label">Total</label>
									<?php
										$q=$this->db->select_sum('total')->from('transaksi_detail')->where('id_trans',$id_m)->get();
										if($q->num_rows() < 0){
											$total='-';
										}else{
										$sum=$q->result();
										foreach ($sum as $sums):
										
												
												$total=$sums->total;
										
									?>
									<label class="col-form-label">   Rp. <?php echo $total?></label>
									<div class="col-md-7">
									<input name="id" type="hidden" class="form-control-plaintext"
											value="<?php echo $id_m?>" >
										<input id="total" name="total" type="hidden" class="form-control-plaintext"
											value="<?php echo $total?>" onkeyup="sum()" readonly>
									</div>
									<?php endforeach; }?>
									<div class="invalid-feedback">
										<?php echo form_error('nama_menu') ?>
									</div>
								</div>
								<div class="form-group row">
									<label for="id_menu" class="col-sm-2 col-form-label">Bayar Rp.</label>
									<div class="col-md-7">
										<input id="bayar" name="bayar" type="text" class="form-control form-control-sm col-sm-4<?php echo form_error('bayar') ? 'is-invalid':'' ?>"
											onkeyup="sum();" onkeypress="validate(event)">
									</div>

								</div>
								<div class="invalid-feedback">
											<?php echo form_error('bayar') ?>
										</div>
								<div class="form-group row">
									<label for="susuk" class="col-sm-2 col-form-label">Susuk.e</label>
									<div class="col-md-7">
										<input id="susuk" name="susuk" type="text" class="form-control-plaintext"
											readonly>
									</div>

								</div>

								<div class="form-group row">
									<label for="jenis_bayar" class="col-sm-2 col-form-label">Jenis Bayar</label>
									<div class="col-md-7">
									<select class="form-control col-sm-2" id="jenis_bayar" name="jenis_bayar">
									<option value="1">cash</option>
									<option value="2">utang</option>
								     </select>
										<input id="pengutang" name="pengutang" type="text" class="form-control" placeholder="Sopo sing utang?" hidden>
										</div>
									</div>
								</div>

								<input class="btn btn-success col-sm-2" type="submit" name="btn" value="Simpan" />

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
