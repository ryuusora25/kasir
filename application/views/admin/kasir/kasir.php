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
		<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
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


											<!-- <input type="text" name="id_menu" class="form-control" id="id_menu" placeholder="Title" style="width:500px;"> -->
											<select
												class="form-control <?php echo form_error('id_menu') ? 'is-invalid':'' ?>"
												id="id_menu" name="id_menu">
												<option disabled selected>Pilien</option>
												<?php foreach($menus as $ac):?>
												<option value="<?php echo $ac->id_menu?>"><?php echo $ac->nama_menu?></option>
												<?php endforeach;?>
											</select>
										</div>

									</div>
									
									<div class="form-group row">
										<label for="id_menu" class="col-sm-2 col-form-label">Jumlah

										</label>
										<div class="col-md-7">
											<input name="jumlah" type="text"
												class="form-control<?php echo form_error('jumlah') ? 'is-invalid':'' ?>  form-control-sm"
												id="jumlah" placeholder="piro?" onkeypress="validate(event)">
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
											<td>Harga</td>
											<td>Jumlah</td>
											<td>total</td>

											<td>Aksi</td>
										</tr>
									</thead>
									<tbody>
										<?php 
										
										// foreach ($a as $has): 
											
											
										// 		$nama=$has->nama_menu;
										// 		$jumlah=$has->harga_menu;
										// 		$total=$has->total;
										
										$q_k=$this->db->select('*')->from('transaksi_detail')->where('id_trans',$id_m)->get();
										$q_k_r=$q_k->result();
										
										if($q_k->num_rows() < 0){
											$nama='-';
											$jumlah='-';
											$total='-';
											$rego='-';
										}else{
											foreach($q_k_r as $kasir):
												$jumlah=$kasir->jumlah;
												$total=$kasir->total;
												$id_menu=$kasir->id_menu;

												$q_m=$this->db->select('*')->from('menu')->where('id_menu',$id_menu)->get()->result();
												foreach($q_m as $jeneng):
													$nama=$jeneng->nama_menu;
													$rego=$jeneng->harga_menu;
										
											?>
										<tr>

											<td><?php echo $nama?></td>
											<td><?php echo $jumlah?></td>
											<td><?php echo 'Rp. '.number_format($rego)?></td>
											<td><?php echo 'Rp. '.number_format($total)?></td>

											<td>
												<a href="<?php echo base_url('admin/kasirs/delete/'.$kasir->id) ?>"
													onclick="return confirm('Anda yakin mau menghapus item ini ?')"
													class="btn btn-danger"><i class="fas fa-trash"></i>
													Hapus</a>
											</td>

										</tr>
										<?php  endforeach; endforeach; }?>
										<tr>
											<td>Nama Menu</td>
											<td>Harga</td>
											<td>Jumlah</td>
											<td>total</td>

											<td>Aksi</td>
										</tr>
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
									<label class="col-form-label"> Rp. <?php echo $total?></label>
									<div class="col-md-7">
										<input name="id" type="hidden" class="form-control-plaintext"
											value="<?php echo $id_m?>">
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
										<input id="bayar" name="bayar" type="text"
											class="form-control form-control-sm col-sm-4<?php echo form_error('bayar') ? 'is-invalid':'' ?>"
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
										<input id="pengutang" name="pengutang" type="text" class="form-control"
											placeholder="Sopo sing utang?" hidden>
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
