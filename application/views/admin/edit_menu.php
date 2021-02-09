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

						Edit Menu
					</div>
					<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
					
						<div class="form-group">
								<label for="exampleFormControlInput1">Kode</label>
								<input type="text" name="id_menu" class="form-control" id="exampleFormControlInput1" value="<?php echo $menus->id_menu ?>" readonly>
							</div>
								
							<div class="form-group">
								<label for="exampleFormControlInput1">Nama Menu</label>
								<input type="text" name="nama_menu" class="form-control <?php echo form_error('nama_menu') ? 'is-invalid':'' ?>" id="exampleFormControlInput1" placeholder="Jeneng.e Menu"
								value="<?php echo $menus->nama_menu ?>">
								<div class="invalid-feedback">
									<?php echo form_error('nama_menu') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Harga Menu Rp.</label>
								<input type="text" name="harga_menu" class="form-control <?php echo form_error('harga_menu') ? 'is-invalid':'' ?>" id="exampleFormControlInput2"placeholder="Rego.e piro"
								value="<?php echo $menus->harga_menu ?>">
								<div class="invalid-feedback">
									<?php echo form_error('harga_menu') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Tipe</label>
								<select class="form-control <?php echo form_error('tipe') ? 'is-invalid':'' ?>" id="exampleFormControlSelect1" name="tipe">
									<option value="<?php echo $menus->tipe ?>"><?php if($menus->tipe=1){ echo "Sego-segoan";}elseif($menus->tipe=2){echo"Jajanjanan";} ?></option>
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
