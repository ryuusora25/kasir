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

			<div class="container-fluid">
				<h1 class="mt-4">Tambah Menu</h1>
				<!-- Isi -->
				<div class="card mb-4">
					<div class="card-header">

						Tambah Menu
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('admin/menus/add') ?>" method="post" enctype="multipart/form-data">
						<?php
							$q=$this->db->select('id_menu')->from('menu')->order_by('id_menu','desc')->limit(1)->get();
							$hasil=$q->result();
							foreach($hasil as $row){
								$id=$row->id_menu;
							}
							if($q->num_rows() > 0){
								$a=substr($id,2); //tr 0010
								$id_a=$a+1;
								if($id_a<10){
									$id_m='MN000'.$id_a;
								}elseif(($id_a>=10) and ($id_a<=99)){
									$id_m='MN00'.$id_a;
								}elseif(($id_a>=100) and ($id_a<=999)){
									$id_m='MN0'.$id_a;
								}
							}else{
					
								$id_m='MN0001';
					
							}
						?>
						<div class="form-group">
								<label for="exampleFormControlInput1">Kode</label>
								<input type="text" name="id_menu" class="form-control" id="autocomplete" value="<?php echo $id_m;?>" readonly>
							</div>
								
							<div class="form-group">
								<label for="exampleFormControlInput1">Nama Menu</label>
								<input type="text" name="nama_menu" class="form-control <?php echo form_error('nama_menu') ? 'is-invalid':'' ?>" id="exampleFormControlInput1" placeholder="Jeneng.e Menu">
								<div class="invalid-feedback">
									<?php echo form_error('nama_menu') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Harga Menu Rp.</label>
								<input type="text" name="harga_menu" class="form-control <?php echo form_error('harga_menu') ? 'is-invalid':'' ?>" id="exampleFormControlInput2"placeholder="Rego.e piro"
								onkeypress="validate(event)">
								<div class="invalid-feedback">
									<?php echo form_error('harga_menu') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tipe">Tipe</label><br>
								<select class="form-control <?php echo form_error('tipe') ? 'is-invalid':'' ?>" id="tipe" name="tipe">
									<option disabled selected>Pilien</option>
									<option value="1">Sego-segoan</option>
									<option value="2">Jajan-jajanan</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('tipe') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
							
						</form>
					</div>
				</div>
			</div>
		</main>
		<!--end-->
		<?php $this->load->view("admin/include/footer.php") ?>
	</div>
	</div>
	<?php $this->load->view("admin/include/js.php") ?>
</body>

</html>
