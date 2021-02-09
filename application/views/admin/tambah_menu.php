<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/include/head.php") ?>
	<script>
			function validate(evt) {
				var theEvent = evt || window.event;

				// Handle paste
				if (theEvent.type === 'paste') {
					key = event.clipboardData.getData('text/plain');
				} else {
					// Handle key press
					var key = theEvent.keyCode || theEvent.which;
					key = String.fromCharCode(key);
				}
				var regex = /[0-9]|\./;
				if (!regex.test(key)) {
					theEvent.returnValue = false;
					if (theEvent.preventDefault) theEvent.preventDefault();
				}
			}

		</script>

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
								$a=substr($id,2);
								$id_m=$a+1;
							}else{
								
								$id_m='1';
								
							}
						?>
						<div class="form-group">
								<label for="exampleFormControlInput1">Kode</label>
								<input type="text" name="id_menu" class="form-control" id="autocomplete" value="<?php echo 'MN'.$id_m;?>" readonly>
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
								<label for="exampleFormControlSelect1">Tipe</label>
								<select class="form-control <?php echo form_error('tipe') ? 'is-invalid':'' ?>" id="exampleFormControlSelect1" name="tipe">
									<option value="">Pilien</option>
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
